<?php

namespace App\Http\Controllers\Admin\Adverts\Category\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Adverts\Category;

class DeleteAction extends BaseController
{
    public function __invoke(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.adverts.categories.index');
    }
}
