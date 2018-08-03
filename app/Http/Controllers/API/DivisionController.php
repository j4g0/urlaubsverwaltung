<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Division;
use App\Http\Resources\Division as DivisionResource;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $divisions = Division::get();
      return DivisionResource::collection($divisions);
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
      $division = new Division;
      $division->name = $request->name;

      if($division->save()){
        return new DivisionResource($division);
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
      $division = Division::findOrFail($id);
      return new DivisionResource($division);
    }

    /**
     * Update the specified resource in storage.
        //
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $division = Division::findOrFail($id);
      $division->name = $request->name;

      if($division->save()){
        return new DivisionResource($division);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $division = Division::findOrFail($id);
      if($division->delete()){
        return new DivisionResource($division);
      }
    }
}
