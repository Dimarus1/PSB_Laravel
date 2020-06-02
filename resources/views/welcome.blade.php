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
   <div class="row">
     <div class="col-12">
	   <div class="card mt-5">
          <div class="card-body">
		  <img src="logozd.png" class="img-fluid img-thumbnail" alt="zdravkurort">
            <H5 class="card-title">Введите данные бронирования</H5>		  
			<!--<form action="{{ route('test-form') }}" method="post">-->
				<form action="/back" method="post">
                @csrf
				<div class="form-group">
				<label for="order"></label>
				<input id="order" type="text" name="order" class="form-control-lg" placeholder="Номер заказа AA000001" required>
				<small id="emailHelp" class="form-text text-muted"><b class="text-danger">Внимание! Оплачивайте заказ только после подтверждения!</b></small>
				</div>
				<div class="form-group">
				<label for="amnt"></label>
				<input id="amnt" type="number" name="amount" class="form-control-lg" placeholder="цена 10000" min="1" required>
				</div>
				<div class="form-group">
				<label for="email"></label>
				<input id="DESC" type="DESC" name="DESC" class="form-control-sm" placeholder="адрес E-mail">
				<small id="emailHelp" class="form-text text-muted">E-mail для получения чека об оплате</small>
				</div>

				<div class="form-group">				
				<button class="btn btn-success" type="submit">К оплате</button>
				</div>
				</form>
				<img src="logom.png" class="img-fluid img-thumbnail" alt="zdravkurort">
			</div>
		</div>
		
	</div>
  </div>
</div>


</body>
</html>