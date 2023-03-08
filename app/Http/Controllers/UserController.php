<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        $user = User::find($id);

        return $user;
    }

    public function store(Request $request)  
    {   
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->contraseña = $request->email;
        $user->save();
        
    }

}
