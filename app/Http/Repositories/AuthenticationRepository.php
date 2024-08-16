<?php

namespace App\Http\Repositories;
use App\Interfaces\AuthenticationInterface;
use App\Mail\PasswordEmail;
use App\Models\OtpCode;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class AuthenticationRepository implements AuthenticationInterface
{

    public function login($data)
    {
        return Auth::attempt($data);
    }

    public function registration($data)
    {
        return User::create($data);
    }

    // public function forgottenPassword($email){
    //     $user = User::where('email', $email)->first();

    //     $otpCode = [
    //         'email' => $email,
    //         'password' => rand(100000, 10000000),
    //     ];

    //     if($user){

    //         OtpCode::where('email', $email);
    //         OtpCode::create($otpCode);
    //         session()->put('email', $email);
    //         Mail::to($email)->send(new OtpCodeEmail($user->name, $otpCode['password']));

    //     }

    //     return $user;
    // }


    public function sendPassword($email, $name) : string
    {

        $password = str()->random(8);
        session()->put('email', $email);

        Mail::to($email)->send(new PasswordEmail($name, $password));

        return $password;

    }

    
}
