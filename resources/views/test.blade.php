<?php
//Первая компонента ключа
$comp1 = 'C50E41160302E0F5D6D59F1AA3925C45';
//Вторая компонента ключа
$comp2 = '00000000000000000000000000000000';
//Данные для отправки на ПШ
$data = [
'amount' => number_format($_POST['amount'],2,'.',''),
'currency' => 'RUB',
'order' => $_POST['orderNumber'],
'desc' => 'Test payment',
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
//Вывод формы для передачи запроса на ПШ
echo "<form id='payment_form' action='https://test.3ds.payment.ru/cgi-bin/cgi_link' method = 'POST'>";
foreach ($data as $param => $value) {
echo "<input type='hidden' name='" . strtoupper($param) . "' value='" . $value . "'/>";
}
echo "<input type='submit' name='SUBMIT' value='Перейти к оплате' />";
echo "</form>";
echo "Если не произошло автоматического перенаправления, нажмите на кнопку 'Перейти к оплате'";
echo "<script type='text/javascript'>document.getElementById('payment_form').submit();</script>";
?>