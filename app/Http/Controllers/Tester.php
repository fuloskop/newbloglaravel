<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class Tester extends Controller
{
    public function test()
    {
        try {
            $testdata = DB::select('select password from users where name = ?', ['fuloskop']);
        }catch (QueryException $e) {
            //var_dump($e->getMessage())
            $testdata = $e->getMessage();
            }


        return view('WriteTest' , ['testdata' => $testdata]);
    }
}
