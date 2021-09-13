<?php

namespace App\Http\Controllers\Admin\Users\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Models\User\User;

class UpdateAction extends BaseController
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $user->update($request->only(['email', 'name', 'status', 'role']));
        return redirect()->route('admin.users.show', $user);
    }
}
