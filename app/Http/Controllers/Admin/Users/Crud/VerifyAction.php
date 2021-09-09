<?php

namespace App\Http\Controllers\Admin\Users\Crud;

use App\Http\Controllers\Controller;
use App\Models\User\User;

class VerifyAction extends Controller
{
    public function __invoke(User $user)
    {
        $user->verify();
        return redirect()->route('admin.users.show', $user);
    }
}
