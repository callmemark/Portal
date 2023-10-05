<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserData;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserDataController extends Controller
{
    public function create(Request $request)
    {   
        // Validate inputs
        $data = $request -> validate([
            'firstname' => 'required|string',
            'middlename' => 'required|string',
            'lastname' => 'required|string', 
            'email' => 'required|string',
            'pwd' => 'required|string',
        ]);

        // verify if new user have admin access
        $is_admin_checked = $request -> input('isadmin');
        $set_admin = false;

        if($is_admin_checked){
            $set_admin = true;
        }

        // Hashed password with Bcrypt algorithm
        $hashed = Hash::make($request -> pwd);

        $data['pwd'] = $hashed;
        $data['isadmin'] = $set_admin;

        $new_user = UserData::create($data);

        // if new user creation failed create error session
        if(!$new_user){
            return redirect(route('create_account')) -> with('error', 'Error creating account');
        }

        return view('signin') -> with('success', 'New account created');
    }

    public function signin(Request $request)
    {
        // forget success and error session
        $request -> session() -> forget(['success'. 'error']);

        // validate form
        $request -> validate([
            'email' => 'string|required',
            'pwd' => 'string|required',
        ]);

        // Attempt login
        $query = UserData::where('email', $request -> email) -> get();
        $hashedpassword = $query -> pluck('pwd')[0];

        if($query -> isEmpty() == false){
            if(Hash::check($request -> pwd, $hashedpassword)){
                session(['user_id' => $query-> pluck('id')[0]]);
                return view('dashboard', ['email' => $request -> email]); 
            } else {
                return view('signin') -> with('error', 'error signing in');
            }
        }

        return view('signin') -> with('error', 'error signing in');
    }



    public function getdashboard(UserData $user){
        return view('dashboard', $user);
    }


    public function logout(Request $request){
        $request -> session() -> forget('user_id');
        return redirect(route('signin.form'));
    }


    public function signup(){
        return view('signup');
    }
    

}
