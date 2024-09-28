<?php

use Illuminate\Contracts\Mail\Mailable;
use Umpirsky\Country\Country;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\Users;

function confirmationEmail($userId)
{
    $user = Users::where('id', $userId)->first();
    return 'Email confirmation for user: ' . $userId;
    dd($user);
}

if (!function_exists('countries')) {
    function countries()
    {
        $countryList = Country::all('en');
        return $countryList;
    }
}