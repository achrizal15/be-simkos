<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Requests\CreateUserRequest;
use App\Traits\GeneratesUsername;

class UserController extends Controller
{
    use GeneratesUsername;
    public function index()
    {
        $users = User::all();
        return UserResource::collection($users);
    }
    public function store(CreateUserRequest $request)
    {
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'username' => $this->generateUsername($request->name),
        ]);

        $user->save();

        return new UserResource($user);
    }
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->name; // Use $request->name
        $user->email = $request->email; // Use $request->email
        $user->save();

        return new UserResource($user);
    }
    public function show(User $user)
    {
        return new UserResource($user);
    }
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully',
        ], 200);
    }
}