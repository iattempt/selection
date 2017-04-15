@extends('student/state')
@section('state')

<div id="test"></div>
<div class="container-fluid">
  <div class="row d-flex mx-auto">
    <div id="curriculum_th" class="col-12">
      <!--狀態列-->
      <div class="row d-flex justify-content-center">
        目前為:&nbsp;
        <a id="c_pre" onclick="changeState(this)" href="javascript:void(0)">預選課表</a>
        <a id="c_all" onclick="changeState(this)" href="javascript:void(0)">學期課表</a>
        &nbsp;
        <a id="c_week" onclick="changeWD(this)" href="javascript:void(0)">週課表</a>
        <a id="c_day" onclick="changeWD(this)" href="javascript:void(0)">日課表</a>
      </div>
      <!--end 狀態列-->
      <!--星期列-->
      <div class="row d-flex justify-content-center">
        <div class="col-2">
        </div>
        @foreach ($general->days as $d)
          <a onclick="changeD(this)" id="c_day{{$d->id}}" class="col c_clear" href="javascript:void(0)">
            {{$d->simple_name}}
          </a>
        @endforeach
      </div>
      <!--end 星期列-->
    </div>
    <div id="curriculum_tb" class="col-12">

    @foreach ($general->periods as $p)
      @if ($p->id%2 == 0)
      <div class="row d-flex justify-content-center">
      @else
      <div class="row d-flex justify-content-center bg-faded">
      @endif
        <!--時間行-->
        <div class="col-2">
          <div class="d-flex justify-content-center">
          {{$p->name}}
          </div>
          <div class="d-flex justify-content-center">
          {{$p->上課時間}}
          {{$p->下課時間}}
          </div>
        </div>
        <!--end 時間行-->
        <!--星期行-課表-->
        @foreach ($general->days as $d)
          <div class="c_dayn c_day{{$d->id}} col">
          @foreach ($general->curricula as $c)
            @foreach ($c->course->time as $t)
              @if ($t->day->name == $d->name && $t->period->name == $p->name)
                @if ($c->state=="預選中") 
                  <a class="state_pre">{{$c->course->name}}</a>
                @elseif ($c->state=="修課中")
                  <div class="state_now">{{$c->course->name}}</div>
                @endif
                @break
              @endif
            @endforeach
          @endforeach
          </div>
        @endforeach
        <!--end 星期行-課表-->
      </div>
    @endforeach
    
    </div>
  </div>
</div>

<script>
(function() {
  changeWD(this);
  changeState(this);
// || ! ((screen.width < 768) || (window.matchMedia && window.matchMedia("only screen and (max-width: 640px)").matches))
})()
function changeState(caller){
  var tb = document.getElementById("curriculum-tb");
  var pre = document.getElementsByClassName("state_pre");
  var now = document.getElementsByClassName("state_now"); 
  if (caller.id == "c_pre") {
    document.getElementById("c_pre").setAttribute('hidden', 'true');
    document.getElementById("c_all").removeAttribute('hidden');
    for (var i = 0, l = now.length; i < l; i++) {
      now[i].removeAttribute('hidden');
    }
    for (var i = 0, l = pre.length; i < l; i++) {
      pre[i].setAttribute('hidden', 'true');
    }
  }
  else {
    document.getElementById("c_all").setAttribute('hidden', 'true');
    document.getElementById("c_pre").removeAttribute('hidden');
    
    for (var i = 0, l = pre.length; i < l; i++) {
      pre[i].removeAttribute('hidden');
    }
    for (var i = 0, l = now.length; i < l; i++) {
      now[i].setAttribute('hidden', 'true');
    }
  }
}
function changeWD(caller){
  var tb = document.getElementById("curriculum-tb");
  var dn = document.getElementsByClassName("c_dayn"); 
  if (caller.id == "c_day") {
    document.getElementById("c_day").setAttribute("hidden", "true");
    document.getElementById("c_week").removeAttribute("hidden");
    for (var i = 0, l = dn.length; i < l; i++) {
      dn[i].removeAttribute("hidden");
      dn[i].classList.remove("col-");
      dn[i].classList.remove("d-flex");
      dn[i].classList.remove("justify-content-center");
    }
    var clear = document.getElementsByClassName("c_clear");
    for (var i = 0, l = clear.length; i < l; i++) {
      clear[i].classList.remove("text-white");
      clear[i].classList.remove("bg-primary");
    }
  }
  else {
    document.getElementById("c_week").setAttribute("hidden", "true");
    document.getElementById("c_day").removeAttribute("hidden");
    for (var i = 0, l = dn.length; i < l; i++) {
      dn[i].setAttribute("hidden", "true");
      dn[i].classList.remove("col-");
      dn[i].classList.remove("d-flex");
      dn[i].classList.remove("justify-content-center");
    }
    var temp_d = "c_day" + (new Date().getDay());
    var dv = document.getElementsByClassName(temp_d);
    for (var i = 0, l = dv.length; i < l; i++) {
      dv[i].removeAttribute("hidden");
      dv[i].className += " col- d-flex justify-content-center";
    }
    changeDTitle(temp_d);
  }
}
function changeD(caller)
{
  var dn = document.getElementsByClassName("c_dayn"); 
  document.getElementById("c_week").setAttribute("hidden", "true");
  document.getElementById("c_day").removeAttribute("hidden");
  //設定資料顯示
  for (var i = 0, l = dn.length; i < l; i++) {
    dn[i].setAttribute("hidden", "true");
    dn[i].classList.remove("col-");
    dn[i].classList.remove("d-flex");
    dn[i].classList.remove("justify-content-center");
  }
  temp_d = caller.id;
  var dv = document.getElementsByClassName(temp_d);
  for (var i = 0, l = dv.length; i < l; i++) {
    dv[i].removeAttribute("hidden");
    dv[i].className += " col- d-flex justify-content-center";
  }
  changeDTitle(caller.id);
}
function changeDTitle(id)
{
  var display = document.getElementById(id);
  var clear = document.getElementsByClassName("c_clear");
  for (var i = 0, l = clear.length; i < l; i++) {
    clear[i].classList.remove("text-white");
    clear[i].classList.remove("bg-primary");
  }
  display.className += " text-white";
  display.className += " bg-primary";
}
</script>

@endsection
