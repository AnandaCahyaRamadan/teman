<?php

namespace App\Http\Controllers;

use App\Models\SubComments;
use App\Http\Requests\StoreSubCommentsRequest;
use App\Http\Requests\UpdateSubCommentsRequest;

class SubCommentsController extends Controller
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
     * @param  \App\Http\Requests\StoreSubCommentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubCommentsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubComments  $subComments
     * @return \Illuminate\Http\Response
     */
    public function show(SubComments $subComments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubComments  $subComments
     * @return \Illuminate\Http\Response
     */
    public function edit(SubComments $subComments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubCommentsRequest  $request
     * @param  \App\Models\SubComments  $subComments
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubCommentsRequest $request, SubComments $subComments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubComments  $subComments
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubComments $subComments)
    {
        //
    }
}
