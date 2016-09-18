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
    public function create(Requests\OrderCreateRequest $request)
    {
        $order = new Order();
        $order->userId = $request->get('userId');
        $order->retailerId = $request->get('retailerId');
        $order->total = $request->get('total');
        $order->status = array_search($request->get('status'), Order::$statuses);

        if($order->save()){
            return $order;
        }

        return response()->json(['success' => false], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Order::find($id);
        return $item ? $item : response()->json(['success' => false], 404);
    }

    public function showUser($id)
    {
        $item = Order::find($id)->user;
        return $item ? $item : response()->json(['success' => false], 404);
    }

    public function showRetailer($id)
    {
        $item = Order::find($id)->retailer;
        return $item ? $item : response()->json(['success' => false], 404);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\OrderUpdateRequest $request, $id)
    {
        $result = Order::where('id', $id)->update(['status' => array_search($request->get('status'), Order::$statuses)]);

        if($result) {
            return Order::find($id);
        }

        return response()->json(['success' => false], 422);
    }

}
