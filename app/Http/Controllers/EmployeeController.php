<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Employee::paginate(10);
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
    public function store(Request $request)
    {
        //
        $newEmployee = new Employee;
        $newEmployee->FirstName = $request->Employee['FirstName'];
        $newEmployee->LastName = $request->Employee['LastName'];
        $newEmployee->Company = $request->Employee['Company'];
        $newEmployee->Email = $request->Employee['Email'];
        $newEmployee->Phone = $request->Employee['Phone'];
        $newEmployee->save();
        return $newEmployee;
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
        return Employee::find($id);
    }

    public function showByCompany($id){
        return Employee::where('company', '=', $id)->get();
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
        $existingEmployee = Employee::find($id);
        if($existingEmployee){
            $existingEmployee->FirstName = $request->Employee['FirstName'];
            $existingEmployee->LastName = $request->Employee['LastName'];
            $existingEmployee->Company = $request->Employee['Company'];
            $existingEmployee->Email = $request->Employee['Email'];
            $existingEmployee->Phone = $request->Employee['Phone'];
            $existingEmployee->save();
            return $existingEmployee;
        }

        return "Employee not found";
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
        $existingEmployee = Employee::find($id);
        if($existingEmployee){
            $existingEmployee->delete();
            return "Employee deleted";
        }
        return "Employee not found";
    }
}
