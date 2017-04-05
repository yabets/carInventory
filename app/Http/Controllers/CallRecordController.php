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
use DB;
use Prophecy\Call\Call;

class CallRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calls = CallRecord::latest()->paginate(20);
        //$calls  = DB::table('call_records')->paginate(20);
        //$users = App\User::paginate(15);
        return view('callrecords.index', compact('calls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::latest()->paginate(20);
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
        //first car
        $call = new CallRecord;
        $call->found = $input['found'];
        if($input['found'] == 1){
            $call->wantSee = $input['wantSee'];
            if($call->wantSee == 1){
                $call->schedule = $input['schedule'];
            }else{
                $call->schedule = null;
            }

            $call->checked = $input['checked'];
            $call->seen = $input['seen'];
            $call->sold = $input['sold'];
            $buyer->callRecords()->save($call);
            $found = new FoundCar();
            $found->car_id = $input['car_id'];
            $found->call_id = $call->id;
            $found->save();
        }else{
            $buyer->callRecords()->save($call);
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
            $requested->Status = "not found";
            $requested->meri = $input["meri"];
            $requested->call_id = $call->id;
            $requested->save();
        }

        if($input['_cars'] == 2 || $input['_cars'] == 3) {
            //second car
            $call = new CallRecord;
            $call->found = $input['found2'];
            if ($input['found2'] == 1) {
                $call->wantSee = $input['wantSee2'];
                $call->schedule = $input['schedule2'];
                $call->checked = $input['checked2'];
                $call->seen = $input['seen2'];
                $call->sold = $input['sold2'];
                $buyer->callRecords()->save($call);
                $found = new FoundCar();
                $found->car_id = $input['car_id2'];
                $found->call_id = $call->id;
                $found->save();
            } else {
                $buyer->callRecords()->save($call);
                $call->save();
                $requested = new RequestedCar;
                $requested->Brand = $input["brand2"];
                $requested->Name = $input["name2"];
                $requested->Year = $input["year2"];
                $requested->Color = $input["color2"];
                $requested->PriceFrom = $input["priceFrom2"];
                $requested->PriceTo = $input["priceTo2"];
                $requested->Transmission = $input["transmission2"];
                $requested->Plate = $input["plate2"];
                $requested->Status = "not found";
                $requested->meri = $input["meri2"];
                $requested->call_id = $call->id;
                $requested->save();
            }
        }

        if($input['_cars']==3) {
            //third car
            $call = new CallRecord;
            $call->found = $input['found3'];
            if ($input['found3'] == 1) {
                $call->wantSee = $input['wantSee3'];
                $call->schedule = $input['schedule3'];
                $call->checked = $input['checked3'];
                $call->seen = $input['seen3'];
                $call->sold = $input['sold3'];
                $buyer->callRecords()->save($call);
                $found = new FoundCar();
                $found->car_id = $input['car_id3'];
                $found->call_id = $call->id;
                $found->save();
            } else {
                $buyer->callRecords()->save($call);
                $call->save();
                $requested = new RequestedCar;
                $requested->Brand = $input["brand3"];
                $requested->Name = $input["name3"];
                $requested->Year = $input["year3"];
                $requested->Color = $input["color3"];
                $requested->PriceFrom = $input["priceFrom3"];
                $requested->PriceTo = $input["priceTo3"];
                $requested->Transmission = $input["transmission3"];
                $requested->Plate = $input["plate3"];
                $requested->Status = "not found";
                $requested->meri = $input["meri3"];
                $requested->call_id = $call->id;
                $requested->save();
            }
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
        $call = CallRecord::findOrFail($id);
        return view('callrecords.view', compact('call'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $call = CallRecord::findOrFail($id);
        $cars = Car::latest()->get();
        $params = Param::first();
        return view('callrecords.edit', compact('call', 'params', 'cars'));
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
        CallRecord::findOrFail($id)->update($request->all());
        $input = $request->all();
        if($input['wantSee'] == 0){
            //CallRecord::findOrFail($id)->schedule(array('schedule'=>'2020-04-27 00:00:00'));
        }
        return redirect('callrecords');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CallRecord::findOrFail($id)->delete();
        return redirect('callrecords');
    }

    public function search(Request $request)
    {
        return redirect('callrecords');
    }

    public function filter(Request $request)
    {
        $input = $request->except('_token');
        $calls = CallRecord::latest()->get();
        if(isset($input['found'])){
            $calls = $calls->where('found', 1);
        }
        if(isset($input['wantSee'])){
            $calls = $calls->where('wantSee', 1);
        }
        if(isset($input['checked'])){
            $calls = $calls->where('checked', 1);
        }
        if(isset($input['seen'])){
            $calls = $calls->where('seen', 1);
        }
        if(isset($input['sold'])){
            $calls = $calls->where('sold', 1);
        }
        if($input['scheduleFrom'] != '' and $input['scheduleTo'] != ''){
            $calls = $calls->filter(function($call)use($input){
                return (data_get($call, 'schedule') >= $input['scheduleFrom']) && (data_get($call, 'schedule') <= $input['scheduleTo']);
            });
        }
        if($input['callFrom'] != '' and $input['callTo'] != ''){
            $calls = $calls->filter(function($call)use($input){
                return (data_get($call, 'updated_at') >= $input['callFrom']) && (data_get($call, 'updated_at') <= $input['callTo']);
            });
        }
        return view('callrecords.index', compact('calls'));
    }
}
