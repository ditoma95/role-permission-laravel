<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $roles = Role::all();
        return view('role-permission.role.index', ['roles'=> $roles]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('role-permission.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name'
            ]
        ]);

        Role::create([
            'name' => $request->name
        ]);

        return redirect('roles')->with('success', 'role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // return view('role-permission.role.show', ['role'=> role::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
        return view('role-permission.role.edit', ['role'=> $role]);

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Role $role, Request $request)
    {
        //
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,'. $role->id
            ]
        ]);

        $role->update([
            'name' => $request->name
        ]);

        return redirect('roles')->with('success', 'role updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role, Request $request)
    {
        //
        $role->delete();
        return redirect('roles')->with('success', 'role deleted successfully.');
    }

    public function addPermissionToRole($roleId)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermissions = DB::table('role_has_permissions')
                            ->where('role_has_permissions.role_id', $role->id)
                            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                            ->all();
                            
        return view('role-permission.role.add-permissions', 
        [
            'role'=> $role,
            'permissions'=> $permissions,
            'rolePermissions'=> $rolePermissions
        ]);
    }


    public function givePermissionToRole(Request $request, $roleId) 
    {

       $request->validate([
        'permission'=> 'required'
       ]);

       $role = Role::findOrFail($roleId);
       $role->syncPermissions($request->permission);
       return redirect()->back()->with('success', 'permission added to role successfully.');
    }
}




