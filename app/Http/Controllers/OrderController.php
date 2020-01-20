<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return OrderResource::collection(Order::all());
    }

    /**
     * Get orders by user id
     *
     * @param Request $request
     * @param int $user_id
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function indexUserId(Request $request, int $user_id)
    {
        $orders = Order::where('user_id', $user_id)->get();
        return OrderResource::collection($orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param OrderRequest $request
     * @return OrderResource
     */
    public function create(OrderRequest $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return OrderResource
     */
    public function store(Request $request)
    {
        // temporary before add creating user
        $data = [
            'user_id' => 1
        ];
        $order = Order::store(array_merge($request->all(), $data));
        return new OrderResource($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return OrderResource
     */
    public function show(int $id)
    {
        return new OrderResource(Order::find($id));
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
