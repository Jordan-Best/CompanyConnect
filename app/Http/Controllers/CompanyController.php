<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Company::paginate(10);
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
        $newCompany = new Company;
        $newCompany->Name = $request->Company["Name"];
        $newCompany->Email = $request->Company["Email"];
        $newCompany->Logo = $request->Company["Logo"];
        $newCompany->Website = $request->Company["Website"];
        $newCompany->save();

        return $newCompany;
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
        return Company::find($id);
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
        $existingCompany = Company::find($id);
        if($existingCompany){
            $existingCompany->Name = $request->Company['Name'];
            $existingCompany->Email = $request->Company['Email'];
            $existingCompany->Logo = $request->Company['Logo'];
            $existingCompany->Website = $request->Company['Website'];
            $existingCompany->save();
            return $existingCompany;
        }

        return "Company not found";
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
        $existingCompany = Company::find($id);
        if($existingCompany){
            $existingCompany->delete();
            return "Company deleted";
        }
        return "Company not found";
    }
}
