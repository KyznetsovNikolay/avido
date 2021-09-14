<?php

namespace App\Http\Controllers\Admin\Adverts\Category\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Adverts\Category;
use App\Http\Requests\Admin\Adverts\Category\Request;

class UpdateAction extends BaseController
{
    public function __invoke(Request $request, Category $category)
    {
        $category->update([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'parent_id' => $request['parent'],
        ]);

        return redirect()->route('admin.adverts.categories.show', $category);
    }
}
