<li class="list-group-item row">
  <span class="col">
    <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="false">
    {{$list->course_name}}
    </a>
  </span>

  <span class="col">
    {{$list->professor_name}}
  </span>

  <span class="col">
  </span>

  <span class="col">
    {{$list->day_name}}
  </span>

  <span class="col">
    {{$list->period_name}}
  </span>

<!--
@if ($general->identity === "student")
  <span class="col">
    <label class="custom-condivol custom-checkbox">
      <input type="checkbox" class="custom-condivol-input">
    </label>
  </span>
@endif
-->

</li>
<div class="row">
  <div class="collapse" id="collapseExample">
    <div class="card card-block">
      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
    </div>
  </div>
</div>
