<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;


class CompanyController extends Controller
{
    /**
     * List of companies
     */
    public function index()
    {
        return Inertia::render('Companies/Index');
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
}
