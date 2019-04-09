@extends('layout')


@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-12">
        <nav class="panel panel-primary">
         <div class="panel-heading">スケジュールを追加する</div>
           <div class="panel-body">
           @if($errors->any())
          <div class="alert alert-danger">
          <ul>
          @foreach($errors->all() as $message)
          <li>{{ $message }}</li>
          @endforeach
          </ul>
          </div>
          @endif

              <form action="{{ route('schedules.create') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="title">スケジュール名</label>
                  <input type="text" class="form-control" name="title" id="title" />
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary">送信</button>
                </div>
              </form>
            </div>
        </div>
        </nav>
    </div>
    </div>
    </div>
@endsection
  