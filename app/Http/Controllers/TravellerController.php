<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traveller;

class TravellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        // $available_plans = $this->get_plans($request->get('travelling_days'), $request->get('destination'));
        // $plan = $available_plans[$request->get('plan')];
        $plan = [
            "key" => $request->get('plan'),
            "name" => $request->get('name'),
            "premiums" => $request->get('premiums'),
            "benefits" => [
              "death" => $request->get('death'),
              "medical" => $request->get('medical'),
              "tripcancel" => $request->get('tripcancel')
            ]
        ];
        $travelling_days = $request->get('travelling_days');
        $pax = $request->get('pax');
        $destination = $request->get('destination');
        return view('public.traveller-info', compact('plan', 'pax', 'travelling_days', 'destination'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $count = $request->get('pax') - 1;
        $refno = str_random(8);
        $unique_ref = true;
        $refnos = Traveller::all()->pluck('refno')->toArray();
        if(in_array($refno, $refnos)){
            $refno = str_random(8);
            $unique_ref = false;
        }

        while(!$unique_ref){
            if(in_array($refno, $refnos)){
                $refno = str_random(8);
            } else{
                $unique_ref = true ;
            }
        }

        foreach(range(0,$count) as $c){
            $t = new Traveller();
            $t->name = $request->get('name')[$c];
            $t->email = $request->get('email')[$c];
            $t->id_type = $request->get('id_type')[$c];
            $t->id_number = $request->get('id_number')[$c];
            $t->phone_number = $request->get('phone_number')[$c];
            $t->nationality = $request->get('nationality')[$c];
            $t->dob = $request->get('dob')[$c];
            $t->gender = $request->get('gender')[$c];
            $t->address_1 = $request->get('address_1')[$c];
            $t->address_2 = $request->get('address_2')[$c];
            $t->postcode = $request->get('postcode')[$c];
            $t->city = $request->get('city')[$c];
            $t->state = $request->get('state')[$c];
            $t->refno = $refno;
            $t->plan = $request->get('key');
            $t->save();
        }
        $key = $request->get('plan');
        $name = $request->get('name');
        $premiums = $request->get('premiums');
        $pax = $request->get('pax');
        $destination = $request->get('destination');
        $travelling_days = $request->get('travelling_days');
        $total = intval($premiums) * intval($pax);
        $customer = [
            "name" => $request->get('name')[0],
            "email" => $request->get('email')[0],
            "phone_number" => $request->get('phone_number')[0],
        ];
        $signature = hash("sha256", "889br2OaONM15551".$refno.$total."00MYR");
        return view('public.payment', compact('key', 'name', 'premiums', 'pax', 'destination', 'travelling_days', 'total', 'refno', 'customer', 'signature'));        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
}
