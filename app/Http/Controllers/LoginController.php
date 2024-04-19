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

        $email = $request->input('email');
        $userAgent = $request->header('User-Agent');
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
        } catch (ValidationException $e) {
            $firstError = $e->validator->errors()->first();
            return back()->with('error', $firstError);
        }

        if (Auth::attempt($credentials)) {

            Auth::logout();

            $user = $this->generateOtp($email,$userAgent);

            try{
                Mail::to($user)->send(new OtpMail($user));
            }catch(\Exception $e){
                back()->with('error', 'Something went wrong while sending otp. Try again');
            }
            

            return redirect('/verify');
        }
        return back()->with('error', 'The provided credentials do not match our records.');
    }

    private function generateOtp($email,$useragent){
        $user = User::where('email', $email)->first();

        $token = Str::random(6);

        $user->remember_token = $token;
        $user->useragent = $useragent;
        $user->save();

        session(['email_to_verify' => $email]);

        return $user;
    }
}
