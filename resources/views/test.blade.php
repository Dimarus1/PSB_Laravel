<?php
//Первая компонента ключа
$comp1 = env('CMP1');
//Вторая компонента ключа
$comp2 = env('CMP2');
//Данные для отправки на ПШ
$orderchek='ZZ';  		//кэшбэк за туры по россии
$cashback='$'; 			// метка в описание заказа для проверки
						//  $ - простой тур, $$ тур с кешбэком, $$$ тур детский кэшбэк
$orderchek2='RR';  		//кэшбэк за детские туры по россии
$PSBTerminal='29517501';
$PSBMerchant='000472229517501';

if (stripos($_POST['ORDER'], $orderchek) !== false) {
    $PSBTerminal='29517502';                                    //Кэшбэк за туры по россии
    $PSBMerchant='000472229517502';
    $cashback='$$';
}

if (stripos($_POST['ORDER'], $orderchek2) !== false) {
    $PSBTerminal='29517503';                                    //Кэшбэк за детские туры по россии
    $PSBMerchant='000472229517503';
	  $cashback='$$$';
}

$data = [
'amount' => number_format($_POST['AMOUNT'],2,'.',''),
'currency' => 'RUB',
'order' => preg_replace('~\D+~', '', ($_POST['ORDER'])),
'desc' => $cashback . ' www.zdravkurort.ru  '. $_POST['ORDER'],
'terminal' => $PSBTerminal,
'trtype' => '1',
'merch_name' => 'ZDRAVKURORT',
'merchant' => $PSBMerchant,
'email' => $_POST['EMAIL'],
'timestamp' => gmdate("YmdHis"),
'nonce' => bin2hex(random_bytes(16)),
'backref' => 'https://zdravkurort.ru/chek_card',
'notify_url' =>  'https://pay.zdravkurort.ru/back',
'cardholder_notify' => 'EMAIL',
'merchant_notify' => 'EMAIL',
'merchant_notify_email' => 'client@zdravkurort.ru'
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
$data['p_sign'] = strtoupper(hash_hmac('sha256', $string, pack('H*', $key)));
//Вывод формы для передачи запроса на ПШ
echo "<form id='payment_form' action='https://3ds.payment.ru/cgi-bin/cgi_link' method = 'POST'>";
foreach ($data as $param => $value) {
echo "<input type='hidden' name='" . strtoupper($param) . "' value='" . $value . "'/>";
}
echo "<input type='submit' name='SUBMIT' value='Перейти к оплате' />";
echo "</form>";
echo "Если не произошло автоматического перенаправления, нажмите на кнопку 'Перейти к оплате'";
echo "<script type='text/javascript'>document.getElementById('payment_form').submit();</script>";
?>