<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;


class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        return view('role-permission.role.index', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'rolename' => [
                'required',
                'string',
                'unique:roles,name'
            ]
        ]);

        Role::create([
            'name' => $request->rolename
        ]);
    }

    public function update(Request $request)
    {

        $id = $request['roleid'];
        $role = Role::find($id);
        $role->name = $request['rolenames'];
        $role->update();
    }

    public function destroy(Request $request)
    {
        $id = $request['roleids'];
        $role = Role::find($id);
        $role->delete();
    }

    public function addPermissionToRole($roleId)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermissions = DB::table('role_has_permissions')
                                ->where('role_has_permissions.role_id', $role->id)
                                ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                                ->all();

        return view('role-permission.role.give', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions
        ]);
    }

    public function givePermissionToRole(Request $request, $roleId)
    {
        $request->validate([
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);

        return redirect()->back()->with('status','Permissions added to role');
    }
}
