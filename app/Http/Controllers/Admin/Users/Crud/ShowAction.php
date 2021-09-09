<?php

namespace App\Http\Controllers\Admin\Users\Crud;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Models\User\User;

class ShowAction extends Controller
{
    public function __invoke(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
}
