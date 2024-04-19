<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;

class LogoutController extends Controller{

    public function logout(){
        $user = Auth::user();
        $user->remember_token = Str::random(20);
        $user->save();

        Auth::logout();
        return redirect('/login');
    }
}