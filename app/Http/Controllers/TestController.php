<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller {



    public function submit(Request $req) {

        $data['da']=123;

        //$ch = curl_init('https://jsonplaceholder.typicode.com/posts' . http_build_query($data));
        $url = "https://reqbin.com/echo/post/json";

        $post_data = array (
            "foo" => "bar",
            "query" => "Nettuts",
            "action" => "Submit"
        );
        
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // Указываем, что у нас POST запрос
        curl_setopt($ch, CURLOPT_POST, 1);
        // Добавляем переменные
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        
        $output = curl_exec($ch);
        
        curl_close($ch);
        
        echo $output;

    }







    //
}
