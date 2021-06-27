<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Resources\OrderResource;
use Illuminate\Support\Facades\Validator;
use App\Models\AppHttpResponse;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
                $number = mt_rand(100, 999);
                $uniqueId = "E&R-". $number;

                $order = new Order;
                $order->product_id = $request->id;
                $order->product_name = $request->name;
                $order->image = $request->image;
                $order->vendor_id = $request->user_id;
                $order->user_id = auth('api')->id();
                $order->quantity = $request->productQty;
                $order->save();
                $order->order_id = $uniqueId.$order->id;
                $order->update();
                return AppHttpResponse::responseSuccess(
                    Response::HTTP_CREATED,
                    "order added successfully",
                    new OrderResource($order)
                );
    }

    public function customerOrders(){
        $orders =  Order::where('user_id', auth('api')->id() )->orderBy('created_at','DESC')->get();
        return OrderResource::collection( $orders );
    }

    public function vendorOrders(){
        $orders =  Order::where('vendor_id', auth('api')->id() )->orderBy('created_at','DESC')->get();
        return OrderResource::collection( $orders );
    }

    public function allOrders(){
        $orders =  Order::orderBy('created_at','DESC')->get();
        return OrderResource::collection( $orders );
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
