<?php

namespace App\Http\Controllers\Admin\Adverts\Category;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Adverts\Category;

class FirstCategoryAction extends BaseController
{
    public function __invoke(Category $category)
    {
        if ($first = $category->siblings()->defaultOrder()->first()) {
            $category->insertBeforeNode($first);
        }
        return redirect()->route('admin.adverts.categories.index');
    }
}
