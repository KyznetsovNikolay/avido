<?php

namespace App\Http\Controllers\Admin\Adverts\Category\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Adverts\Category;

class CreateAction extends BaseController
{
    public function __invoke()
    {
        $parents = Category::defaultOrder()->withDepth()->get();

        return view('admin.adverts.categories.create', compact('parents'));
    }
}
