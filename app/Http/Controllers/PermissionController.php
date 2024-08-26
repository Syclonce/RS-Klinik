<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::get();
        return view('role-permission.permission.index', ['permissions' => $permissions]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'permissionname' => [
                'required',
                'string',
                'unique:permissions,name'
            ]
        ]);

        Permission::create([
            'name' => $request->permissionname
        ]);


    }


    public function update(Request $request)
    {

        $id = $request['permissionsid'];
        $permission = Permission::find($id);
        $permission->name = $request['permissionnames'];

        // var_dump($permission);
        $permission->update();
        // return redirect('permissions')->with('status','Permission Updated Successfully');
    }

    public function destroy(Request $request)
    {
        $id = $request['permissionsids'];
        $permission = Permission::find($id);


        $permission->delete();
    }
}
