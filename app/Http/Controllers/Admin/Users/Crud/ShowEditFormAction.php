<?php

namespace App\Http\Controllers\Admin\Users\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\User\User;

class ShowEditFormAction extends BaseController
{
    public function __invoke(User $user)
    {
        $statuses = User::getStatuses();
        $roles = User::getRoleLabels();
        return view('admin.users.edit', compact('user', 'statuses', 'roles'));
    }
}
