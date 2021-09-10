<?php

namespace App\Http\Controllers\Admin\Users\Crud;

use App\Http\Controllers\Admin\BaseController;
use App\Models\User\User;
use Illuminate\Http\Request;

class IndexAction extends BaseController
{
    public function __invoke(Request $request)
    {
        $users = $this->withFilter($request)->paginate(10);

        $roles = User::getRoleLabels();
        return view('admin.users.index', compact('users', 'roles'));
    }

    public function withFilter(Request $request)
    {
        $query = User::orderByDesc('id');

        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }

        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('email'))) {
            $query->where('email', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('status'))) {
            $query->where('status', $value);
        }

        if (!empty($value = $request->get('role'))) {
            $query->where('role', $value);
        }

        return $query;
    }
}
