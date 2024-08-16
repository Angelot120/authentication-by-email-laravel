<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class ViewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Auth::check())
            return redirect()->route('dashboard');
        return view('login');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if (Auth::check())
            return redirect()->route('dashboard');
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (Auth::check())
            return redirect()->route('dashboard');

        return view('registration');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $users = User::all();
        return view('dashboard', ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
        Auth::Logout();
        return redirect('/');
    }
}
