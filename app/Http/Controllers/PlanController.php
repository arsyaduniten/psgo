<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PlanController extends Controller
{
    //
    public function getplans(Request $request)
    {
    	$depart = Carbon::parse($request->get('depart_date'));
    	$return = Carbon::parse($request->get('return_date'));
    	$travelling_days = $depart->diffInDays($return);
    	
    	$client = new \GuzzleHttp\Client();
	    $response = $client->request('GET', 'https://humn27zyud.execute-api.ap-southeast-1.amazonaws.com/latest?id=1_hJK5K2iJMFwYNmE0Dyo5Vd5zzQAJvkK74nl1Byq4KE&sheet=1');
	    $response = $response->getBody()->getContents();
	    $allpremiums = json_decode($response, true);
	    $client = new \GuzzleHttp\Client();
	    $response = $client->request('GET', 'https://humn27zyud.execute-api.ap-southeast-1.amazonaws.com/latest?id=1_hJK5K2iJMFwYNmE0Dyo5Vd5zzQAJvkK74nl1Byq4KE&sheet=2');
	    $response = $response->getBody()->getContents();
	    $allbenefits = json_decode($response, true);
	    $client = new \GuzzleHttp\Client();
	    $response = $client->request('GET', 'https://humn27zyud.execute-api.ap-southeast-1.amazonaws.com/latest?id=1_hJK5K2iJMFwYNmE0Dyo5Vd5zzQAJvkK74nl1Byq4KE&sheet=3');
	    $response = $response->getBody()->getContents();
	    $allname = json_decode($response, true);
	    
    }
}
