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

	    $response = $client->request('GET', 'https://humn27zyud.execute-api.ap-southeast-1.amazonaws.com/latest?id=1_hJK5K2iJMFwYNmE0Dyo5Vd5zzQAJvkK74nl1Byq4KE&sheet=4');
	    $response = $response->getBody()->getContents();
	    $allname = json_decode($response, true);
	    dd($allpremiums);
    	$country_index = array_search($request->get('destination'),$allcountries['columns']['countries']);
    	if(!$country_index){
    	} else {
    		$allianz_reg = $allcountries['columns']['allianz'][$country_index];
	    	$aig_reg = $allcountries['columns']['aig'][$country_index];
	    	$axa_reg = $allcountries['columns']['axa'][$country_index];
	    	$tune_reg = $allcountries['columns']['tune'][$country_index];
	    	$tkf_reg = $allcountries['columns']['takafulikhlas'][$country_index];
	    	$sompo_reg = $allcountries['columns']['sompo'][$country_index];
	    	$amg_reg = $allcountries['columns']['amg'][$country_index];

	    	$atc_plan = "atcx".config('constants.'.$allianz_reg).'adultnsc';
	    	$aig_plan = "aigx".config('constants.'.$allianz_reg).'adultnsc';

    	}
    }
}
