<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function users()
    {
        $users = User::all();

        return view('usuarios', [
            'users' => $users
        ]);
    }

    public function storage(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users');
    }

    public function edit(User $userId)
    {
        return view('editar', [
            'user' => $userId
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('users');
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('users');
    }
}
