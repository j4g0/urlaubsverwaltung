<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vacation;
use App\Http\Resources\Vacation as VacationResource;

class VacationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $vacations = Vacation::get();
      return VacationResource::collection($vacations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $vacation = new Vacation;
      $vacation->from         = $request->from;
      $vacation->to           = $request->to;
      $vacation->employee_id  = $request->employee_id;

      if($vacation->save()){
        return new VacationResource($vacation);
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
      $vacation = Vacation::find($id);
      return new VacationResource($vacation);
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
      $vacation = Vacation::find($id);
      $vacation->from         = $request->from;
      $vacation->to           = $request->to;
      $vacation->employee_id  = $request->employee_id;

      if($vacation->save()){
        return new VacationResource($vacation);
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
      $vacation = Vacation::find($id);
      if($vacation->delete()){
        return new VacationResource($vacation);
      }
    }
}
