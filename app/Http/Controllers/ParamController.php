<?php

namespace App\Http\Controllers;

use App\Param;
use App\RequestedCar;
use Illuminate\Http\Request;

use App\Http\Requests;

class ParamController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $param = Param::first();
        return view('param', compact('param'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $param = Param::first();
        $brands = $param["Brand"];
        $names = unserialize(base64_decode($param["Name"]));
        // $toDatabse = base64_encode(serialize($data));  // Save to database
        // $fromDatabase = unserialize(base64_decode($data)); //Getting Save Format 
        return view('params', compact('param', 'brands', 'names'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $params = Param::first();
        $input = $request->except('_token', '_method');
        $params->update($input);
        return redirect('/param');
    }

    public function updates(Request $request){
        $brand = $request['brand'];
        $model = $request['name'];
        $param = Param::first();
        //$name = unserialize($param->Name);
        $name = unserialize(base64_decode($param->Name));
        // $toDatabse = base64_encode(serialize($data));  // Save to database
        // $fromDatabase = unserialize(base64_decode($data)); //Getting Save Format 
        $name[$brand] = $model;
        $param->Name = serialize(base64_encode($name));
        // $toDatabse = base64_encode(serialize($data));  // Save to database
        // $fromDatabase = unserialize(base64_decode($data)); //Getting Save Format 
        $param->save();
        return 'done';
    }

    public function brand(Request $request){
        $brand = $request['brand'];
        $param = Param::first();
        $name = unserialize(base64_decode($param->Name));
        //$names = unserialize(base64_decode($param["Name"]));
        // $toDatabse = base64_encode(serialize($data));  // Save to database
        // $fromDatabase = unserialize(base64_decode($data)); //Getting Save Format 
        if($brand != ''){
            $name[$brand] = '';    
        }
        $param->Name = serialize(base64_encode($name));
        $param->Brand = $param->Brand.','. $brand;
        $param->save();
        return $param->Brand. " " . $param->Name;
    }
}
