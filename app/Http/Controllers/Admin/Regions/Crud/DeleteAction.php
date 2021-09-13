<?php

namespace App\Http\Controllers\Admin\Regions\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Region\Region;

class DeleteAction extends BaseController
{
    public function __invoke(Region $region)
    {
        $region->delete();
        return redirect()->route('admin.regions.index');
    }
}
