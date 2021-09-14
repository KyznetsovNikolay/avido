<?php

namespace App\Http\Controllers\Admin\Adverts\Category\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Adverts\Category;

class ShowEditFormAction extends BaseController
{
    public function __invoke(Category $category)
    {
        $parents = Category::defaultOrder()->withDepth()->get();
        return view('admin.adverts.categories.edit', compact('category', 'parents'));
    }
}
