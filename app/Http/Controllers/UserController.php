<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user): View
    {
        $data = $user::all();
        return view('pages.user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $allRoles = Role::all();
        return view('pages.user.create', compact('allRoles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required|string|same:confirm_password|min:8',
                'roles' => 'required',
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $store = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $store->assignRole($request->roles);

        if ($store) {
            return redirect()->route('user')
                ->with('success', 'Success add user!');
        } else {
            return redirect()->back()
                ->with('failed', 'Failed add user!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $allRoles = Role::all();
        $userRoles = User::find($id)->roles->pluck('name')->toArray();
        $user = User::where('id', $id)->first();
        return view('pages.user.edit', compact('allRoles', 'userRoles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'same:confirm_password',
                'roles' => 'required',
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $user = User::findOrFail($id);

        // Kalau password kosong, jangan diupdate
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // Update roles
        $user->syncRoles($request->roles);

        return redirect()->route('user')
            ->with('success', 'Success update user!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = User::where('id', $id)->delete();

        if ($delete) {
            return redirect()->route('user')->with('success', 'User deleted successfully.');
        } else {
            return redirect()->route('user')->with('error', 'Oops! Please try again.');
        }
    }
}
