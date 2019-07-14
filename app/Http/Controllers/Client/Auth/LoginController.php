<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use GrahamCampbell\Throttle\Facades\Throttle;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = route('index');
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        if (!$this->throttleCheck($request, 20, 1)) {
            return response()
                ->json(['auth' => ['Много попыток авторизации !']])
                ->setStatusCode(429);
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()
                ->json($validator->getMessageBag()->getMessages())
                ->setStatusCode(400);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()
                ->json([
                    'redirect' => $this->redirectTo,
                    'user' => Auth::user()
                ]);
        } else {
            $validator->getMessageBag()->add('auth', trans('auth.failed'));
            return response()
                ->json($validator->getMessageBag()->getMessages())
                ->setStatusCode(401);
        }

    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->back();
    }


}
