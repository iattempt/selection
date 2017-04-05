@extends('schema/header')
@section('footer')
<div class="bg-primary text-white" style="position: absolute; bottom:0; width: 100%;">
  <div class="container-fluid">
    <div class="row">
      <span class="mx-auto">
        &copy;2016-<?php echo date('Y'); ?>&nbsp;Designed and maintained by the
        <a class="text-white" style="text-decoration: underline" href="https://github.com/iattempt">Ernest</a>
      </span>
      <div class="col-12"></div>
      <span class="mx-auto">
        <a class="text-white" style="text-decoration: underline" href="https://github.com/">Contribution</a>
        &nbsp;|&nbsp;
        <a class="text-white" style="text-decoration: underline" href="/feedback">Contact</a>
        &nbsp;|&nbsp;
        <a class="text-white" style="text-decoration: underline" href="/feedback">Feedback</a>
      </span>
    </div>
  </div>
</div>

@endsection
