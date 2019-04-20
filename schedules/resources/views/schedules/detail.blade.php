@extends('layout')



@section('content')
@yield('d-styles')
  <link rel="stylesheet" href="/css/detail.css">


@php
$testdate = new DateTime($event_start_date['event_start_date']);
@endphp

  
    <div class="container">
    <div class="table-color" >
      <div class="top-table">
    
    <label for="startM">旅の開始月</label>

    <select name="startM" id="startM">

      @foreach($startMonths as $key => $val)

        <option value=$key @if($key == $startym) selected @endif>

          {{ $val['y'] }}年{{ $val['m'] }}月

        </option>

      @endforeach

    </select>

    <label for="startD">旅の開始日</label>

    <select name="startD" id="startD">

      @foreach($days as $day)

        <option value=$day @if($day == $startday) selected @endif>

          {{ $day }}日

        </option>

      @endforeach
    
    </select>
    
 </div>
    <div class="table-responsive">

    <table class="table table-bordered table-hover">

      <thead>

        <tr>

          <th scope='col'>時間 \ 日付</th>
          
        

          @foreach($columns as $column)
          
          <th scope='col'>
              
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

            @foreach($events as $event)

              @foreach($columns as $column)

                @if(new DateTime($event->event_date) == $testdate->modify('+'.$column.'days'))

                  @if(new DateTime($event->event_time) == new DateTime($val['s']) )

                    <td>

                      {{$event->event_title}}

                    </td>

                  @else

                    <td></td>

                  @endif

                @else

                    <td></td>

                @endif

                @php

                  $testdate = new DateTime($event_start_date['event_start_date']);

                @endphp

              @endforeach

            @endforeach

          </tr>

        @endforeach

      </tbody>

    </table>

    </div>

  </div>
  </div>
  

@endsection