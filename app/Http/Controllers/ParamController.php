<?php

namespace App\Http\Controllers;

use App\Param;
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
        return view('params', compact('param'));
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
}
