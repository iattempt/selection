@extends('pre-selection')
@section('main')
@parent

<div class="container-fluid">
  <!-- Filter -->
    @include ('course_search_partials/filter')
  <!-- end of Filter form  -->
  <!-- Display result -->
  <div class="row">
    <div class="col-12">
      <ul class="list-group">
        <!-- title -->
        <li class="list-group-item row">
          <span class="col">課程名稱</span>
          <span class="col">授課教師</span>
          <span class="col">修別</span>
          <span class="col">星期</span>
          <span class="col">時段</span>
        <!--
        @if ($general->identity === "student")
          <span class="col">加選</span>
        @endif
        -->
        </li>
        <!-- end of title -->
        <!-- lists -->
        @foreach ($general->lists as $list)
          @include ('course_search_partials/course_list')
        @endforeach
        <!-- end of lists -->
      </ul>
    </div>
  </div>
  <!-- end of Display result-->
</div>

@endsection
