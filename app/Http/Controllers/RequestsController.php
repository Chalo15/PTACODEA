<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('requests.index', compact('users'));
    }

    public function deny(User $user)
    {
        //
    }

    public function accept(User $user)
    {
        //
    }
}
