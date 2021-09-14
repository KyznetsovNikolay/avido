<?php

namespace App\Http\Controllers\Admin\Adverts\Attribute\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Adverts\Attribute;
use App\Models\Adverts\Category;

class CreateAction extends BaseController
{
    public function __invoke(Category $category)
    {
        $types = Attribute::typesList();
        return view('admin.adverts.categories.attributes.create', compact('category', 'types'));
    }
}
