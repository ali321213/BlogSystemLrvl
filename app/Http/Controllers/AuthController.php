<?php

namespace App\Http\Controllers;

// use Rinvex\Country\CountryLoader;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
// use Propaganistas\LaravelPhone\PhoneNumber;
use App\Models\User;
use App\Models\State;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;
use App\Jobs\SendWelcomeEmailJob;

class AuthController extends Controller
{
    public function signupUser(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'username' => 'required|string|unique:users',
                'email' => 'required|email|unique:users',
                'gender' => 'required|string',
                'phone_number' => 'required|string',
                'password' => 'required|string|min:4',
            ]);

            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'gender' => $request->gender,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
            ]);
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors);
        }
    }

    public function signinUser(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|exists:users,email',
                'password' => 'required|string',
            ]);

            if (
                !Auth::attempt([
                    'email' => $request->email,
                    'password' => $request->password
                ])
            ) {
                return response()->json([
                    'error' => 'Invalid email or password!'
                ], 422);
            }

            return response()->json([
                'success' => 'Login successful',
            ], 200);

        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Successfully logged out');
    }

    public function store(Request $request)
    {
        // Validation rules
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone_number' => 'required|string',
        ]);

        $phoneNumber = null;
        if ($request->phone_number) {
            try {
                $phoneUtil = PhoneNumberUtil::getInstance();
                $parsedNumber = $phoneUtil->parse($request->phone_number, strtoupper($request->country));
                if ($phoneUtil->isValidNumber($parsedNumber)) {
                    $phoneNumber = $phoneUtil->format($parsedNumber, PhoneNumberFormat::E164);
                } else {
                    return back()->withErrors(['phone_number' => 'Invalid phone number for the selected country.']);
                }
            } catch (\libphonenumber\NumberParseException $e) {
                return back()->withErrors(['phone_number' => 'Invalid phone number format.']);
            }
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'phone_number' => $phoneNumber,
            'password' => Hash::make($request->password),
        ]);

        dispatch(new SendWelcomeEmailJob($user));
        // return redirect()->route('/signin')->with('success', 'User registered successfully! Welcome email sent.');
        // return view('signin');
    }

    // return redirect()->route('/home')->with('success', 'User registered successfully!');

    public function signupView()
    {
        $countries = Country::get(['name', 'id']);
        return view('signup', compact('countries'));
    }

    public function fetchState(Request $request)
    {
        $data['states'] = State::where('country_id', $request->country_id)->get(['name', 'id']);
        return response()->json($data);
    }

    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where('state_id', $request->state_id)->get(['name', 'id']);
        return response()->json($data);
    }
}