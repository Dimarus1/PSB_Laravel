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
<h3>{{ $data->ORDER }} -------Номер заказа</h3>
<p><big>{{ $data->DESC }}    -------Описание</big></p>
<p><big>{{ $data->AMOUNT }}  -------Оплаченная сумма</big></p>
<p>{{ $data->CURRENCY }}  -------валюта</p>
<p><big>{{ $data->RCTEXT }}  -------Успешно или нет(Только Approved успешно)</big></p>
<p>{{ $data->CARD }}  -------Карта клиента</p>
<p>{{ $data->EMAIL }} -------</p>
<p>{{ $data->id }}  -------id в базе</p>
<p>{{ $data->TIMESTAMP }} -------дата время</p>
<p>{{ $data->INT_REF }}    -------INT_REF</p>
<p>{{ $data->MERCH_NAME }}     -------MERCH_NAME</p>
<p>{{ $data->MERCHANT }}      -------MERCHANT</p>
<p>{{ $data->TERMINAL }}     -------TERMINAL</p>
<p>{{ $data->AUTHCODE }}     -------AUTHCODE</p>
<p>{{ $data->TRTYPE }}  -------Trtype</p>
<p>{{ $data->NONCE }}     -------NONCE</p>
<p>{{ $data->BACKREF }}    -------BACKREF</p>
<p>{{ $data->RESULT }} -------Результат</p>
<p>{{ $data->RC }}    ------- RC</p>
<p>{{ $data->P_SIGN }}    -------P_SIGN</p>
<p>{{ $data->RRN }}    -------RRN</p>
<p>{{ $data->NAME }}    -------NAME</p>
<p>{{ $data->CHANNEL }}     -------CHANNEL</p>
<p>{{ $data->ADDINFO }}     -------ADDINFO</p>
<p><small>{{ $data->created_at }}</small></p>
<a href="{{ route('chekbank', $data->id) }}"><button class="btn btn-warning">Детальнее</button></a> 
</div>



</div>
</body>
</html>