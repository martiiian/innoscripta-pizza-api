<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Order;
use App\OrderGoods;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return OrderResource::collection(Order::all());
    }

    /**
     * Get orders by user id
     *
     * @return AnonymousResourceCollection
     */
    public function indexUser()
    {
        $orders = Order::where('user_id', auth()->id())->get();
        return OrderResource::collection($orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderRequest $request
     * @return OrderResource|JsonResponse
     */
    public function store(OrderRequest $request)
    {
        try {
            $data = $request->all();
            $order = Order::store($request->all());
            OrderGoods::store($data['goods'], $order->id);
            return new OrderResource($order->refresh());
        } catch (\Exception $e) {
            Log::info('Order failed', ['error' => $e]);
            return response()->json([
                'Bad request',
            ], 420);
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
}
