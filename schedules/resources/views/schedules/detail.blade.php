@extends('layout')



@section('content')
@yield('d-styles')
  <link rel="stylesheet" href="/css/detail.css">


@php
$testdate = new DateTime($event_start_date['event_start_date']);
@endphp

  
    <div class="container">
      @if($errors->any())
      <div class="alert alert-danger">
        @foreach($errors->all() as $message)
          <p>{{ $message }}</p>
        @endforeach
      </div>
    @endif
    
    <form action="{{ route('schedules.detail',['id' => $schedule_id])}}" method="POST">
      @csrf
      
      
    <div class="table-color" >
      <div class="top-table">
    
    <label for="startM">旅の開始月</label>

    <select name="startM" id="startM">

      @foreach($startMonths as $key => $val)

        <option value="{{ $key }}" @if($key == $startym) selected @endif>

          {{ $val['y'] }}年{{ $val['m'] }}月

        </option>

      @endforeach

    </select>

    <label for="startD">旅の開始日</label>

    <select name="startD" id="startD">

      @foreach($days as $day)

        <option value="{{$day}}" @if($day == $startday) selected @endif>

          {{ $day }}日

        </option>

      @endforeach
    
    </select>
    
 </div>
    <div class="table-responsive">

    <table class="table table-bordered table-hover">

      <thead>

        <tr>

          <th scope='col'>日付 / 時間</th>
          
        

          @foreach($columns as $column)
          
          <th class='a'>
              
              {{$testdate->modify('+'.$column.'days')->format('m/d')}}
              
        

              @php

                $testdate = new DateTime($event_start_date['event_start_date']);

              @endphp

          </th>
        
          @endforeach
        
      
      </tr>

      </thead>
      <tbody>
      

        @foreach($hours as $key => $val)

          <tr>

            <th>{{$val['r']}}</th>
            
            @foreach($columns as $column)

            @foreach($events as $event)

             @php
                $test = false;
             @endphp
             
            @if(new DateTime($event->event_date) == $testdate->modify('+'.$column.'days') && new DateTime($event->event_time) == new DateTime($val['s']) )
                      @php
                        $test = true;
                      @endphp
                      <td class="b">
                      <input type="text" class="form-control" name="title{{$column}}{{$val['s']}}" id="title{{$column}}{{$val['s']}}" value="{{$event->event_title}}" />
                      </td>
                      @break
                  @endif
                  @php
                    $testdate = new DateTime($event_start_date['event_start_date']);
                  @endphp
                  
              @endforeach
              
              @if($test == false)
                  <td class="c">
                    <input type="text" class="form-control" name="title{{$column}}{{$val['s']}}" id="title{{$column}}{{$val['s']}}" value="" />
                   </td>
                @endif

            @endforeach

          </tr>

        @endforeach

      </tbody>

    </table>

    </div>

  </div>
   
     <div class="text-right">
      
        <button type="submit" class="btn btn-primary">送信</button>
        
      </div>
    </div>
  </form>
  </div>
  

@endsection