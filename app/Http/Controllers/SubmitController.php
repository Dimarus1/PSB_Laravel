<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmitController extends Controller {
    
    public function submit(Request $req) {
        

//Первая компонента ключа
$comp1 = 'C50E41160302E0F5D6D59F1AA3925C45';
//Вторая компонента ключа
$comp2 = '00000000000000000000000000000000';
//Данные для отправки на ПШ
$data = [
'amount' => ($req->input('amount')),
'currency' => 'RUB',
'order' => str_shuffle('0123456789'),
'desc' => ($req->input('orderNumber')),
'terminal' => '79036777',
'trtype' => '1',
'merch_name' => 'Test Shop',
'merchant' => '000599979036777',
'email' => 'cardholder@mail.test',
'timestamp' => gmdate("YmdHis"),
'nonce' => bin2hex(random_bytes(16)),
'backref' => 'https://' . $_SERVER['SERVER_NAME'] . '/backref.php',
'notify_url' => 'https://' . $_SERVER['SERVER_NAME'] . '/notify.php',
'cardholder_notify' => 'EMAIL',
'merchant_notify' => 'EMAIL',
'merchant_notify_email' => 'merchant@mail.test'
];
//Расчет P_SIGN
$vars = ["amount","currency","order","merch_name","merchant","terminal","email","trtype","timestamp","nonce","backref"];
$string = '';
foreach ($vars as $param){
if(isset($data[$param]) && strlen($data[$param]) != 0){
$string .= strlen($data[$param]) . $data[$param];
} else {
$string .= "-";
}
}
$key = strtoupper(implode(unpack("H32",pack("H32",$comp1) ^ pack("H32",$comp2))));
$data['p_sign'] = strtoupper(hash_hmac('sha1', $string, pack('H*', $key)));

// ТЕСТ Курл от олд шлюза
//dd($data);

$ch = curl_init('http://zdravpay.ru/test' . http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, 1);
$res = curl_exec($ch);
curl_close($ch);
$res = json_decode($res,1);
if (empty($res['orderId'])){
    // Возникла ошибка:
    echo $res['errorMessage']; 
	echo ('NOT WORK');
                         
} else {
    // Успех:
    // Тут нужно сохранить ID платежа в своей БД - $res['orderId']

    // Перенаправление клиента на страницу оплаты.
    header('Location: ' . $res['formUrl'], true);
       }

















    }
}
