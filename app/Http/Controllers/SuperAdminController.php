<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    //
    public function index()
    {
        $title = 'Rs Apps';
        return view('superadmin.index', compact('title'));
    }



    public function userrolepremesion()
    {
        $users = User::get();
        return view('superadmin.users', ['users' => $users]);

    }
    public function edit(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        $userRoles = $user->roles->pluck('name','name')->all();
        return view('superadmin.useredit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'required'
        ]);
        $user->syncRoles($request->roles);

        // var_dump($request);
        return redirect()->route('user.role-premesion')->with('status', 'Permissions added to role');

    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect()->route('user.role-premesion')->with('status', 'Permissions added to role');
    }
}
