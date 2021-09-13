<?php

namespace App\Http\Controllers\Admin\Cities\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Region\Region;
use Illuminate\Http\Request;

class CreateAction extends BaseController
{
    public function __invoke(Request $request, Region $region)
    {
        return view('admin.cities.create', compact('region'));
    }
}
