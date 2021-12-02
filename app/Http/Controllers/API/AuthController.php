<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\User;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{

    public function index()
    {
        $user = User::latest()->get();
        return response()->json([UserResource::collection($user), 'All User Accounts.']);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $user = User::create([
            'user_id'=>000,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => 0
         ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['user' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized Account'], 401);
        }
        else {
            $user = User::where('email', $request['email'])->firstOrFail();
            $token = $user->createToken('auth_token')->plainTextToken;

            $aut = ['role'=>$user->is_admin,'email' => $user->email,'user_id' => $user->user_id,'message' => 'Hi '.$user->email.', welcome to home','access_token' => $token, 'token_type' => 'Bearer', 'is_admin' => $user->is_admin, ];
            $aut_error = ['role'=>$user->is_admin,'email' => $user->email,'user_id' => $user->user_id,];
            if($user->is_admin == 1){
                return response()
                ->json(['auth' => $aut,'Role'=>'User' ]);
            }
            elseif($user->is_admin == 2){
                return response()
                ->json(['auth' => $aut,'Role'=>'Project Manager' ]);
            }
            elseif($user->is_admin == 3){
                return response()
                ->json(['auth' => $aut,'Role'=>'Management' ]);
            }
            elseif($user->is_admin == 4){
                return response()
                ->json(['auth' => $aut,'Role'=>'Admin/Hr' ]);
            }
            else {
                auth()->user()->tokens()->delete();
                return response()
                ->json(['auth'=>$aut_error, 'message' => 'Hi '.$user->email.', your login session are temporally canceled ask your Admin/HR to set your account Role']);
            }

            
        }
        
    }

    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new UserResource($user)]);
    }

    // method for user logout and delete token
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
            'is_admin' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $user->user_id = $request->user_id;
        $user->is_admin = $request->is_admin;
        $user->save();

        return response()
            ->json(['message'=>$user->email.' successfully updated','Data' => new UserResource($user)]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json('User deleted successfully');
    }
    
    

}