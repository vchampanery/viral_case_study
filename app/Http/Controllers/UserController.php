<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class UserController extends Controller {

    /**
     * 
     * @param Request $request
     * @return Response
     */
    function index(Request $request): Response {
        $rules = array(
            'email' => "required|min:5|max:30",
            'password' => "required|min:6",
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $response = [
                "success" => false,
                "message" => $validator->errors(),
            ];
            return response($response, 404);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            $response = [
                "success" => false,
                'message' => [trans('user.credentials_not_match')],
            ];
            return response($response, 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $data = [
            'user' => $user,
            'token' => $token
        ];
        $response = [
            "success" => true,
            "message" => trans('user.success_log'),
            "data" => $data,
        ];
        return response($response, 201);
    }

    /**
     * 
     * @param Request $request
     * @return Response
     */
    public function register(Request $request): Response {
        $rules = array(
            'name' => "required|min:5|max:30",
            'email' => "required|min:5|max:30",
            'password' => "required|min:6",
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $response = [
                "success" => false,
                "message" => $validator->errors(),
            ];
            return response($response, 404);
        }

        $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
        ]);
        $token = $user->createToken('my-app-token')->plainTextToken;

        $data = [
            'token' => $token,
            'user' => $user,
        ];
        $response = [
            "success" => true,
            "message" => trans('user.success_register'),
            "data" => $data
        ];
        return response($response, 200);
    }

}
