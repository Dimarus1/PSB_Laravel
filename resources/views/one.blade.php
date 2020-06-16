<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Здравкурорт оплата картой</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<H1>Одна запись</H1>

<div class="alert alert-info">
<h3>{{ $data->ORDER }} Номер заказа</h3>
<p>{{ $data->DESC }}    Описание</p>
<p>{{ $data->AMOUNT }}  Оплаченная сумма</p>
<p>{{ $data->CURRENCY }}  валюта</p>
<p>{{ $data->P_SIGN }}</p>
<p>{{ $data->CARD }}  Карта клиента</p>
<p>{{ $data->EMAIL }}</p>
<p>{{ $data->id }}  id в базе</p>
<p>{{ $data->TIMESTAMP }} дата время</p>
<p>{{ $data->INT_REF }}</p>
<p>{{ $data->MERCH_NAME }}</p>
<p>{{ $data->MERCHANT }}</p>
<p>{{ $data->TERMINAL }}</p>
<p>{{ $data->AUTHCODE }}</p>
<p>{{ $data->TRTYPE }}  Trtype</p>

<p>{{ $data->NONCE }}</p>
<p>{{ $data->BACKREF }}</p>
<p>{{ $data->RESULT }} Результат</p>
<p>{{ $data->RC }}</p>
<p>{{ $data->RCTEXT }}</p>

<p>{{ $data->RRN }}</p>


<p>{{ $data->NAME }}</p>

<p>{{ $data->CHANNEL }}</p>
<p>{{ $data->ADDINFO }}</p>

<p><small>{{ $data->created_at }}</small></p>
<a href="{{ route('OneDatal', $data->id) }}"><button class="btn btn-warning">Детальнее</button></a> 
</div>



</div>
</body>
</html>