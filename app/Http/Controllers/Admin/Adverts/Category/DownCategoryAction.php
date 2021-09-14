<?php

namespace App\Http\Controllers\Admin\Adverts\Category;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Adverts\Category;

class DownCategoryAction extends BaseController
{
    public function __invoke(Category $category)
    {
        $category->down();
        return redirect()->route('admin.adverts.categories.index');
    }
}
