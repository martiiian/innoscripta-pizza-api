<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Order;
use App\OrderGoods;
use App\User;
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
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return OrderResource
     * @throws \JsonException
     */
    public function store(OrderRequest $request)
    {
        try {
            $data = $request->all();
            $data['user_id'] = User::store($data)->id;
            $order = Order::store(array_merge($request->all(), $data));
            OrderGoods::store($data['goods'], $order->id);
            return new OrderResource($order->refresh());
        } catch (\Exception $e) {
            throw new \JsonException('bad request');
        }
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
