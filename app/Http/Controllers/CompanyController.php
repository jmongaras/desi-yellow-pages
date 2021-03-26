<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Inertia\Inertia;


class CompanyController extends Controller
{
    /**
     * List of companies
     */
    public function index()
    {
        $companies = Company::all();
        return Inertia::render('Companies/Index', [
            'companies' => $companies
        ]);
    }

    /**
     * Create of company
     */
    public function create()
    {
        return Inertia::render('Companies/Create');
    }


    /**
     * Create of company
     */
    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $company = [
            'created_by' => $userId,
            'name' => $request->get('name'),
        ];
        Company::create($company);

        return Inertia::render('Companies/Index')->with('success', 'User created.');
        // return redirect()->back()
        //     ->with('success', 'Company Created Successfully.');
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
