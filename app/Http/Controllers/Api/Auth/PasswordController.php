<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;


class PasswordController extends Controller
{

    use SendsPasswordResetEmails;

    public function reset(Request $request)
    {
        $request->validate([
            'old_password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (Hash::check($request->old_password, $request->user()->password)) {

            $request->user()->update([
                'password' => Hash::make($request->new_password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Password change has been success.',
            ], Response::HTTP_OK);
        }

        return response()->json([
            'status' => false,
            'message' => 'Update password failed, your password did not match.',
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
