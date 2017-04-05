<?php

namespace App\Http\Controllers;

use App\Param;
use App\RequestedCar;
use Illuminate\Http\Request;

use App\Http\Requests;

class RequestedCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = RequestedCar::latest()->paginate(20);
        return view ('requestedcars.car', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('requestedcars');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect('requestedcars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = RequestedCar::findOrFail($id);
        return view('requestedcars.view', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = RequestedCar::findOrFail($id);
        $params = Param::first();
        return view('requestedcars.edit', compact('car', 'params'));
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
        RequestedCar::findOrFail($id)->update($request->all());
        return redirect('requestedcars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RequestedCar::findOrFail($id)->delete();
        return redirect('requestedcars');
    }

    public function search(Request $request)
    {
        $input = $request->except('_token');
        $search = $input['search'];

        $cars = RequestedCar::where('Brand', 'like', '%'.$search.'%')
            ->orWhere('Name','like','%'.$search.'%')
            ->orWhere('Year','like','%'.$search.'%')
            ->orWhere('Color','like','%'.$search.'%')
            ->orWhere('Transmission','like','%'.$search.'%')
            ->orWhere('Plate','like','%'.$search.'%')
            ->orWhere('Status','like','%'.$search.'%')
            ->orWhere('Meri','like','%'.$search.'%')
            ->paginate(20);
        return view ('requestedcars.car', compact('cars'));
    }

    public function filter(Request $request){
        $input = $request->except('_token');
        $cars = RequestedCar::latest()->get();

        if($input['brand'] != ''){
        $cars = $cars->where('Brand', $input['brand']);
        }
        if($input['name'] != ''){
            $cars = $cars->where('Name', $input['name']);
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
        if($input['year'] != ''){
            $cars = $cars->where('Year', $input['year']);
        }
        if($input['priceFrom'] != '' and $input['priceTo'] != ''){
            $cars = $cars->filter(function($car)use($input){
                return (data_get($car, 'priceFrom') >= $input['priceFrom']) or (data_get($car, 'priceTo') <= $input['priceTo']);
            });
        }

        return view('requestedcars.car', compact('cars'));
    }
}
