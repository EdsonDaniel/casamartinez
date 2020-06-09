@extends('layouts.plantilla')

@section('title')
	
@endsection

@section('stylesheet')
<link href="css/custom/" rel="stylesheet" type="text/css" />
@endsection

@section('id-container')
  id="wh-bg"
@endsection

@section('content')

@endsection


@section('scripts')
<!--change navbar bg color-->
<script type="text/javascript">
  $(window).scroll(function(){
    var alto = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
    $("nav").toggleClass('scrolled', $(this).scrollTop()>alto);
  });
</script>
@endsection