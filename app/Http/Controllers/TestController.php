<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller {



    public function submit(Request $req) {

        $data['da']=123;

        $ch = curl_init('https://jsonplaceholder.typicode.com/posts' . http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        $res = curl_exec($ch);
        curl_close($ch);
        $res = json_decode($res,1);
        if (empty($res)){
            // Возникла ошибка:
            //echo $res['errorMessage']; 
            echo "NOT WORK";
                                 
        } else {
            // Успех:
            // Тут нужно сохранить ID платежа в своей БД - $res['orderId']
            dd($res);
            // Перенаправление клиента на страницу оплаты.
            header('Location: ' . 'zdravpay.ru', true);
               }

    }







    //
}
