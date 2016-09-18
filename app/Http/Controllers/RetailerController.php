<?php

namespace App\Http\Controllers;

use App\Models\Retailer;
use Illuminate\Http\Request;

use App\Http\Requests;

class RetailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Retailer::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Retailer::find($id);
        return $item ? $item : response()->json(['success' => false], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Requests\RetailerEditRequest $request, $id)
    {
        $retailer = Retailer::find($id);

        if($retailer){
            $retailer->name = $request->get('name');
            $retailer->location = $request->get('location');
            $retailer->email = $request->get('email');

            if($retailer->save()){
                return $retailer;
            }
        }

        return response()->json(['success' => false], 500);
    }

}
