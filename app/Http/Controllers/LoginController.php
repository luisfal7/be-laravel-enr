<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function show()
    {
        return 'view(auth.login)';
    }

    /**
     * Handle account login request
     * 
     * @param LoginRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        /* $credentials = $request->getCredentials();
        if(!Auth::validate($credentials)):
            return "Error en la carga del usuario";
        endif;
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user, true);
        return $this->authenticated($user); */

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();
 
            return 'ok';
        }
 
        return 'The provided credentials do not match our records.';
    }

    /**
     * Handle response after user authenticated
     * 
     * @param Request $request
     * @param Auth $user
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated($user) 
    {
        $userClient = User::find($user->id);

        return $userClient->clients()->with('hour', 'user', 'services')->get();
    }

    public function logout(Request $request)
    {
        /* Session::flush();
        Auth::logout(); */

        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        return 'logout';
    }
}
