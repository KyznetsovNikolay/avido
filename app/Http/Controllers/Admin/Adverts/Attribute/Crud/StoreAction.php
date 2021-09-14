<?php

namespace App\Http\Controllers\Admin\Adverts\Attribute\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Adverts\Category;
use App\Http\Requests\Admin\Adverts\Attribute\Request;

class StoreAction extends BaseController
{
    public function __invoke(Request $request, Category $category)
    {
        $attribute = $category->attributes()->create([
            'name' => $request['name'],
            'type' => $request['type'],
            'required' => (bool)$request['required'],
            'variants' => array_map('trim', preg_split('#[\r\n]+#', $request['variants'])),
            'sort' => $request['sort'],
        ]);

        return redirect()->route('admin.adverts.categories.attributes.show', [$category, $attribute]);
    }
}
