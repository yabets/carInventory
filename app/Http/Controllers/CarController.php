<?php

namespace App\Http\Controllers;

use App\Owner;
use App\Param;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Car;
use Illuminate\Support\Facades\Validator;
use DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$cars = Car::all();
        $cars = Car::latest()->get();
        return view('cars.car')->with(['cars'=>$cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $owners = Owner::latest()->get();
        return view('cars.create')->with(["owners" => $owners]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Car::create($request->input());
        $input = $request->except('_token');
        if($input['oname']==""){
            $input = array_except($input, ['oname', 'phone', 'altPhone', 'Owner']);
            Car::create($input);
        }else{
            $owner = new Owner;
            $owner->Name = $input['oname'];
            $owner->Phone = $input['phone'];
            $owner->AltPhone = $input['altPhone'];
            $owner->Owner = $input['Owner'];
            $owner->save();
            $input = array_except($input, ['oname', 'phone', 'altPhone', 'Owner']);
            $car = new Car;
            $car->Brand = $input["brand"];
            $car->Name = $input["name"];
            $car->Year = $input["year"];
            $car->Color = $input["color"];
            $car->Price = $input["price"];
            $car->Plate = $input["plate"];
            $car->location = $input["location"];
            $car->remark = $input["remark"];
            $car->meri = $input["meri"];
            $car->mileage = $input["mileage"];
            $car->published = $input["published"];
            $owner->cars()->save($car);
        }
        return redirect('cars');
//        $validator = Validator::make($input, [
//            "name"=>"required|min:1|alpha_num"
//        ]);
//        if($validator->fails()){
//            return redirect('post/create')
//                ->withErrors($validator)
//                ->withInput();
//        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.view', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $owners = Owner::latest()->get();
        $params = Param::first();
        return view('cars.edit', compact('car', 'owners', 'params'));
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
        $car = Car::findOrFail($id);
        $car->update($request->all());
        $cars = Car::all();
        return view('cars.car', compact('cars'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Car::findOrFail($id)->delete();
        return redirect('cars');
    }

    public function search(Request $request)
    {

        //Car::create($request->input());
        $input = $request->except('_token');
        $search = $input['search'];
        $cars = Car::where('Name','like','%'.$search.'%')
            ->orWhere('Brand','like','%'.$search.'%')
            ->orWhere('Status','like','%'.$search.'%')
            ->orWhere('Color','like','%'.$search.'%')
            ->orWhere('Year','like','%'.$search.'%')
            ->paginate(20);
        return view('cars.search', compact('cars'));
    }

    public function filter(Request $request)
    {
        $input = $request->except('_token');
        $cars = Car::all();
        
        if($input['brand'] != ''){
            $cars = $cars->where('Brand', $input['brand']);
        }
        if($input['name'] != ''){
            $cars = $cars->where('Name', $input['name']);
        }
        if($input['year'] != ''){
            $cars = $cars->where('Year', $input['year']);
        }
        if($input['color'] != ''){
            $cars = $cars->where('Color', $input['color']);
        }
        if($input['transmission'] != ''){
            $cars = $cars->where('Transmission', $input['transmission']);
        }
        if($input['meri'] != ''){
            $cars = $cars->where('Meri', $input['meri']);
        }
        if($input['status'] != ''){
            $cars = $cars->where('Status', $input['status']);
        }
        return view('cars.car', compact('cars'));
    }
}
