<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;
use App\Http\Resources\Employee as EmployeeResource;
use App\Division;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $employees = Employee::get();
      return EmployeeResource::collection($employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $employee = new Employee;
      $employee->first_name = $request->first_name;
      $employee->last_name = $request->last_name;

      $employee->save();

      // Store respective divisions in pivot table
      $division = Division::find([1,3]);
      $employee->divisions()->attach($division);

      /* if($employee->save()){ */
      /*   return new EmployeeResource($employee); */
      /* } */
      return "Success";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $employee = Employee::findOrFail($id);
      return new EmployeeResource($employee);
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
      $employee = Employee::findOrFail($id);
      $employee->first_name = $request->first_name;
      $employee->last_name = $request->last_name;

      if($employee->save()){
        return new EmployeeResource($employee);
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
      $employee = Employee::findOrFail($id);
      if($employee->delete()){
        return new EmployeeResource($employee);
      }
    }
}
