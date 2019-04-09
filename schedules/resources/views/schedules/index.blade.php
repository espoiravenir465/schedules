@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-12">
        <nav class="panel panel-primary">
          <div class="panel-heading">スケジュール</div>
          
          <table class="table">
            <thead>
              <tr>
                <th>タイトル</th>
                <th>出発日</th>
                <th>帰宅日</th>
              </tr>
            </thead>
            
            <tbody>
              @foreach($schedules as $schedule)
              <tr>
                <th>
          
            
              <a href="#" >
                {{ $schedule->title }}
              </a>
          
          </th>
          <td>{{$schedule->go_date}}</td>
          <td>{{$schedule->return_date}}</td>
          </tr>
          @endforeach
          </tbody>
          </table>
        <div class="panel-footer">
            <a href="{{ route('schedules.create') }} class="btn btn-default btn-block">
              スケジュールを追加する
            </a>
          </div>
        </nav>
      </div>
      <div class="column col-md-8">
        <!-- ここにタスクが表示される -->
      </div>
    </div>
  </div>
@endsection
  