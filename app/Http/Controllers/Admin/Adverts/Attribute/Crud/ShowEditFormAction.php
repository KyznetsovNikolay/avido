<?php

namespace App\Http\Controllers\Admin\Adverts\Attribute\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Adverts\Attribute;
use App\Models\Adverts\Category;

class ShowEditFormAction extends BaseController
{
    public function __invoke(Category $category, Attribute $attribute)
    {
        $types = Attribute::typesList();
        return view('admin.adverts.categories.attributes.edit', compact('category', 'attribute', 'types'));
    }
}
