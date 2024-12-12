<?php

use Illuminate\Contracts\Mail\Mailable;
use Umpirsky\Country\Country;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

function confirmationEmail($userId)
{
    $user = User::where('id', $userId)->first();
    return 'Email confirmation for user: ' . $userId;
    dd($user);
}