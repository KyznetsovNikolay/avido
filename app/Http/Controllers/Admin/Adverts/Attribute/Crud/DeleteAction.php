<?php

namespace App\Http\Controllers\Admin\Adverts\Attribute\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Adverts\Attribute;
use App\Models\Adverts\Category;

class DeleteAction extends BaseController
{
    public function __invoke(Category $category, Attribute $attribute)
    {
        $attribute->delete();
        return redirect()->route('admin.adverts.categories.show', $category);
    }
}
