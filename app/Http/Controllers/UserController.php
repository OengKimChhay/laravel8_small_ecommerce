<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|unique:users', // unique:table name (this is to check dubplicate email)
            'pass' => 'required|min:4|same:re_pass'
        ],[
            'name.required' => 'សូមបំពេញឈ្មោះ',
            'email.required' => 'សូមបំពេញអីមែល',
            'email.unique' => 'អីមែលនេះត្រូវបានចុះឈ្មោះរួចហើយ',
            'pass.required' => 'សូមបំពេញលេខសម្ងាត់',
            'pass.min' => 'លេខសម្ងាត់ត្រូវតែ4តួ',
            'pass.same' => 'លេខសម្ងាត់ផ្ទៀងផ្ទាត់មិនត្រូវគ្នា',
        ]);

        $data = new User;
        $data->name = $req->name;
        $data->email = $req->email;   //if u want to check duplicate email when create acc $check = user::where('email', $req->email)->get(); if(count($check)>0){make session to tell duplicate email..}
        $data->password = Hash::make($req->pass); //to hash password
        $create = $data->save();
        // to check if data has been saved!
        if($create){
            return redirect()->back()->with('success','Register success!');
        } else{
            return redirect()->back()->with('fail','there is something wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
