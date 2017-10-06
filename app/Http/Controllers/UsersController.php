<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

        //I am having error at this point
        $this->middleware('admin');
    }

    public function index()
    {
        //
        return view('admin.users.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request->all())
  
      $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email']);

        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=>bcrypt('password')]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar'=>'upload/avatars/avatar.jpg']);

        Session::flash('success', 'User Added Successfully');

        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function makeAdmin($id){
        $user = User::find($id);

        $user->admin = 1;

        $user->save();

        Session::flash('success', 'Successfully made Admin');

        return redirect()->back();
    }

    public function notAdmin($id){
         $user = User::find($id);

        $user->admin = 0;

        $user->save();

        Session::flash('success', 'No Longer Admin');

        return redirect()->back();
    }
}
