<?php

namespace App\Http\Controllers\Admin\Users\Crud;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Models\User\User;

class DeleteAction extends Controller
{
    public function __invoke(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
