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
        return view('public.traveller-info', compact('plan', 'pax', 'travelling_days'));
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
        $count = sizeof($request->get('name')) - 1;
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
            $t->refno = str_random(8);
            $t->plan = $request->get('key');
            $t->save();
        }
        return "success";        
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
