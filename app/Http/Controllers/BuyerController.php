<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\Owner;
use Illuminate\Http\Request;

use App\Http\Requests;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyers = Buyer::latest()->get();
        return view('buyers.buyer', compact('buyers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buyers.create');
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

        Buyer::create($input);
        return redirect('buyers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buyer = Buyer::findOrFail($id);
        return view('buyers.view', compact('buyer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buyer = Buyer::findOrFail($id);
        return view('buyers.edit', compact('buyer'));
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
        $buyer = $request->except('_method', '_token');
        Buyer::findOrFail($id)->update($request->all());
        return redirect('buyers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Buyer::findOrFail($id)->delete();
        return redirect('buyers');
    }

    public function search(Request $request)
    {

        //Car::create($request->input());
        $input = $request->except('_token');
        $search = $input['search'];
        $buyers = Buyer::where('Name','like','%'.$search.'%')
            ->orWhere('Phone','like','%'.$search.'%')
            ->orWhere('AltPhone','like','%'.$search.'%')
            ->orWhere('Star','like','%'.$search.'%')
            ->paginate(20);

        return view('buyers.buyer', compact('buyers'));
    }
}
