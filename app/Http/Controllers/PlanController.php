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
    	$country_index = array_search(ucfirst($request->get('destination')),$allcountries['columns']['countries']);
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

	    	$available_plans["atcx".config('constants.'.$allianz_reg).'adultnsc']['name'] = $this->get_name("atcx".config('constants.'.$allianz_reg).'adultnsc', $allname['rows']);
	    	$available_plans["atcx".config('constants.'.$allianz_reg).'adultnsc']['premiums'] = $allpremiums['columns']["atcx".config('constants.'.$allianz_reg).'adultnsc'][$travelling_days_index];
	    	$available_plans["atcx".config('constants.'.$allianz_reg).'adultnsc']['benefits']['death'] = $allbenefits['columns']["atcx".config('constants.'.$allianz_reg).'adultnsc'][0];
	    	$available_plans["atcx".config('constants.'.$allianz_reg).'adultnsc']['benefits']['disability'] = $allbenefits['columns']["atcx".config('constants.'.$allianz_reg).'adultnsc'][4];
	    	$available_plans["atcx".config('constants.'.$allianz_reg).'adultnsc']['benefits']['medical'] = $allbenefits['columns']["atcx".config('constants.'.$allianz_reg).'adultnsc'][9];
	    	$available_plans["atcx".config('constants.'.$allianz_reg).'adultnsc']['benefits']['tripcancel'] = $allbenefits['columns']["atcx".config('constants.'.$allianz_reg).'adultnsc'][30];

	    	$available_plans["atc2x".config('constants.'.$allianz_reg).'adultnsc']['name'] = $this->get_name("atc2x".config('constants.'.$allianz_reg).'adultnsc', $allname['rows']);
	    	$available_plans["atc2x".config('constants.'.$allianz_reg).'adultnsc']['premiums'] = $allpremiums['columns']["atc2x".config('constants.'.$allianz_reg).'adultnsc'][$travelling_days_index];
	    	$available_plans["atc2x".config('constants.'.$allianz_reg).'adultnsc']['benefits']['death'] = $allbenefits['columns']["atc2x".config('constants.'.$allianz_reg).'adultnsc'][0];
	    	$available_plans["atc2x".config('constants.'.$allianz_reg).'adultnsc']['benefits']['disability'] = $allbenefits['columns']["atc2x".config('constants.'.$allianz_reg).'adultnsc'][4];
	    	$available_plans["atc2x".config('constants.'.$allianz_reg).'adultnsc']['benefits']['medical'] = $allbenefits['columns']["atc2x".config('constants.'.$allianz_reg).'adultnsc'][9];
	    	$available_plans["atc2x".config('constants.'.$allianz_reg).'adultnsc']['benefits']['tripcancel'] = $allbenefits['columns']["atc2x".config('constants.'.$allianz_reg).'adultnsc'][30];

	    	for ($x = 1; $x <= 3; $x++) {
	    		$available_plans["aigp".$x.config('constants.'.$aig_reg).'adultnsc']['name'] = $this->get_name("aigp".$x.config('constants.'.$aig_reg).'adultnsc', $allname['rows']);
	    		$available_plans["aigp".$x.config('constants.'.$aig_reg).'adultnsc']['premiums'] = $allpremiums['columns']["aigp".$x.config('constants.'.$aig_reg).'adultnsc'][$travelling_days_index];
	    		$available_plans["aigp".$x.config('constants.'.$aig_reg).'adultnsc']['benefits']['death'] = $this->array_find("aigp".$x.config('constants.'.$aig_reg).'adultnsc', $allbenefits['columns'], 0);
		    	$available_plans["aigp".$x.config('constants.'.$aig_reg).'adultnsc']['benefits']['disability'] = $this->array_find("aigp".$x.config('constants.'.$aig_reg).'adultnsc', $allbenefits['columns'], 4);
		    	$available_plans["aigp".$x.config('constants.'.$aig_reg).'adultnsc']['benefits']['medical'] = $this->array_find("aigp".$x.config('constants.'.$aig_reg).'adultnsc', $allbenefits['columns'], 9);
		    	$available_plans["aigp".$x.config('constants.'.$aig_reg).'adultnsc']['benefits']['tripcancel'] = $this->array_find("aigp".$x.config('constants.'.$aig_reg).'adultnsc', $allbenefits['columns'], 9);
			}

			for ($x = 1; $x <= 4; $x++) {
				$available_plans["axap".$x.config('constants.'.$axa_reg).'adultnsc']['name'] = $this->get_name("axap".$x.config('constants.'.$axa_reg).'adultnsc', $allname['rows']);
				$available_plans["axap".$x.config('constants.'.$axa_reg).'adultnsc']['premiums'] = $allpremiums['columns']["axap".$x.config('constants.'.$axa_reg).'adultnsc'][$travelling_days_index];
	    		$available_plans["axap".$x.config('constants.'.$axa_reg).'adultnsc']['benefits']['death'] = $this->array_find("axap".$x.config('constants.'.$axa_reg).'adultnsc', $allbenefits['columns'], 0);
		    	$available_plans["axap".$x.config('constants.'.$axa_reg).'adultnsc']['benefits']['disability'] = $this->array_find("axap".$x.config('constants.'.$axa_reg).'adultnsc', $allbenefits['columns'], 4);
		    	$available_plans["axap".$x.config('constants.'.$axa_reg).'adultnsc']['benefits']['medical'] = $this->array_find("axap".$x.config('constants.'.$axa_reg).'adultnsc', $allbenefits['columns'], 9);
		    	$available_plans["axap".$x.config('constants.'.$axa_reg).'adultnsc']['benefits']['tripcancel'] = $this->array_find("axap".$x.config('constants.'.$axa_reg).'adultnsc', $allbenefits['columns'], 4);
			}

			for ($x = 1; $x <= 2; $x++) {
				$available_plans["bsp".$x.config('constants.'.$sompo_reg).'adultnsc']['name'] = $this->get_name("bsp".$x.config('constants.'.$sompo_reg).'adultnsc', $allname['rows']);
				$available_plans["bsp".$x.config('constants.'.$sompo_reg).'adultnsc']['premiums'] = $allpremiums['columns']["bsp".$x.config('constants.'.$sompo_reg).'adultnsc'][$travelling_days_index];
	    		$available_plans["bsp".$x.config('constants.'.$sompo_reg).'adultnsc']['benefits']['death'] = $this->array_find("bsp".$x.config('constants.'.$sompo_reg).'adultnsc', $allbenefits['columns'], 0);
		    	$available_plans["bsp".$x.config('constants.'.$sompo_reg).'adultnsc']['benefits']['disability'] = $this->array_find("bsp".$x.config('constants.'.$sompo_reg).'adultnsc', $allbenefits['columns'], 4);
		    	$available_plans["bsp".$x.config('constants.'.$sompo_reg).'adultnsc']['benefits']['medical'] = $this->array_find("bsp".$x.config('constants.'.$sompo_reg).'adultnsc', $allbenefits['columns'], 9);
		    	$available_plans["bsp".$x.config('constants.'.$sompo_reg).'adultnsc']['benefits']['tripcancel'] = $this->array_find("bsp".$x.config('constants.'.$sompo_reg).'adultnsc', $allbenefits['columns'], 30);
			} 

			for ($x = 1; $x <= 2; $x++) {
				$available_plans["kurniap".$x.config('constants.'.$amg_reg).'adultnsc']['name'] = $this->get_name("kurniap".$x.config('constants.'.$amg_reg).'adultnsc', $allname['rows']);
				$available_plans["kurniap".$x.config('constants.'.$amg_reg).'adultnsc']['premiums'] = $allpremiums['columns']["kurniap".$x.config('constants.'.$amg_reg).'adultnsc'][$travelling_days_index];
	    		$available_plans["kurniap".$x.config('constants.'.$amg_reg).'adultnsc']['benefits']['death'] = $this->array_find("kurniap".$x.config('constants.'.$amg_reg).'adultnsc', $allbenefits['columns'], 0);
		    	$available_plans["kurniap".$x.config('constants.'.$amg_reg).'adultnsc']['benefits']['disability'] = $this->array_find("kurniap".$x.config('constants.'.$amg_reg).'adultnsc', $allbenefits['columns'], 4);
		    	$available_plans["kurniap".$x.config('constants.'.$amg_reg).'adultnsc']['benefits']['medical'] = $this->array_find("kurniap".$x.config('constants.'.$amg_reg).'adultnsc', $allbenefits['columns'], 9);
		    	$available_plans["kurniap".$x.config('constants.'.$amg_reg).'adultnsc']['benefits']['tripcancel'] = $this->array_find("kurniap".$x.config('constants.'.$amg_reg).'adultnsc', $allbenefits['columns'], 30);
			} 

			// $available_plans["aigx".config('constants.'.$aig_reg).'adultnsc']['premiums'] = $allpremiums['columns']["aigx".config('constants.'.$aig_reg).'adultnsc'][$travelling_days_index];
	  //   	$available_plans["aigx".config('constants.'.$aig_reg).'adultnsc']['benefits']['death'] = $this->array_find("aigx".config('constants.'.$aig_reg).'adultnsc', $allbenefits['columns'], 0);
	  //   	$available_plans["aigx".config('constants.'.$aig_reg).'adultnsc']['benefits']['disability'] = $this->array_find("aigx".config('constants.'.$aig_reg).'adultnsc', $allbenefits['columns'], 4);
	  //   	$available_plans["aigx".config('constants.'.$aig_reg).'adultnsc']['benefits']['medical'] = $this->array_find("aigx".config('constants.'.$aig_reg).'adultnsc', $allbenefits['columns'], 9);
	  //   	$available_plans["aigx".config('constants.'.$aig_reg).'adultnsc']['benefits']['tripcancel'] = $this->array_find("aigx".config('constants.'.$aig_reg).'adultnsc', $allbenefits['columns'], 30);
			$available_plans["tunex".config('constants.'.$tune_reg).'adultnsc']['name'] = $this->get_name("tunex".config('constants.'.$tune_reg).'adultnsc', $allname['rows']);
	    	$available_plans["tunex".config('constants.'.$tune_reg).'adultnsc']['premiums'] = $allpremiums['columns']["tunex".config('constants.'.$tune_reg).'adultnsc'][$travelling_days_index];
			$available_plans["tunex".config('constants.'.$tune_reg).'adultnsc']['benefits']['death'] = $this->array_find("tunex".config('constants.'.$tune_reg).'adultnsc', $allbenefits['columns'], 0);
			$available_plans["tunex".config('constants.'.$tune_reg).'adultnsc']['benefits']['disability'] = $this->array_find("tunex".config('constants.'.$tune_reg).'adultnsc', $allbenefits['columns'], 4);
			$available_plans["tunex".config('constants.'.$tune_reg).'adultnsc']['benefits']['medical'] = $this->array_find("tunex".config('constants.'.$tune_reg).'adultnsc', $allbenefits['columns'], 9);
			$available_plans["tunex".config('constants.'.$tune_reg).'adultnsc']['benefits']['tripcancel'] = $this->array_find("tunex".config('constants.'.$tune_reg).'adultnsc', $allbenefits['columns'], 30);

			// $available_plans["bsx".config('constants.'.$sompo_reg).'adultnsc']['premiums'] = $allpremiums['columns']["bsx".config('constants.'.$sompo_reg).'adultnsc'][$travelling_days_index];
			// $available_plans["bsx".config('constants.'.$sompo_reg).'adultnsc']['benefits']['death'] = $this->array_find("bsx".config('constants.'.$sompo_reg).'adultnsc', $allbenefits['columns'], 0);
			// $available_plans["bsx".config('constants.'.$sompo_reg).'adultnsc']['benefits']['disability'] = $this->array_find("bsx".config('constants.'.$sompo_reg).'adultnsc', $allbenefits['columns'], 4);
			// $available_plans["bsx".config('constants.'.$sompo_reg).'adultnsc']['benefits']['medical'] = $this->array_find("bsx".config('constants.'.$sompo_reg).'adultnsc', $allbenefits['columns'], 9);
			// $available_plans["bsx".config('constants.'.$sompo_reg).'adultnsc']['benefits']['tripcancel'] = $this->array_find("bsx".config('constants.'.$sompo_reg).'adultnsc', $allbenefits['columns'], 30);

			$available_plans["tkfikhlasx".config('constants.'.$tkf_reg).'adultnsc']['name'] = $this->get_name("tkfikhlasx".config('constants.'.$tkf_reg).'adultnsc', $allname['rows']);
			$available_plans["tkfikhlasx".config('constants.'.$tkf_reg).'adultnsc']['premiums'] = $allpremiums['columns']["tkfikhlasx".config('constants.'.$tkf_reg).'adultnsc'][$travelling_days_index];
			$available_plans["tkfikhlasx".config('constants.'.$tkf_reg).'adultnsc']['benefits']['death'] = $this->array_find("tkfikhlasx".config('constants.'.$tkf_reg).'adultnsc', $allbenefits['columns'], 0);
			$available_plans["tkfikhlasx".config('constants.'.$tkf_reg).'adultnsc']['benefits']['disability'] = $this->array_find("tkfikhlasx".config('constants.'.$tkf_reg).'adultnsc', $allbenefits['columns'], 4);
			$available_plans["tkfikhlasx".config('constants.'.$tkf_reg).'adultnsc']['benefits']['medical'] = $this->array_find("tkfikhlasx".config('constants.'.$tkf_reg).'adultnsc', $allbenefits['columns'], 9);
			$available_plans["tkfikhlasx".config('constants.'.$tkf_reg).'adultnsc']['benefits']['tripcancel'] = $this->array_find("tkfikhlasx".config('constants.'.$tkf_reg).'adultnsc', $allbenefits['columns'], 30);
    	}

    	$pax = $request->get('traveller');
    	$destination = $request->get('destination');
    	return view('public.plans', compact('available_plans', 'travelling_days', 'pax', 'destination'));
    }

    public function array_find($needle, array $haystack, $index)
	{
	    foreach ($haystack as $key => $value) {
	        if (false !== stripos($key, $needle)) {
	            return $value[$index];
	        }
	    }
	    return false;
	}

	public function get_name($name_abbr, array $allname)
	{
		foreach ($allname as $key => $value) {
			if (false !== stripos($name_abbr, $value['abbreviations'])){
				return $value['planname'];
			}
		}
		return false;
	}

	public function index()
	{
    	$client = new \GuzzleHttp\Client();
		$response = $client->request('GET', 'https://humn27zyud.execute-api.ap-southeast-1.amazonaws.com/latest?id=1_hJK5K2iJMFwYNmE0Dyo5Vd5zzQAJvkK74nl1Byq4KE&sheet=2');
	    $response = $response->getBody()->getContents();
	    $allcountries = json_decode($response, true);
	    $countries = $allcountries['columns']['countries'];
	    sort($countries);
		return view('public.landing', compact('countries'));
	}
}
