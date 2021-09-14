<?php

namespace App\Http\Controllers\Admin\Adverts\Category\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Adverts\Category;

class IndexAction extends BaseController
{
    public function __invoke()
    {
        $categories = Category::defaultOrder()->withDepth()->get();
        return view('admin.adverts.categories.index', compact('categories'));
    }
}
