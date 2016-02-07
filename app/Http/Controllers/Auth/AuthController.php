<?php

namespace Solvre\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Solvre\Model\Entities\User;
use Illuminate\Support\Facades\Validator;
use Solvre\Http\Controllers\Base\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    const EMAIL = 'email';
    const PASSWORD = 'password';
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function authenticate()
    {
        $email = Input::get(static::EMAIL);
        $password = Input::get(static::PASSWORD);

        /** @noinspection PhpUndefinedMethodInspection */

        if (Auth::attempt([static::EMAIL => $email, static::PASSWORD => $password, 'active' => 1])) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            static::EMAIL => 'required|email|max:255|unique:users',
            static::PASSWORD => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            static::EMAIL => $data[static::EMAIL],
            static::PASSWORD => bcrypt($data['password']),
        ]);
    }
}
