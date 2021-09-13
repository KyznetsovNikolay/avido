<?php

namespace App\Http\Controllers\Admin\Regions\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Region\Region;
use App\Http\Requests\Admin\Regions\Request;

class UpdateAction extends BaseController
{
    public function __invoke(Request $request, Region $region)
    {
        $region->update([
            'name' => $request['name'],
            'slug' => $request['slug'],
        ]);

        return redirect()->route('admin.regions.show', $region);
    }
}
