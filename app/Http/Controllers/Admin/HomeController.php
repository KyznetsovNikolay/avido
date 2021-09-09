<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class HomeController
{
    public function __invoke(Request $request)
    {
        return view('admin.home');
    }
}
