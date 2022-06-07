<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->all();
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $user = User::create($data);
        return new UserResource($user);
    }


    public function login(StoreUserRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user instanceof User) {
            if (Hash::check($request->password, $user->password)) {
                $abilities = [
                    'user.index',
                    'user.show',
                ];
                $token = $user->createToken($request->token_name ?? $request->email, $abilities);
                return response(['token' => $token->plainTextToken]);
            }
        }

        return response('Invalid username or password.', 404);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateUserRequest $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->updateOrFail($request->all());
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
