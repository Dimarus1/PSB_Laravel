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

<button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#demo">
  Открыть кнопку
</button>
  <div id="demo" class="collapse in">Кнопка для возврата денег плптельщику
  <a href="{{ route('Ref', $data->id) }}"><button class="btn btn-danger">ВОЗВРАТ ДЕНЕГ</button></a> 
  </div> 
</div>




<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                Пункт Группы Свертывания #1
              </a>
            </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                Пункт Группы Свертывания #2
              </a>
            </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                Пункт Группы Свертывания #3
              </a>
            </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>

</div>
</body>
</html>