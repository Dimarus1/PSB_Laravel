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
<h3>{{ $data->id }}</h3>
<p>{{ $data->EMAIL }}</p>
<p><small>{{ $data->created_at }}</small></p>
<a href="{{ route('OneDatal', $data->id) }}"><button class="btn btn-warning">Детальнее</button></a> 
</div>



</div>
</body>
</html>