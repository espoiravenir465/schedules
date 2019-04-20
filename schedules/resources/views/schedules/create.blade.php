@extends('layout')

@section('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_orange.css">
@endsection

@section('content')
@yield('cr-styles')
  <link rel="stylesheet" href="/css/create.css">
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
                <div class="form-group">
                <label for="go_date">出発日</label>
                <input type="text" class="form-control" name="go_date" id="go_date" value="{{ old('go_date') }}" />
              </div>
              <div class="form-group">
                <label for="return_date">帰宅日</label>
                <input type="text" class="form-control" name="return_date" id="return_date" value="{{ old('return_date') }}" />
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

@section('scripts')
  <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
  <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
  
  
 
  <script>
      flatpickr(document.getElementById('go_date'), {
      locale: 'ja',
      dateFormat: "Y/m/d",
      minDate: new Date()

    });
  </script>
   <script>
      flatpickr(document.getElementById('return_date'), {
      locale: 'ja',
      dateFormat: "Y/m/d",
      minDate: new Date()

    });
  </script>
@endsection