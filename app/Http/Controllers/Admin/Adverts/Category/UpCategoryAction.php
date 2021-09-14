<?php

namespace App\Http\Controllers\Admin\Adverts\Category;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Adverts\Category;

class UpCategoryAction extends BaseController
{
    public function __invoke(Category $category)
    {
        $category->up();
        return redirect()->route('admin.adverts.categories.index');
    }
}
