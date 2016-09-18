<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Requests\UserCreateRequest $request)
    {
        $user = new User();
        $user->firstName = $request->get('firstName');
        $user->lastName = $request->get('lastName');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->roleId = Role::where('name', $request->get('role'))->value('id');

        if($user->save()){
            return $user;
        }

        return response()->json(['success' => false], 500);
    }

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
        $item = User::find($id);
        return $item ? $item : response()->json(['success' => false], 404);
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
