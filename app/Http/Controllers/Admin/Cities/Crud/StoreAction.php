<?php

namespace App\Http\Controllers\Admin\Cities\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\City\City;
use App\Models\Region\Region;
use App\Http\Requests\Admin\Cities\Request;

class StoreAction extends BaseController
{
    public function __invoke(Request $request, Region $region)
    {
        City::create([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'region_id' => $region->id,
        ]);

        return redirect()->route('admin.regions.show', $region);
    }
}
