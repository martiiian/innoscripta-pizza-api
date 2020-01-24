<?php

namespace App\Http\Controllers;

use App\Good;
use App\Http\Resources\GoodResource;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return GoodResource::collection(Good::all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return GoodResource|array
     */
    public function show($id)
    {
        $good = Good::find($id);

        return $good->count() > 0
            ? new GoodResource($good)
            : [];
    }
}
