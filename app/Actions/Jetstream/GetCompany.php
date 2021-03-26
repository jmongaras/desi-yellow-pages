<?php

namespace App\Actions\Jetstream;

use App\Models\Company;

class GetCompany
{
    public function __invoke()
    {
        $companies = Company::all();
        return $companies;
    }
}
