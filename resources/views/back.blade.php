<?php
if (isset($_POST['P_SIGN'])) {
 $comp1 = 'C50E41160302E0F5D6D59F1AA3925C45';
 $comp2 = '00000000000000000000000000000000';

 $params = array_change_key_case($_POST,CASE_LOWER);
 $vars =
["amount","currency","order","merch_name","merchant","terminal","email","trtype","timestamp","nonce","backref"
,"result","rc","rctext","authcode","rrn","int_ref"];
 $string = '';
 foreach ($vars as $param){
 if(isset($params[$param]) && strlen($params[$param]) != 0){
 $string .= strlen($params[$param]) . $params[$param];
 } else {
 $string .= "-";
 }
 }
 $key = strtoupper(implode(unpack("H32",pack("H32",$comp1) ^ pack("H32",$comp2))));
 $sign = strtoupper(hash_hmac('sha1', $string, pack('H*', $key)));
 if (strcasecmp($params['p_sign'],$sign) == 0) {
//Если подпись совпала, то выполняем необходимые действия. Для примера записываем результат в
файл, если операция прошла успешно:
 if ((int)$params['result'] == 0 && strcasecmp($params['rc'],'00') == 0) {
$file = 'notification_auth_' . bin2hex(random_bytes(5)). '.txt';
 $message = implode("\n",$params);
 file_put_contents($file,$message,FILE_APPEND);
 }
 }
}