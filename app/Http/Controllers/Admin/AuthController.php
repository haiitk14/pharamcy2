<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use Validator;
use Lang;
use Hash;
use Auth;
use App\User;

class AuthController extends Controller
{
   
    /**
     * AuthController constructor
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct()
    {
    }

    /**
     * Show login from
     *
     * @return View
     */
    public function login()
    {   
        return view('admin.auth.login');
    }

    /**
     * Operation login
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $rules = [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ];

        $messages = [
            'username.required' => __('Please enter your Username.'),
            'password.required' => __('Please enter your Password.'),
            'password.min'      => __('Password must least 6 characters.'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages())->withInput();
        }

        $userData = array(
            'username'  => $request->get('username'),
            'password' => $request->get('password')
        );

        if (Auth::attempt($userData)) {
            
            if (Auth::user()->is_admin == 0 && Auth::user()->is_superadmin == 0 && Auth::user()->is_user == 0) {
                Auth::logout();
                return redirect()->intended('/404');
            } else {
                return redirect()->intended('/admin');
            }
        } else {
            return back()->with('error', __('Username or password is incorrect.'));
        }

    } 

    public function register()
    {   
        return view('admin.auth.register');
    }

    public function postRegister(Request $request)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ];

        $messages = [
            'name.required' => __('Please enter your Name.'),
            'username.required' => __('Please enter your Username.'),
            'password.required' => __('Please enter your Password.'),
            'password.min'      => __('Password must least 6 characters.'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages())->withInput();
        }
        $checkExist = User::where('username', $request->get('username'))->count();
            
        if ($checkExist > 0) {
            $errors = ["Username exists"];
            return response()->json(compact(['errors']), 422);
        }
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->roles_code = 'user'; 
        $user->username = $request->get('username');
        $user->is_user = 1;
        $user->save();

        return redirect('/login');

        $status = 'error';

        return response()->json(compact(['status']), 500);

    } 


    /**
     * Logout admin
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
