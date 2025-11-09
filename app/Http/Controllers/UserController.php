<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

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
        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required|unique:users,password|min:8',
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $store = $user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $data = $user::where('name', '=', $request->name)->get();
        if ($user) {
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
    public function edit(User $user, $id): View
    {
        return view('pages.user.edit', [
            'user' => $user::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required|unique:users,password|min:8',
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $update = $user::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,

        ]);

        if ($user) {
            return redirect()->route('user')
                ->with('success', 'Success update user!');
        } else {
            return redirect()->back()
                ->with('failed', 'Failed update user!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
    {
        $delete = $user::where('id', $id)->delete();

        if ($delete) {
            return Response()->json([
                'status' => 1,
                'message' => 'Success delete data !',
            ]);
        } else {
            return Response()->json([
                'status' => 0,
                'message' => 'Failed delete data !',
            ]);
        }
    }
}
