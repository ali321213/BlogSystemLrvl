<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller {

    public function redirect() {
        return Socialite::driver( 'google' )->redirect();
    }

    public function callbackGoogle() {
        try {
            $google_user = Socialite::driver( 'google' )->user();
            // Ensure Google user has essential info ( email and id )
            if ( !$google_user->getEmail() || !$google_user->getId() ) {
                return redirect( '/login' )->withErrors( 'Unable to retrieve Google user information.' );
            }
            // Check if the user already exists in the database
            $user = Users::where( 'google_id', $google_user->getId() )->first();
            if ( !$user ) {
                // Create a new user if not already in the database
                $new_user = Users::create( [
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                ]);
                Auth::login( $new_user );
                // Log in the newly created user
            } else {
                Auth::login( $user );
                // Log in the existing user
            }
            // Redirect to the dashboard or intended URL
            return redirect()->intended( 'dashboard' );
        } catch ( \Throwable $th ) {
            // Log the error ( optional )
            Log::error( 'Google login error: ' . $th->getMessage() );
            return redirect( '/login' )->withErrors( 'Unable to login with Google, please try again.' );
        }
    }
}