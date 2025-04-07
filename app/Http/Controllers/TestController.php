<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getTestName()
    {
        return 'This is test Name';
    }
}
