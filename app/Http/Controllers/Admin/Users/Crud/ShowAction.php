<?php

namespace App\Http\Controllers\Admin\Users\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\User\User;

class ShowAction extends BaseController
{
    public function __invoke(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
}
