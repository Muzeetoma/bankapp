<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\UserDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function view(){
        return view('admin.create-user');
    }

    public function users(){
        $users = User::all();
        return view('admin.users',['users'=>$users]);
    }

    public function createUser(Request $request){

        try {
            $request->validate([
                'email' => ['required', 'email'],
                'firstname' => ['required'],
                'lastname' => ['required'],
                'dob' => ['required'],
                'address' => ['required'],
                'state' => ['required'],
                'postalCode' => ['required'],
                'country' => ['required'],
                'password' => ['required'],
                'confirmPassword' => ['required'],
            ]);
        } catch (ValidationException $e) {
            $firstError = $e->validator->errors()->first();
            return back()->with('error', $firstError);
        }


        $firstName = $request->input('firstname');
        $lastName = $request->input('lastname');
        $role = 'user';
        $dob = $request->input('dob');
        $email = $request->input('email');
        $address = $request->input('address');
        $state = $request->input('state');
        $postalCode = $request->input('postalCode');
        $country = $request->input('country');
        $name = $firstName . ' ' . $lastName;
        $password = $request->input('password');
        $confirmPassword = $request->input('confirmPassword');

        $emailExists = User::where('email',$email)->first();

        if($emailExists){
            return back()->with('error', 'A user with same email exists already!');
        }

        if($password!=$confirmPassword){
            return back()->with('error', 'The passwords don\'t match!'); 
        }

        $random_number = mt_rand(100, 999);

        $user = new User;
        $user->firstname = $firstName;
        $user->lastname = $lastName;
        $user->role = $role;
        $user->email = $email;
        $user->address = $address;
        $user->state = $state;
        $user->postalCode = $postalCode;
        $user->dob = $dob;
        $user->country = $country;
        $user->name = $name;
        $user->password = Hash::make($password);
        $user->userId = strtolower($firstName).$random_number;
         
        if($user->save()){
            $this->createUserDetail($email);
            return back()->with('success', 'User creeated!');
        }
    }


    private function createUserDetail($email): void
    {

        $newUser = User::where('email',$email)->first();
        $id = $newUser->id;

        $data = [
            [
                'cardType' => 'mastercard',
                'cardCvv' => $this->generateRandomCardCvv(),
                'cardNumber' => $this->generateRandomCardNumber(),
                'cardExpiry' => $this->generateRandomCardExpiry(),
                'user_id' => $id,
            ],
            [
                'cardType' => 'visacard',
                'cardCvv' => $this->generateRandomCardCvv(),
                'cardNumber' => $this->generateRandomCardNumber(),
                'cardExpiry' => $this->generateRandomCardExpiry(),
                'user_id' => $id,
            ],
            [
                'cardType' => 'mastercard',
                'cardCvv' => $this->generateRandomCardCvv(),
                'cardNumber' => $this->generateRandomCardNumber(),
                'cardExpiry' => $this->generateRandomCardExpiry(),
                'user_id' => $id,
            ]
        ];
    
        foreach ($data as $record) {
            DB::table('user_details')->insert($record);
        }
    }

    private function generateRandomCardNumber()
    {
        $digits = '';
        for ($i = 0; $i < 16; $i++) {
            $digits .= rand(0, 9);
            if (($i + 1) % 4 == 0 && $i != 15) {
                $digits .= ' ';
            }
        }
        return $digits;
    }

    private function generateRandomCardExpiry()
    {
        $month = str_pad(rand(1, 12), 2, '0', STR_PAD_LEFT);
        $year = date('y') + rand(0, 10);
        return $month . '/' . $year;
    }
    private function generateRandomCardCvv()
    {
        return str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT); // Random 3-digit CVV
    }

}
