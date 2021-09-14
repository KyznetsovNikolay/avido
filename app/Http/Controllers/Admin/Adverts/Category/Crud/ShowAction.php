<?php

namespace App\Http\Controllers\Admin\Adverts\Category\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Adverts\Category;

class ShowAction extends BaseController
{
    public function __invoke(Category $category)
    {
        return view('admin.adverts.categories.show', compact('category'));
    }
}
