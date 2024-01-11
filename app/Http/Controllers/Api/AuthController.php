<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\facades\Hash;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\facades\Validator;

class AuthController extends Controller
{
    public function createUser(Request $request)
    {


    try {
       // validation form
       $validator = Validator::make($request->all(),[
        'name' => 'required|min:3',
        'email' => 'required|email:rfc,dns|unique:users',
        'password' =>'required|min:5|max:20'
    ]);

    // check if validation failed
    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'validatopn error',
            'error' => $validator->errors()
        ],422);
    }

    $user=User::create([
        'name' => $request->name,
        'email' => $request->email,
        // 'password' => bcrypt($request->password)
        'password' => Hash::make($request->password)
    ]);

        return response()->json([
            'status' => true,
            'message' => 'register user',
            'data' => $user,
            'token' => $user->createToken("API TOKEN USER")->plainTextToken
        ],200);
    } catch (\Throwable $th) {
        //throw $th;
        return response()->json([
            'status' => false,
            'message' => 'register failed'.$th->getMessage()
        ],422);
    }


    }

    public function loginUser(Request $request)
    {
        try {
            // validation form
            $validator = Validator::make($request->all(),[
                // 'name' => 'required|min:3',
                'email' => 'required|email:rfc,dns',
                'password' =>'required'
            ]);

                // check if validation failed
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => 'validatopn error',
                        'error' => $validator->errors()
                    ],422);
                }

                if (!Auth::attempt($request->only(['email','password']))) {
                    return response()->json([
                        'status' => false,
                        'message' => 'username dan password tidak sesusai'
                    ],401);
                }

                $user = User::where('email',$request->email)->first();

                return response()->json([
                    'status' => true,
                    'message' => 'login user berhasil',
                    'data' => $user,
                    'token' => $user->createToken("API-TOKEN-USER-".$user['name'])->plainTextToken
                ],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => false,
                'message' => 'login failed'.$th->getMessage()
            ],422);
        }
    }

    public function logout(Request $request)
    {
        // Auth::user()->tokens()->delete();
        $user=$request->user();

        dd($request->user()->currentAccessToken()->token);
        // revoke all token
        // $user->tokens()->delete();

        // Revoke the token that was used to authenticate the current request...
        $request->user()->currentAccessToken()->delete();

        // Revoke a specific token...
        // $user->tokens()->where('id', $tokenId)->delete();

        return response()->json([
            'status' => true,
            'message' => 'logout berhasil'
        ]);
    }
}
