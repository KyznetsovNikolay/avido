<?php

namespace App\Http\Controllers\Admin\Regions\Crud;

use App\Http\Controllers\Admin\BaseController;
use Illuminate\Http\Request;

class CreateAction extends BaseController
{
    public function __invoke(Request $request)
    {
        return view('admin.regions.create');
    }
}
