<?php

namespace App\Http\Controllers;

use App\Http\Resources\SizeCollection;
use App\Http\Resources\SizeResource;
use App\Size;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return SizeCollection
     */
    public function index()
    {
        return new SizeCollection(Size::all());
    }

    /**
     * Show the form for creating a new resource.
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
