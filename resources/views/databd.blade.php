<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Здравкурорт оплата картой</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<H1>Все Записи</H1>
@foreach($data as $el)
<div class="alert alert-info">
<h3>{{ $el->id }}</h3>
<p>{{ $el->EMAIL }}</p>
<p><small>{{ $el->created_at }}</small></p>
</div>
@endforeach



</body>
</html>