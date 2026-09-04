<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('admin.auth.login');
    }

    public function index()
    {
        echo 'Admin DashBoard';
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $users = User::where('email', $request->email)->first();

    }

    public function AdminLogout() {}

    public function CstomerLogout() {}

    public function StaffLogout() {}
}
