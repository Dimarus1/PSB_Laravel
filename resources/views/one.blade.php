<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Здравкурорт оплата картой</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
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
<a href="{{ route('Bank', $data->id) }}"><button class="btn btn-success">ПРОВЕРИТЬ в банке
</button></a></br>

<div id="BTNS">
<a href="{{ route('Ref', $data->id) }}"><button class="btn btn-danger">ВОЗВРАТ ДЕНЕГ
</button></a> 
</div>

<a href="javascript:void(0)" onclick="showHide('BTNS')">Скрыть/Показать элемент</a><br/><br/>
        <div id="BTNS" style="display: none;">
            Тут любой текст и html код<br/>
            <br/>
            Дизайн студия OX2 разрабатывает сайты и интернет магазины любой сложности. <br/>
            По низким ценам! 
        </div>


<script type="text/javascript">
            /**
            * Функция Скрывает/Показывает блок 
            * 
            **/
            function showHide(BTNS) {
                //Если элемент с id-шником element_id существует
                if (document.getElementById(BTNS)) { 
                    //Записываем ссылку на элемент в переменную obj
                    var obj = document.getElementById(BTNS); 
                    //Если css-свойство display не block, то: 
                    if (obj.style.display != "block") { 
                        obj.style.display = "block"; //Показываем элемент
                    }
                    else obj.style.display = "none"; //Скрываем элемент
                }
                //Если элемент с id-шником element_id не найден, то выводим сообщение
                else alert("Элемент с id: " + BTNS + " не найден!"); 
            }   
        </script>



</div>
</body>
</html>