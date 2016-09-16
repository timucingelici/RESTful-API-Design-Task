<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = request()->get('status');
        $userId = request()->get('user_id');
        $retailerId = request()->get('retailer_id');

//        $order = new Order();
//        return $order
//            ->filterBy('status', array_search($status, Order::$statuses))
//            ->filterBy('userId', $userId)
//            //->filterBy('retailerId', $retailerId)
//            ->get();

        $order = Order::query();

        if($status){
            $order->where('status', array_search($status, Order::$statuses));
        }

        if($userId){
            $order->where('userId', $userId);
        }

        if($retailerId){
            $order->where('retailerId', $retailerId);
        }

        return $order->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status = request()->get('status');

        return Order::find($id);
    }

    public function showUser($id)
    {
        return Order::find($id)->user;
    }

    public function showRetailer($id)
    {
        return Order::find($id)->retailer;
    }

    public function summary(){

        return [
            'orders' => Order::count(),
            'accepted' => Order::where('status', Order::ACCEPTED)->count(),
            'rejected' => Order::where('status', Order::REJECTED)->count(),
            'cancelled' => Order::where('status', Order::CANCELLED)->count(),
            'pending' => Order::where('status', Order::PENDING)->count(),
            'shipped' => Order::where('status', Order::SHIPPED)->count(),
            'totalAmount' => (int) Order::sum('total')
        ];

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
