<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmitController extends Controller {
    
    public function submit(Request $req) {
        dd($req->input('orderNumber', 'amount'));
        dd($req->input('amount'));
    }
}
