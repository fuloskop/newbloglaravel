<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class Tester extends Controller
{
    public function test(Request $request)
    {
        $test = $request->all();
        return Post::find($test);

    }
}
