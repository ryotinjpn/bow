<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show($id)
    {
        return view('users.show', ['users' => User::findOrFail($id)]);
    }
}
