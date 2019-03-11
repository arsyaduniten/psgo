<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PlanController extends Controller
{
    public function getplans(Request $request)
    {
    	$depart = Carbon::parse($request->get('depart_date'));
    	$return = Carbon::parse($request->get('return_date'));
    	$travelling_days = $depart->diffInDays($return);

    	$client = new \GuzzleHttp\Client();
	    $response = $client->request('GET', 'https://humn27zyud.execute-api.ap-southeast-1.amazonaws.com/latest?id=1_hJK5K2iJMFwYNmE0Dyo5Vd5zzQAJvkK74nl1Byq4KE&sheet=1');
	    $response = $response->getBody()->getContents();
	    $allpremiums = json_decode($response, true);

	    $response = $client->request('GET', 'https://humn27zyud.execute-api.ap-southeast-1.amazonaws.com/latest?id=1_hJK5K2iJMFwYNmE0Dyo5Vd5zzQAJvkK74nl1Byq4KE&sheet=2');
	    $response = $response->getBody()->getContents();
	    $allcountries = json_decode($response, true);

	    $response = $client->request('GET', 'https://humn27zyud.execute-api.ap-southeast-1.amazonaws.com/latest?id=1_hJK5K2iJMFwYNmE0Dyo5Vd5zzQAJvkK74nl1Byq4KE&sheet=3');
	    $response = $response->getBody()->getContents();
	    $allbenefits = json_decode($response, true);
	    // dd($allbenefits);
	    
	    $response = $client->request('GET', 'https://humn27zyud.execute-api.ap-southeast-1.amazonaws.com/latest?id=1_hJK5K2iJMFwYNmE0Dyo5Vd5zzQAJvkK74nl1Byq4KE&sheet=4');
	    $response = $response->getBody()->getContents();
	    $allname = json_decode($response, true);
    	$country_index = array_search($request->get('destination'),$allcountries['columns']['countries']);
    	$available_plans = $available_plans_name = [];
    	$travelling_days_index = $travelling_days - 1;
    	if(!$country_index){
    	} else {
    		$allianz_reg = $allcountries['columns']['allianz'][$country_index];
	    	$aig_reg = $allcountries['columns']['aig'][$country_index];
	    	$axa_reg = $allcountries['columns']['axa'][$country_index];
	    	$tune_reg = $allcountries['columns']['tune'][$country_index];
	    	$tkf_reg = $allcountries['columns']['takafulikhlas'][$country_index];
	    	$sompo_reg = $allcountries['columns']['sompo'][$country_index];
	    	$amg_reg = $allcountries['columns']['amg'][$country_index];

	    	$available_plans["atcx".config('constants.'.$allianz_reg).'adultnsc']['premiums'] = $allpremiums['columns']["atcx".config('constants.'.$allianz_reg).'adultnsc'][$travelling_days_index];

	    	$available_plans["atcx".config('constants.'.$allianz_reg).'adultnsc']['benefits']['death'] = $allbenefits['columns']["atcx".config('constants.'.$allianz_reg).'adultnsc'][0];
	    	$available_plans["atcx".config('constants.'.$allianz_reg).'adultnsc']['benefits']['disability'] = $allbenefits['columns']["atcx".config('constants.'.$allianz_reg).'adultnsc'][4];
	    	$available_plans["atcx".config('constants.'.$allianz_reg).'adultnsc']['benefits']['medical'] = $allbenefits['columns']["atcx".config('constants.'.$allianz_reg).'adultnsc'][9];
	    	$available_plans["atcx".config('constants.'.$allianz_reg).'adultnsc']['benefits']['tripcancel'] = $allbenefits['columns']["atcx".config('constants.'.$allianz_reg).'adultnsc'][9];

	    	$available_plans["atc2x".config('constants.'.$allianz_reg).'adultnsc']['benefits']['death'] = $allbenefits['columns']["atc2x".config('constants.'.$allianz_reg).'adultnsc'][0];
	    	$available_plans["atc2x".config('constants.'.$allianz_reg).'adultnsc']['benefits']['disability'] = $allbenefits['columns']["atc2x".config('constants.'.$allianz_reg).'adultnsc'][4];
	    	$available_plans["atc2x".config('constants.'.$allianz_reg).'adultnsc']['benefits']['medical'] = $allbenefits['columns']["atc2x".config('constants.'.$allianz_reg).'adultnsc'][9];
	    	$available_plans["atc2x".config('constants.'.$allianz_reg).'adultnsc']['benefits']['tripcancel'] = $allbenefits['columns']["atc2x".config('constants.'.$allianz_reg).'adultnsc'][9];

	    	for ($x = 1; $x <= 3; $x++) {
	    		$available_plans["aigp".$x.config('constants.'.$aig_reg).'adultnsc']['benefits']['death'] = $allbenefits['columns']["aigp".$x.config('constants.'.$aig_reg).'adultnsc'][0];
		    	$available_plans["aigp".$x.config('constants.'.$aig_reg).'adultnsc']['benefits']['disability'] = $allbenefits['columns']["aigp".$x.config('constants.'.$aig_reg).'adultnsc'][4];
		    	$available_plans["aigp".$x.config('constants.'.$aig_reg).'adultnsc']['benefits']['medical'] = $allbenefits['columns']["aigp".$x.config('constants.'.$aig_reg).'adultnsc'][9];
		    	$available_plans["aigp".$x.config('constants.'.$aig_reg).'adultnsc']['benefits']['tripcancel'] = $allbenefits['columns']["aigp".$x.config('constants.'.$aig_reg).'adultnsc'][9];
			}

			for ($x = 1; $x <= 5; $x++) {
	    		$available_plans["axap".$x.config('constants.'.$axa_reg).'adultnsc']['benefits']['death'] = $allbenefits['columns']["axap".$x.config('constants.'.$axa_reg).'adultnsc'][0];
		    	$available_plans["axap".$x.config('constants.'.$axa_reg).'adultnsc']['benefits']['disability'] = $allbenefits['columns']["axap".$x.config('constants.'.$axa_reg).'adultnsc'][4];
		    	$available_plans["axap".$x.config('constants.'.$axa_reg).'adultnsc']['benefits']['medical'] = $allbenefits['columns']["axap".$x.config('constants.'.$axa_reg).'adultnsc'][9];
		    	$available_plans["axap".$x.config('constants.'.$axa_reg).'adultnsc']['benefits']['tripcancel'] = $allbenefits['columns']["axap".$x.config('constants.'.$axa_reg).'adultnsc'][9];
			}

			for ($x = 1; $x <= 2; $x++) {
	    		$available_plans["bsp".$x.config('constants.'.$sompo_reg).'adultnsc']['benefits']['death'] = $allbenefits['columns']["bsp".$x.config('constants.'.$sompo_reg).'adultnsc'][0];
		    	$available_plans["bsp".$x.config('constants.'.$sompo_reg).'adultnsc']['benefits']['disability'] = $allbenefits['columns']["bsp".$x.config('constants.'.$sompo_reg).'adultnsc'][4];
		    	$available_plans["bsp".$x.config('constants.'.$sompo_reg).'adultnsc']['benefits']['medical'] = $allbenefits['columns']["bsp".$x.config('constants.'.$sompo_reg).'adultnsc'][9];
		    	$available_plans["bsp".$x.config('constants.'.$sompo_reg).'adultnsc']['benefits']['tripcancel'] = $allbenefits['columns']["bsp".$x.config('constants.'.$sompo_reg).'adultnsc'][9];
			} 

			for ($x = 1; $x <= 4; $x++) {
	    		$available_plans["kurniap".$x.config('constants.'.$amg_reg).'adultnsc']['benefits']['death'] = $allbenefits['columns']["kurniap".$x.config('constants.'.$amg_reg).'adultnsc'][0];
		    	$available_plans["kurniap".$x.config('constants.'.$amg_reg).'adultnsc']['benefits']['disability'] = $allbenefits['columns']["kurniap".$x.config('constants.'.$amg_reg).'adultnsc'][4];
		    	$available_plans["kurniap".$x.config('constants.'.$amg_reg).'adultnsc']['benefits']['medical'] = $allbenefits['columns']["kurniap".$x.config('constants.'.$amg_reg).'adultnsc'][9];
		    	$available_plans["kurniap".$x.config('constants.'.$amg_reg).'adultnsc']['benefits']['tripcancel'] = $allbenefits['columns']["kurniap".$x.config('constants.'.$amg_reg).'adultnsc'][9];
			} 

			dd($available_plans);


	    	$available_plans["aigx".config('constants.'.$aig_reg).'adultnsc']['benefits']['death'] = $allbenefits['columns']["aigx".config('constants.'.$aig_reg).'adultnsc'][0];
	    	$available_plans["aigx".config('constants.'.$aig_reg).'adultnsc']['benefits']['disability'] = $allbenefits['columns']["aigx".config('constants.'.$aig_reg).'adultnsc'][4];
	    	$available_plans["aigx".config('constants.'.$aig_reg).'adultnsc']['benefits']['medical'] = $allbenefits['columns']["aigx".config('constants.'.$aig_reg).'adultnsc'][9];
	    	$available_plans["aigx".config('constants.'.$aig_reg).'adultnsc']['benefits']['tripcancel'] = $allbenefits['columns']["aigx".config('constants.'.$aig_reg).'adultnsc'][9];

	    	
	    	

			$available_plans[] = "tunex".config('constants.'.$tune_reg).'adultnsc';
			$available_plans[] = "bsx".config('constants.'.$sompo_reg).'adultnsc';
			
    	}

    	return view('public.plans');
    }
}
