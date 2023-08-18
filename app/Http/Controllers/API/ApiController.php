<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class ApiController extends Controller
{



    
public function products(){
        $products = Product::all();
        $newArr=array();
        foreach ($products as  $key=> $items) {
        $newArr[$key]["id"]=  $items->id;
        $newArr[$key]["product_name"]=  $items->product_name;
        $newArr[$key]["parent_id"]=$items->parent_id;
        $newArr[$key]["description"]=  $items->description;
        $newArr[$key]["image"]=   URL::to('/') . '/assets/' .$items->image;
        $newArr[$key]["quantity"]=  $items->quantity;
        $newArr[$key]["price"]=  $items->price;
        $newArr[$key]["discount_price"]= $items->discount_price;
        $newArr[$key]["status"]=  $items->status;
        $newArr[$key]["base64"]=  $items->base64;
        $newArr[$key]["selected"]=  $items->selected;
        $newArr[$key]["created_at"]=  $items->created_at;
        $newArr[$key]["updated_at"]=  $items->updated_at;
        }
        // echo '<pre>';
        // print_r($newArr);

    return response()->json(['data' => $newArr]);
}

    public function changepassword(Request $request)
    {
        try {
            $user = Auth::user();
            
            $request->validate([
                'current_password' => 'required',
                'password' => 'required|min:6|confirmed',
            ]);
            
            if (!$user) {
                return $this->errorResponse('Unauthorized', 401);
            }
            if (!Hash::check($request->current_password, $user->password)) {
                return $this->errorResponse('Current password is incorrect', 400);
            }

            $user->update(['password' => Hash::make($request->password)]);
            
            return $this->successResponse('Password changed successfully', 200);
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return $this->errorResponse('An error occurred', 500);
        }
    }




    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            $customToken = Str::random(60); 
            
            $user->update(['remember_token' => $customToken]);
            
            return $this->successResponse(['token' => $customToken, 'data' => $user], 200)->header('Authorization', 'Token ' . $customToken);
        } else {
            return $this->errorResponse('Unauthorized', 401);
        }
    }



    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);
    
            if ($validator->fails()) {
                return $this->errorResponse($validator->errors(), 400);
            } else {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                
                return $this->successResponse('User registered successfully', 201);
            }
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            // Log::error($th); 
            return $this->errorResponse('An error occurred', 500);
        }
    }
    



  


    public function users()
    {
        try {
            $users = User::all();
            return $this->successResponse(['users' => $users], 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('An error occurred', 500);
        }
    }
    
    
    
    public function user(Request $request)
    {
        return $request->user();
    }











    protected function successResponse($data, $status)
    {
        return response()->json(['status' => $status, 'data' => $data], $status);
    }

    protected function errorResponse($message, $status)
    {
        return response()->json(['status' => $status, 'message' => $message], $status);
    }


}
