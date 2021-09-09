<?php

namespace App\Http\Controllers\Admin\Users\Crud;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Models\User\User;

class StoreAction extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $user = User::newStore($request['name'],$request['email']);
        return redirect()->route('admin.users.show', $user);
    }
}
