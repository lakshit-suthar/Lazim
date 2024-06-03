<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    //registration

   public function register(Request $request) {
       try {
        $validU = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
         ]);
  
         if($validU -> fails()){
           return response()->json([
              'status' => false,
              'message' => 'Validation errors',
              'errors' => $validU->errors()
           ],401);
         }
  
         $user =  User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password)
          
         ]);
  
         return response()->json([
          'status' => true,
          'message' => 'User created successfully',
          'token' => $user->createToken('API TOKEN')->plainTextToken
           ],200);
       } catch (\Throwable $th) {
        //throw $th;
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ],500);
       }
     
    
    }

    //login
    public function login(Request $request) {
        try {
            $validU = Validator::make($request->all(),[
                'email' => 'required|email',
                'password' => 'required',
             ]);
      
             if($validU -> fails()){
               return response()->json([
                  'status' => false,
                  'message' => 'Email or Password not valid.',
                  'errors' => $validU->errors()
               ],401);
             }
      
            if(!Auth::attempt($request->only(['email','password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email or Password wrong.',
                     ],401);
            }
      
            $user = User::where('email',$request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged in successfully',
                'token' => $user->createToken('API TOKEN')->plainTextToken
                 ],200);

           } catch (\Throwable $th) {
            //throw $th;
                return response()->json([
                    'status' => false,
                    'message' => $th->getMessage()
                ],500);
           }
     
    }

    public function logout() {
        auth()->user()->tokens->delete();
        return response()->json([
            'status' => true,
            'message' => 'User Logged out',
            'data' => []
             ],200);

    }
}
