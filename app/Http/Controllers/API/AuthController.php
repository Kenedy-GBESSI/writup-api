<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'last_name' => $request->last_name,
            'role_id' => 1
        ];
        $user = User::create($data);
        $sucess['token'] = $user->createToken(time())->plainTextToken;
        $sucess['user'] = new UserResource($user);
        return response()->json($sucess,201);
    }
    public function login(UserLoginRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $user = User::where('email', $data['email'])->first();
        if (Hash::check($data['password'],$user->password)) {
            $sucess['user'] = new UserResource($user);
            $sucess['token'] = $user->createToken(time())->plainTextToken;
            return response()->json($sucess);
            } else {
                    return response()->json(['error' => 'password incorrect'],401);
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return $this->sendResponse([], 'Logged out');
    }

}
