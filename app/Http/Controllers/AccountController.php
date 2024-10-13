<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function destroy(Request $request)
    {
        $user = Auth::user();
        $user->delete(); 

        Auth::logout();

        return redirect('/')->with('status', 'Account deleted successfully.');
    }
}

