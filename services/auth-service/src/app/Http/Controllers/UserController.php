<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // GET /users
    public function index()
    {
        return UserResource::collection(User::all());
    }

    // POST /users
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'nullable|string',
        ]);

        $user = User::create($validated);

        return new UserResource($user);
    }

    // GET /users/{id}
    public function show($id)
    {
        return new UserResource(User::findOrFail($id));
    }

    // PUT /users/{id}
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string',
        ]);

        $user->update($validated);

        return new UserResource($user);
    }

    // DELETE /users/{id}
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['message' => 'User deleted']);
    }
}