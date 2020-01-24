<?php

namespace App\Http\Controllers;

use App\Http\Resources\SizeResource;
use App\Size;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return SizeResource::collection(Size::all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return SizeResource|array
     */
    public function show($id)
    {
        $size = Size::find($id);
        return $size->count() > 0
            ? new SizeResource($size)
            : [];
    }
}
