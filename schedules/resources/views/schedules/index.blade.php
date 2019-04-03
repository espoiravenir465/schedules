@extends('layout')

@section('content')
  <div class="container">
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
@endsection
  