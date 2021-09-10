<?php

namespace App\Http\Controllers\Admin\Users\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\User\User;

class VerifyAction extends BaseController
{
    public function __invoke(User $user)
    {
        $user->verify();
        return redirect()->route('admin.users.show', $user);
    }
}
