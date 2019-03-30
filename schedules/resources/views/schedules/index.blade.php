<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Schedule App</title>
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">Schedule App</a>
  </nav>
</header>
<main>
  <div class="container">
    <div class="center-block">
    <div class="row">
      <div class="col col-md-12">
        <nav class="panel panel-primary">
          <div class="panel-heading">スケジュール</div>
          <div class="panel-body">
            <a href="#" class="btn btn-default btn-block">
              スケジュールを追加する
            </a>
          </div>
          <div class="list-group">
            @foreach($schedules as $schedule)
              <a href="#" class="list-group-item">
                {{ $schedule->title }}
              </a>
            @endforeach
          </div>
        </nav>
      </div>
      <div class="column col-md-8">
        <!-- ここにタスクが表示される -->
      
      </div>
    </div>
    </div>
  </div>
</main>
</body>
</html>