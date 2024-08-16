<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\authentication\RegistrationRequest;
use App\Http\Requests\authentication\LoginRequest;
use App\Interfaces\AuthenticationInterface;
use App\Models\User;

class AuthController extends Controller
{
    private AuthenticationInterface $authInterface;
    public function __construct(AuthenticationInterface $authInterface)
    {
        $this->authInterface = $authInterface;
    }

    public function login(LoginRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        try {

            if ($this->authInterface->login($data))
                return redirect()->route('dashboard');
            else
                return back()->with('error', 'Email ou mot de passe incorrect(s).');
        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survnue lors du traitement, Réessayez !');
        }
    }

    public function registration(RegistrationRequest $request)
    {
        // $password = str()->password();
        // $password = str()->random(8);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => true,
            'password' => $request->password,

        ];

        try {

            $user = $this->authInterface->registration($data);

            Auth::login($user);

            return redirect()->route('dashboard');
            
        } catch (\Exception $ex) {

            return back()->with('error', 'Une erreur est survnue lors du traitement, Réessayez !');
        }
    }

    public function show(){

        return view('user.create');
    }

    public function create(Request $request){

        $user = User::where('email', $request->email)->exists();
        if($user){
            return back()->with('error', 'Cet utilisateur existe déjà');
        }
        
        $user = new User();
        // $password = str()->password();
        $email = $request->email;
        $name = $request->name;

        $password = $this->authInterface->sendPassword($email, $name);

        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        // $user->is_admin = true;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Utilisateur créé avec succès!');
    }

    public function update($id){

        $user = User::find($id);
        
        return view('user.edit', ['user' => $user]);
    }

    public function edit(Request $request ,$id){

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'utilisateur modifié avec succès');
    }

    public function destroy($id){

        $user = User::find($id);
        $user->delete();
        return back()->with('success', 'Utilisateur supprimé avec succès!');
    }
}
