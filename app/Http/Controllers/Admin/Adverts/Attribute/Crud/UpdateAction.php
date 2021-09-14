<?php

namespace App\Http\Controllers\Admin\Adverts\Attribute\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Adverts\Attribute;
use App\Models\Adverts\Category;
use App\Http\Requests\Admin\Adverts\Attribute\Request;

class UpdateAction extends BaseController
{
    public function __invoke(Request $request, Category $category, Attribute $attribute)
    {
        $category->attributes()->findOrFail($attribute->id)->update([
            'name' => $request['name'],
            'type' => $request['type'],
            'required' => (bool)$request['required'],
            'variants' => array_map('trim', preg_split('#[\r\n]+#', $request['variants'])),
            'sort' => $request['sort'],
        ]);

        return redirect()->route('admin.adverts.categories.show', $category);
    }
}
