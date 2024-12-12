<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Jobs\SendWelcomeEmailJob;
use Nnjeim\World\World;

class AuthController extends Controller
{
    public function signupUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone_number' => 'required|string|unique:users',
            'gender' => 'required|string',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));
        return redirect()->route('home')->with('success', 'User registered successfully!');
    }

    public function signinUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors(['email' => 'Invalid email or password!'])->withInput();
        }

        return redirect()->route('dashboard')->with('success', 'Login successful.');
    }

    public function signupView()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('signup');
    }

    public function signinView()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('signin');
    }

    public function homePage()
    {
        return view('template.header');
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:15',
            'gender' => 'required|string|in:male,female',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imagePath = $request->file('image')->store('uploads', 'public');
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'image' => $imagePath,
        ]);
        return response()->json($user);
    }

    public function showUsers()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function signout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('signin')->with('success', 'Successfully logged out.');
    }

    public function InventoryPage()
    {
        return view('template.header');
    }
    public function productsPage()
    {
        if (Auth::check()) {
            // return redirect()->route('products');
            return view('products');
        }
        return redirect()->route('signin');
    }
}
