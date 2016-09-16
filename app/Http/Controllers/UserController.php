<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = request()->get('role');

        if($role){
            return User::whereHas('role', function($q) use ($role) { $q->where('name', $role); })->get();
        }
        return User::all();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);
    }

    /**
     * Display the orders for the user.
     *
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function orders($id){
        return User::find($id)->orders;
    }
}
