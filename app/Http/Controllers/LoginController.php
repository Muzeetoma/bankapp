<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;

class LoginController extends Controller
{
    public function view(){
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $userId = $request->input('userId');
        $userAgent = $request->header('User-Agent');
        try {
            $credentials = $request->validate([
                'userId' => ['required'],
                'password' => ['required'],
            ]);
        } catch (ValidationException $e) {
            $firstError = $e->validator->errors()->first();
            return back()->with('error', $firstError);
        }

        if (Auth::attempt($credentials)) {

            Auth::logout();

            $user = $this->generateOtp($userId, $userAgent);

            try{
                Mail::to($user)->send(new OtpMail($user));
            }catch(\Exception $e){
                back()->with('error', 'Something went wrong while sending otp. Try again');
            }
            

            return redirect('/verify');
        }
        return back()->with('error', 'The provided credentials do not match our records.');
    }

    private function generateOtp($userId,$useragent){
        $user = User::where('userId', $userId)->first();

        $token = mt_rand(100000, 999999);

        $user->remember_token = $token;
        $user->useragent = $useragent;
        $user->save();

        session(['userId_to_verify' => $userId]);

        return $user;
    }
}
