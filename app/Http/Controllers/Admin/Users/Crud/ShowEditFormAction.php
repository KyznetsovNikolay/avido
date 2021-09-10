<?php

namespace App\Http\Controllers\Admin\Users\Crud;

use App\Http\Controllers\Controller;
use App\Models\User\User;

class ShowEditFormAction extends Controller
{
    public function __invoke(User $user)
    {
        $statuses = User::getStatuses();
        $roles = User::getRoleLabels();
        return view('admin.users.edit', compact('user', 'statuses', 'roles'));
    }
}
