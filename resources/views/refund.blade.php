<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Здравкурорт оплата картой</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

<?php
$comp1 = 'C50E41160302E0F5D6D59F1AA3925C45';
$comp2 = '00000000000000000000000000000000';
$data = [
'order' => 1234567,
'amount' => 666.00,
'currency' => 'RUB',
'org_amount' => 666.00,
'rrn' => 016891347225,
'int_ref' => '7ADD1F567F523874',
'terminal' => 79036777,
'trtype' => '14',
'cardholder_notify' => 'EMAIL',
'email' => 'EMAIL',
'merchant_notify' => 'client@zdravkurort.ru',
'merchant_notify_email' => 'client@zdravkurort.ru',
'notify_url' => 'https://pay.zdravkurort.ru/back',

  /*'order' => '620749153',
  'amount' => number_format('300',2,'.',''),
  'currency' => 'RUB',
  'org_amount' => number_format('300',2,'.',''),
  'rrn' => '911491440337',
  'int_ref' => '1ED52C3B234CBAF8',
  'terminal' => '79036777',
  'trtype' => '14',
  'cardholder_notify' => 'EMAIL',
  'email' => 'cardholder@mail.test',
  'merchant_notify' => 'EMAIL',
  'merchant_notify_email' => 'merchant@mail.test',
  'notify_url' => 'https://' . $_SERVER['SERVER_NAME'] . '/back.php',*/
  'timestamp' => gmdate("YmdHis"),
  'nonce' => bin2hex(random_bytes(16))
  ];
  $vars = ["order","amount","currency","org_amount","rrn","int_ref","trtype","terminal","backref","email","timestamp","nonce"];
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
  $url = "https://test.3ds.payment.ru/cgi-bin/cgi_link";
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
  echo($response);

?>

</body>
</html>