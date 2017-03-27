<?php

namespace App\Http\Controllers;

use App\CallRecord;
use App\Car;
use App\FoundCar;
use App\Param;
use App\Buyer;
use App\RequestedCar;
use Illuminate\Http\Request;

use App\Http\Requests;

class CallRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calls = CallRecord::latest()->get();
        dd($calls);
        return view('callrecords.index', compact('calls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::latest()->get();
        $params = Param::first();
        return view('callrecords.create', compact('cars', 'params'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $buyer = new Buyer;
        $buyer->Name = $input['bname'];
        $buyer->Phone = $input['phone'];
        $buyer->AltPhone = $input['altPhone'];
        $buyer->Star = $input['star'];
        $buyer->save();
        $call = new CallRecord;
        $call->found = $input['found'];
        if($input['found'] == 1){
            $call->wantSee = $input['wantSee'];
            $call->schedule = $input['schedule'];
            $call->checked = $input['checked'];
            $call->sold = $input['sold'];
            $buyer->callRecords()->save($call);
            $found = new FoundCar();
            $found->car_id = $input['car_id'];
            $found->call_id = $call->id;
            $found->save();
        }else{
            $call->save();
            $requested = new RequestedCar;
            $requested->Brand = $input["brand"];
            $requested->Name = $input["name"];
            $requested->Year = $input["year"];
            $requested->Color = $input["color"];
            $requested->PriceFrom = $input["priceFrom"];
            $requested->PriceTo = $input["priceTo"];
            $requested->Transmission = $input["transmission"];
            $requested->Plate = $input["plate"];
            $requested->Status = $input["status"];
            $requested->meri = $input["meri"];
            $call->requestedCars()->save($requested);
        }
        return redirect('callrecords');
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
}
