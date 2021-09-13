<?php

namespace App\Http\Controllers\Admin\Cities\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\City\City;

class ShowEditFormAction extends BaseController
{
    public function __invoke(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }
}
