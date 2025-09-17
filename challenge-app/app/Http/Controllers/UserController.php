<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $firstName = Session::get('first_name', 'YOU');
        $lastName = Session::get('last_name', '');
        return view('home', compact('firstName', 'lastName'));
    }

    public function showForm()
    {
        return view('form');
    }

    public function submitForm(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|alpha|max:15',
            'last_name' => 'required|alpha|max:25',
            'email' => 'nullable|email',
        ]);

        Session::put('first_name', $validated['first_name']);
        Session::put('last_name', $validated['last_name']);
        if ($request->filled('email')) {
            Session::put('email', $validated['email']);
        } else {
            Session::forget('email');
        }

        return redirect()->route('info');
    }

    public function showInfo()
    {
        $firstName = Session::get('first_name');
        $lastName = Session::get('last_name');
        $email = Session::get('email');

        if (!$firstName || !$lastName) {
            return redirect()->route('form')->with('error', 'No user data found. Please submit the form first.');
        }

        return view('info', compact('firstName', 'lastName', 'email'));
    }

    public function clearSession()
    {
        Session::forget(['first_name', 'last_name', 'email']);
        return redirect()->route('home');
    }
}