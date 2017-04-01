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
        $names = unserialize($param["Name"]);

        //JavaScript::put('params2', $param);
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
        $name = unserialize($param->Name);
        $name[$brand] = $model;
        $param->Name = serialize($name);
        $param->save();
        return 'done';
    }

    public function brand(Request $request){
        $brand = $request['brand'];
        $param = Param::first();
        $name = unserialize($param->Name);
        $name[$brand] = '';
        $param->Name = serialize($name);
        $param->Brand = $param->Brand.','. $brand;
        $param->save();
        return $param->Brand. " " . $param->Name;
    }
}
