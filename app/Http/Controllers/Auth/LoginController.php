<?php

namespace ProjetoDigital\Http\Controllers\Auth;

use Illuminate\Http\Request;
use ProjetoDigital\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use ProjetoDigital\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/redirect-user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        $credentials['active'] = 1;

        return $credentials;
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $user = User::where($request->only($this->username()))->first();

        if (! is_null($user) &&
            ! $user->isActive() &&
            Hash::check($request->input('password'), $user->password)
        ) {
            $this->alert('Esta conta não está ativada!', 'danger');

            return redirect('/login');
        }

        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    public function username()
    {
        return 'username';
    }
}
