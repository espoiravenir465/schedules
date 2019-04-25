@extends('layout')

@section('content')
@yield('s-styles')
  <link rel="stylesheet" href="/css/schedules.css">


  <div class="container">
    <div class="row">
      <div class="col col-md-12">
      <div class="panel-color">
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
          
            
              <a href={{ route('schedules.detail', ['id' => $schedule->id]) }} class="list-group-item" >
                {{ $schedule->title }}
              </a>
          
          </th>
          <td>{{$schedule->go_date}}</td>
          <td>{{$schedule->return_date}}</td>
          </tr>
          @endforeach
          </tbody>
          </table>
          <a class="btn" href="{{ route('schedules.create') }}" class="btn btn-default btn-block">

              しおりを追加する

            </a>
        </nav>
        </div>
      </div>
      <div class="column col-md-8">
        <!-- ここにタスクが表示される -->
      </div>
    </div>
  </div>
@endsection
  