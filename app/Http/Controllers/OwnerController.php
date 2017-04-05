<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Owner;

use DB;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $owners = Owner::latest()->get();
//        return view('owners.owner', compact('owners'));

        $owners = DB::table('owners')->paginate(20);
        return view('owners.owner', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owners.create');
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
//        $validator = Validator::make($input, [
//            "name"=>"required|min:1|alpha_num"
//        ]);
//        if($validator->fails()){
//            return redirect('post/create')
//                ->withErrors($validator)
//                ->withInput();
//        }

        Owner::create($input);
        return redirect('owners');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $owner = Owner::findOrFail($id);
        return view('owners.view', compact('owner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $owner = Owner::findOrFail($id);
        return view('owners.edit', compact('owner'));
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
        $owner = Owner::findOrFail($id);
        $input = $request->except('_method', '_token');
        $owner->update($input);
        return redirect('owners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $owner = Owner::findOrFail($id);
        $owner->delete();

        return redirect('owners');
    }

    public function search(Request $request)
    {

        //Car::create($request->input());
        $input = $request->except('_token');
        $search = $input['search'];
        if($input['search']== 'Agent'){
            $owners = Owner::all();
            $owners = $owners->where('Owner', 0);
            return view('owners.search', compact('owners'));
        }
        if($input['search']== 'Owner'){
            $owners = Owner::all();
            $owners = $owners->where('Owner', 1);
            return view('owners.search', compact('owners'));
        }
        $owners = Owner::where('Name','like','%'.$search.'%')
            ->orWhere('Phone','like','%'.$search.'%')
            ->orWhere('AltPhone','like','%'.$search.'%')
            ->orWhere('Owner','like','%'.$search.'%')
            ->paginate(20);
        return view('owners.search', compact('owners'));
    }

}
