<?php

namespace App\Http\Controllers\Admin\Users\Crud;

use App\Http\Controllers\Admin\BaseController;

class CreateAction extends BaseController
{
    public function __invoke()
    {
        return view('admin.users.create');
    }
}
