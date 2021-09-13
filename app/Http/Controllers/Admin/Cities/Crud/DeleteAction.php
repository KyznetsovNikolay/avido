<?php

namespace App\Http\Controllers\Admin\Cities\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\City\City;

class DeleteAction extends BaseController
{
    public function __invoke(City $city)
    {
        $region = $city->region;
        $city->delete();
        return redirect()->route('admin.regions.show', $region);
    }
}
