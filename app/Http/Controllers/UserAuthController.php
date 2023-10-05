<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserData;

class UserAuthController extends Controller
{
    public function get(Request $request){
        if($request -> session() -> has('user_id')){
            $user_id = $request -> session() -> get('user_id');
            $user_data = UserData::where('id', $user_id) -> get();

            if($user_data -> isEmpty() == false){
                return view('dashboard', ['email' => $user_data -> pluck('email')[0]]);
            }
            return view('signin');
        }
        return view('signin');
    }
}
