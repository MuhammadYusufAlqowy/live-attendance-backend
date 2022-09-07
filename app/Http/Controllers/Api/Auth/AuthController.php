<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    use ImageStorage;

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'device_name' => ['required'],
            'phone' => ['required']
        ]);

        $data['password'] = Hash::make($request->password);
        $data['is_admin'] = $request->is_admin ?? false;
        if($request->file('photo')){
            $photo = $request->file('photo');
            $data["photo"] = $this->uploadImage($photo, $data['email'], 'profile');
        }
        
        $user = User::create($data);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'status' => false,
                'message' => 'The provided credentials are incorrect.',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $accessToken = Auth::user()->createToken($request->device_name)->plainTextToken;
        $user['token'] = $accessToken;
        $user['photo'] = asset('/storage/profile/' .$user->photo);
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $user
        ], Response::HTTP_CREATED);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'The provided credentials are incorrect.',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $accessToken = $user->createToken($request->device_name)->plainTextToken;
        $user['token'] = $accessToken;
        $user['photo'] = asset('/storage/profile/' .$user->photo);
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $user,
        ], Response::HTTP_CREATED);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'status' => true,
            'message' => 'Log out success'
        ], Response::HTTP_OK);
    }
}
