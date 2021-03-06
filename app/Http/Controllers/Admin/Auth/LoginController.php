<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->hasRole('admin')) {
                return redirect()->route('admin.members.index');
            } else {
                $this->guard()->logout();
                $request->session()->invalidate();
                $validator->getMessageBag()->add('auth', 'Не достаточно прав для авторизации');
            }
        } else {
            $validator->getMessageBag()->add('auth', trans('auth.failed'));
        }

        return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('admin.login.form');
    }

}
