<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Profile');
    }

    public function updatePassword(User $user, Request $request)
    {
        $validate = $request->validate([
            'currentPassword' => ['required', 'password', 'bail'],
            'newPassword'     => ['required', 'min:8', 'confirmed', 'bail'],
        ]);
        $user->update(['password' => Hash::make($validate['newPassword'])]);
        return Redirect::route('myprofile');
    }

    public function updateEmail(User $user, Request $request)
    {
        $validate = $request->validate([
            'newEmail' => ['required', 'email', 'bail'],
            'newEmailPasswordConfirm' => ['required', 'password', 'bail']
        ]);
        $user->update(['email' => $validate['newEmail']]);
        return Redirect::route('myprofile');
    }
}
