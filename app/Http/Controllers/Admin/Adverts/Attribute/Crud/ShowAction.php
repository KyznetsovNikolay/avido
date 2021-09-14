<?php

namespace App\Http\Controllers\Admin\Adverts\Attribute\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Adverts\Attribute;
use App\Models\Adverts\Category;

class ShowAction extends BaseController
{
    public function __invoke(Category $category, Attribute $attribute)
    {
        return view('admin.adverts.categories.attributes.show', compact('category', 'attribute'));
    }
}
