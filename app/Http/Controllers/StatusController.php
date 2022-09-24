<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Models\Status;
use Illuminate\Http\Response;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStatusRequest $request
     * @return Response
     */
    public function store(StoreStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Status $status
     * @return Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Status $status
     * @return Response
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStatusRequest $request
     * @param Status $status
     * @return Response
     */
    public function update(UpdateStatusRequest $request, Status $status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Status $status
     * @return Response
     */
    public function destroy(Status $status)
    {
        //
    }
}
