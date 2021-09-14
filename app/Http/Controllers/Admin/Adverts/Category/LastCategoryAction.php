<?php

namespace App\Http\Controllers\Admin\Adverts\Category;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Adverts\Category;

class LastCategoryAction extends BaseController
{
    public function __invoke(Category $category)
    {
        if ($last = $category->siblings()->defaultOrder('desc')->first()) {
            $category->insertAfterNode($last);
        }
        return redirect()->route('admin.adverts.categories.index');
    }
}
