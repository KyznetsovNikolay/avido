<?php

namespace App\Http\Controllers\Admin\Cities\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\City\City;
use App\Http\Requests\Admin\Cities\Request;

class UpdateAction extends BaseController
{
    public function __invoke(Request $request, City $city)
    {
        $city->update([
            'name' => $request['name'],
            'slug' => $request['slug'],
        ]);

        return redirect()->route('admin.cities.show', $city);
    }
}
