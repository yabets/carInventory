<?php

namespace App\Http\Controllers;

use App\Param;
use App\RequestedCar;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

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
        return view('params', compact('param', 'brands'));
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

    /**
     * Update names table with model name for selected brand
     *
     * @param Request $request
     * @return string
     */
    public function updates(Request $request){
        $brand = $request['brand'];
        $model = $request['name'];
//        $param = Param::first();
//        DB::table('names')
//            ->where('Brand', $brand)
//            ->update('Name', $model);
        //DB::table('names')->insert(['Brand' => $brand, 'Name' => $model ]);
        DB::table('names')->where('Brand', $brand)->update(['Name' => $model]);
            //->insert(['Brand' => $brand, 'Name' => $model ]);
        //$name = unserialize($param->Name);
        //DB::table('users')
//        ->where('id', 1)
//            ->update(['votes' => 1]);
//        $name[$brand] = $model;
        //$param->Name = serialize($name);
//        $param->save();
        return 'updated';
    }

    /**
     * Insert a new brand
     *
     * @param Request $request
     * @return string
     */
    public function brand(Request $request){
        $brand = $request['brand'];
        $param = Param::first();
        //$name = unserialize($param->Name);
        if($brand != ''){
            $name[$brand] = '';    
        }
        //$param->Name = serialize($name);
        $param->Brand = $param->Brand.','. $brand;
        $param->save();
        DB::table('names')->insert(['Brand' => $brand]);
        return $param->Brand;
    }
}
