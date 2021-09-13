<?php

namespace App\Http\Controllers\Admin\Regions\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Region\Region;

class IndexAction extends BaseController
{
    public function __invoke()
    {
        $regions = Region::orderBy('name')->get();
        return view('admin.regions.index', compact('regions'));
    }
}
