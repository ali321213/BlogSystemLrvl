<?

namespace App\Http\Controllers;

use Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SocialLoginController extends Controller
{
    // Google Login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            $this->_loginOrCreateUser($user, 'google');
            return redirect('/home');
        } catch (\Exception $e) {
            return redirect('/login');
        }
    }

    // Facebook Login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->stateless()->user();
            $this->_loginOrCreateUser($user, 'facebook');
            return redirect('/home');
        } catch (\Exception $e) {
            return redirect('/login');
        }
    }

    private function _loginOrCreateUser($providerUser, $provider)
    {
        // Check if the user already exists
        $user = User::where('email', $providerUser->getEmail())->first();

        if (!$user) {
            // Create a new user if it doesn't exist
            $user = User::create([
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'password' => Hash::make(Str::random(24)), // Dummy password
            ]);
        }
        // Log in the user
        Auth::login($user);
    }
}