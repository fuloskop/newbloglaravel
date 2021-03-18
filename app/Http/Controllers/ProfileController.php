<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

use App\Models\User;

class ProfileController extends Controller
{
    public function index(){
        return view('profile');
    }


    public function changepass(Request $request){


        $user = User::where('id', '=', auth()->user()->id)->first();

        if (Hash::check($request->current_password, $user->password)) {

            $this->validate($request, [
                'password' => 'min:6,confirmed,required_with:password_confirmed'
            ]);

            $user->password =  Hash::make($request->password);

            $user->save();

            return view('profile');
        }
        else{

            return view('profile');
        }

    }
}
