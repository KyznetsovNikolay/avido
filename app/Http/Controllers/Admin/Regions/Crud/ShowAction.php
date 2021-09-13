<?php

namespace App\Http\Controllers\Admin\Regions\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Region\Region;

class ShowAction extends BaseController
{
    public function __invoke(Region $region)
    {
        $cities = $region->cities()->get();
        return view('admin.regions.show', compact('region', 'cities'));
    }
}
