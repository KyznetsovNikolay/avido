<?php

namespace App\Http\Controllers\Admin\Users\Crud;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Models\User\User;

class UpdateAction extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $user->update($request->only(['email', 'name', 'status']));
        return redirect()->route('admin.users.show', $user);
    }
}
