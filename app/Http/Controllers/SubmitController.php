<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmitController extends Controller {
    
    public function submit() {
        dd(Request::all());
    }
}
