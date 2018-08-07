<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AbsenceType;
use App\Http\Resources\AbsenceType as AbsenceTypeResource;

class AbsenceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $absenceType = AbsenceType::get();
      return AbsenceTypeResource::collection($absenceType);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $absenceType = new AbsenceType;
      $absenceType->name = $request->name;

      if($absenceType->save()){
        return new AbsenceTypeResource($absenceType);
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
      $absenceType = AbsenceType::find($id);
      return new AbsenceTypeResource($absenceType);
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
      $absenceType = AbsenceType::find($id);
      $absenceType->name = $request->name;

      if($absenceType->save()){
        return new AbsenceTypeResource($absenceType);
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
      $absenceType = AbsenceType::find($id);
      if($absenceType->delete()){
        return new AbsenceTypeResource($absenceType);
      }
    }
}
