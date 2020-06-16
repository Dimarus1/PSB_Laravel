<?php
$comp1 = 'C50E41160302E0F5D6D59F1AA3925C45';
$comp2 = '00000000000000000000000000000000';
$data = [
'amount' => $el->amount,
'currency' => $el->currency,
'order' => $el->order,
'desc' => $el->desc,
'terminal' => $el->terminal,
'trtype' => $el->trtype,
'merch_name' => $el->merch_name,
'merchant' => $el->merchant,
'email' => $el->email,
'timestamp' => gmdate("YmdHis"),
'nonce' => bin2hex(random_bytes(16))
];
$vars = ["amount","currency","order","merch_name","merchant","terminal","email","trtype","timestamp","nonce","backref"];
$string = '';
foreach ($vars as $param) {
if(isset($data[$param]) && strlen($data[$param]) != 0){
$string .= strlen($data[$param]) . $data[$param];
} else {
$string .= "-";
}
}
$key = strtoupper(implode(unpack("H32",pack("H32",$comp1) ^ pack("H32",$comp2))));
$data['p_sign'] = strtoupper(hash_hmac('sha1', $string, pack('H*', $key)));
$url = "https://test.3ds.payment.ru/cgi-bin/check_operation/ecomm_check";
$host = "test.3ds.payment.ru";
$headers = [
"Host: " . $host,
"User-Agent: " . $_SERVER['HTTP_USER_AGENT'],
"Accept: */*",
"Content-Type: application/x-www-form-urlencoded; charset=utf-8"
];
$params = array_change_key_case($data,CASE_UPPER);
$query = http_build_query($params);
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$query);
curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,15);
curl_setopt($ch,CURLOPT_TIMEOUT,60);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
$response = curl_exec($ch);
if(!$response){
return curl_error($ch);
}
curl_close($ch);
echo $response;
?>