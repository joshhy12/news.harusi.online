<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }



    public function edit()
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }


    public function updateUser(Request $request)
    {
        $user = Auth::user();

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
        ]);

        // Update the user data
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        // Check if a new password is provided and hash it before saving
        if (!empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }


        // Save the updated user data
        $user->save();

        return redirect()->route('users.index')->with('success', 'Account updated successfully.');
    }
}
