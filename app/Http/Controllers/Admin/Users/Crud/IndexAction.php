<?php

namespace App\Http\Controllers\Admin\Users\Crud;

use App\Http\Controllers\Controller;
use App\Models\User\User;

class IndexAction extends Controller
{
    public function __invoke()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        $roles = User::getRoleLabels();
        return view('admin.users.index', compact('users', 'roles'));
    }
}
