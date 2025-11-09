<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(10);
        return view('pages.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('pages.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'permissions' => 'required',
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);

        $role->syncPermissions($request->permissions);
        return redirect()->route('roles')->with('success', 'Role created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $roles = Role::findOrFail($id);
        $permissions = $roles->permissions->pluck('name')->toArray();
        $allPermissions = Permission::all();
        return view('pages.roles.edit', compact('roles', 'permissions', 'allPermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id,
            'permissions' => 'required',
        ]);

        $roles = Role::findOrFail($id);
        $roles->name = $request->name;
        $roles->save();
        $roles->syncPermissions($request->permissions);

        return redirect()->route('roles')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $roles, $id)
    {
        $roles::find($id);
        $roles->delete();
        return redirect()->route('roles')->with('success', 'Role deleted successfully.');
    }
}
