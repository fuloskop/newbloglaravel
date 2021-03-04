<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

use DB;


class LoginController extends Controller
{
    public function index()
    {
        return view('login',['msg' => ""]);
    }

    public function checklogin(Request $request)
    {

            $this->validate($request,[
            'username' => 'required',
            'password' => 'required|min:5'
        ]);

        $userdata = array(
            'username' => $request->get('username'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($userdata)){
            return redirect ('login/successlogin');
        }
        else{
            return back()->with('error' , 'yanlış login');
        }
    }

    public function successlogin()
    {
       // return view ('successlogin');
        return redirect ('post');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }




    /*
        public function login(Request $request)
        {
            /*
            dd($request);

            if(isset($_GET['username'])&&isset($_GET['pass'])){
                $username = $_GET['username'];
                $pass = $_GET['pass'];
                $msg="";
                $checker = DB::select('select password from users where name = ?', [$username]);
                if($checker[0]->password == $pass) {
                    $msg = "giriş başarılı ";
                }else{
                    $msg = "giriş başarısız ";
                }
                return view('login', ['msg' => $msg]);
            }
            else{
                return view('login',['msg' => ""]);
            }


        }*/
}
