<?php

namespace App\Http\Controllers\Admin\Regions\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Region\Region;

class ShowEditFormAction extends BaseController
{
    public function __invoke(Region $region)
    {
        return view('admin.regions.edit', compact('region'));
    }
}
