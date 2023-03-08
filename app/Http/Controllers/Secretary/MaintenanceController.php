<?php

namespace App\Http\Controllers\Secretary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MrRequest;
use App\Http\Resources\MreqResource;
use App\Models\Maintenance;
use Illuminate\Http\JsonResponse;
use Exception;



class MaintenanceController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mreqs = Maintenance::latest()->get();

        return response([
            'message' => 'success',
            'todos' =>   MreqResource::collection($mreqs),
        ], 200);
        //return view('dumaguete.maintenance_request.index');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MrRequest $mrRequest)
    {

        $mrRequest->validated();

        $saveData = Maintenance::create([
            'name' => $mrRequest->name,
            'description' => $mrRequest->description,
        ]);

        if ($saveData) {
            return response([
                'message' => 'success',
                'mrequest' => new MreqResource($saveData)
            ], 200);
        } else {
            return response([
                'message' => 'error',

            ], 500);
        }
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
