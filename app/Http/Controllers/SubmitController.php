<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmitController extends Controller {
    
    public function submit(Request $req) {
        print($req->input('orderNumber'));
        print($req->input('amount'));
    }
}
