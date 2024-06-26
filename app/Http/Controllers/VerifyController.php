<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class VerifyController extends Controller
{
    public function view(){

        $userId = session('userId_to_verify');

        if(empty($userId)){
            return redirect('/login')->with('error', 'Inavlid verification request');  
        }

        return view('auth.verify');
    }

    public function verify(Request $request)
    {

        try {
            $credentials = $request->validate([
                'otp' => ['required', 'min:6', 'max:6'],
            ]);
        } catch (ValidationException $e) {
            $firstError = $e->validator->errors()->first();
            return back()->with('error', $firstError);
        }

        $userId = session('userId_to_verify');
        $otp = $request->input('otp');

        $user = $this->otpIsValid($userId,$otp);

        if ($user) {

            $otpTimeIsValid = $this->otpTimeIsValid($user->updated_at) ? true : false;

            if(!$otpTimeIsValid){
                 return redirect('/login')->with('error', 'The otp is expired.'.$otpTimeIsValid);;
            }

            Auth::login($user);

            $request->session()->regenerate();

            session(['userId_to_verify' => null]);

            return redirect('/dashboard');
        }
        return back()->with('error', 'The otp is invalid.');
    }


    private function otpIsValid($userId,$otp){
        $user = User::where('userId', $userId)->first();
        $savedOtp = $user->remember_token;
        
        if($savedOtp==$otp){
            return $user;
        }
        return null;
    }

    private function otpTimeIsValid($time){
        $unixTimestamp = is_numeric($time) ? $time : strtotime($time);
        $currentDateTime = $unixTimestamp;

        $currentTimestamp = time();
        $fiveMinutesAgo = $currentTimestamp - (5 * 60);

        return ($currentDateTime > $fiveMinutesAgo);
    }
}
