<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;


class MyAuthController extends Controller
{
    private static $messages = [
            'required'  => 'Обязательное поле для ввода',
            'email'     => 'Введите корректный email',
            'max'       => 'Максимум 10 символов',
            'string'    => 'Должна быть строка',
            'unique'    => 'Такой уже есть',
            'min'       => 'Минимум 8 символов',
        ];

    public function authenticate(Request $request) {

    	$credentials = $request->only('name','password');

        $validator = Validator::make($credentials, [
            'name'     => 'required',
            'password' => 'required',
        ],self::$messages);

        if ($validator->fails()) {
            return response()->json($validator->errors(),401);
        }
        
        if (Auth::attempt($credentials)) {
		    return response('OK',200);
        }

        return response()->json(['name'=> ['Неправильный логин или пароль']],401);
   
    }

    public function register(Request $request) {

        $credentials = $request->only('name','password1','password2','email');

        $validator = Validator::make($credentials, [
            'name'      => ['required', 'string', 'max:10','unique:users'],
            'password1' => ['required', 'string', 'min:8'],
            'password2' => ['required', 'string', 'min:8'],
            'email'     => ['required', 'string', 'email', 'unique:users'],
        ],self::$messages);

        if ($validator->fails()) {
            return response()->json($validator->errors(),401);
        }

        if ($credentials['password1'] != $credentials['password2']) {
            return response()->json(['password1'=> ['Пароли не совпадают'], 'password2'=> [''] ],401);
        }

        $user = User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password1']),
        ]);

       Auth::login($user);

       return response('OK',200);

    }

    
    public function logout() {

        Auth::logout();

        return redirect()->route('login');

    }

}
