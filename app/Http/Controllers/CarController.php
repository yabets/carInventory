<?php

namespace App\Http\Controllers;

use App\Owner;
use App\Param;
use Carbon\Carbon;
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
        $cars = Car::where('Status', 'available')->latest()->get();
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
        $car = new Car;
        // check if file was uploaded
        if ($request->hasFile('image')) {
            // get the file object
            $file = $request->file('image');
            // set the upload path (starting form the public path)
            $rewardsUploadPath = '/uploads/images/';
            // create a unique name for this file
            $fileName = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString())
                . '-' . str_random(5) . '.' . $file->getClientOriginalExtension();
            // move the uploaded file to its destination
            $file->move(public_path() . $rewardsUploadPath, $fileName);
            // save the file path and name
            //$filePathAndName = $rewardsUploadPath . $fileName;
            $car->Image = $fileName;
        }
        $car->Brand = $input["brand"];
        $car->Name = $input["name"];
        $car->Year = $input["year"];
        $car->Color = $input["color"];
        $car->Price = $input["price"];
        $car->Plate = $input["plate"];
	$car->Type = $input["type"];
	$car->Transmission = $input["transmission"];
	$car->PlateType = $input["platetype"];
	$car->Status = $input["status"];
	
        $car->location = $input["location"];
        $car->remark = $input["remark"];
        $car->meri = $input["meri"];
        $car->mileage = $input["mileage"];
        $car->published = $input["published"];
        if($input['oname']!=""){
            $owner = new Owner;
            $owner->Name = $input['oname'];
            $owner->Phone = $input['phone'];
            $owner->AltPhone = $input['altPhone'];
            $owner->Owner = $input['Owner'];
            $owner->save();
            $owner->cars()->save($car);
            return redirect('cars');
        }
        $car->owner_id = $input['owner_id'];
        $car->save();
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
        if ($request->hasFile('image')) {
            // get the file object
            $file = $request->file('image');
            // set the upload path (starting form the public path)
            $rewardsUploadPath = '/uploads/images/';
            // create a unique name for this file
            $fileName = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString())
                . '-' . str_random(5) . '.' . $file->getClientOriginalExtension();
            // move the uploaded file to its destination
            $file->move(public_path() . $rewardsUploadPath, $fileName);
            // save the file path and name
            //$filePathAndName = $rewardsUploadPath . $fileName;
            $car->Image = $fileName;
        }
        $car->update($request->except('Image'));
        $cars = Car::latest()->get();
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
        $cars = Car::latest()->get();
        
        if($input['brand'] != ''){
            $cars = $cars->where('Brand', $input['brand']);
        }
        if($input['name'] != ''){
            $cars = $cars->where('Name', $input['name']);
        }
        if($input['type'] != ''){
            $cars = $cars->where('Type', $input['type']);
        }
        if($input['platetype'] != ''){
            $cars = $cars->where('PlateType', $input['platetype']);
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
        if($input['owner_id'] != ''){
            $cars = $cars->where('owner_id', (int)$input['owner_id']);
        }
        if($input['priceFrom'] != '' and $input['priceTo'] == ''){
            $cars = $cars->where('Price', (int)$input['priceFrom']);
        }
        if($input['priceFrom'] == '' and $input['priceTo'] != ''){
            $cars = $cars->where('Price', (int)$input['priceTo']);
        }
        if($input['priceFrom'] != '' and $input['priceTo'] != ''){
            $cars = $cars->filter(function($car)use($input){
               return (data_get($car, 'Price') >= $input['priceFrom']) && (data_get($car, 'Price') <= $input['priceTo']);
            });
        }
        if($input['yearFrom'] != '' and $input['yearTo'] != ''){
            $cars = $cars->filter(function($car)use($input){
               return (data_get($car, 'Year') >= $input['yearFrom']) && (data_get($car, 'Year') <= $input['yearTo']);
            });
        }
        return view('cars.car', compact('cars'));
    }
}
