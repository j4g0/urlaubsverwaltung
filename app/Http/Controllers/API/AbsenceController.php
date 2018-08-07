<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Absence;
use App\Http\Resources\Absence as AbsenceResource;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $absences = Absence::get();
      return AbsenceResource::collection($absences);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $absence = new Absence;
      $absence->from            = $request->from;
      $absence->to              = $request->to;
      $absence->employee_id     = $request->employee_id;
      $absence->absence_type_id = $request->absence_type_id;

      if($absence->save()){
        return new AbsenceResource($absence);
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
      $absence = Absence::find($id);
      return new AbsenceResource($absence);
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
      $absence = Absence::find($id);
      $absence->from            = $request->from;
      $absence->to              = $request->to;
      $absence->employee_id     = $request->employee_id;
      $absence->absence_type_id = $request->absence_type_id;

      if($absence->save()){
        return new AbsenceResource($absence);
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
      $absence = Absence::find($id);
      if($absence->delete()){
        return new AbsenceResource($absence);
      }
    }
}
