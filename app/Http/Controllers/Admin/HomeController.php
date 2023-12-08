<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\User\UserServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function getLogin()
    {
        if (Auth::check()) {
            return redirect('/product')->with('loggedInNotification', 'User is already logged in!'); // Redirect to the home page or any other page
        }
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

//        var_dump($credentials);

        $remember = $request->remember;

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('/product');
        } else {
            return back()->with('notification', 'Login failed! Wrong credentials!');
        }
    }

    public function register()
    {
        return view('admin.register');
    }

    public function postRegister(Request $request)
    {
        if ($request->password != $request->password_confirmation) {
            return back()->with('notification', 'Password confirmation does not match!');
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => Constant::user_level_client,
        ];

        $this->userService->create($data);
        return redirect('/login')->with('notification', 'Account registered! You can now login!');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
