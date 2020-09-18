@extends('layouts.admin')
@section('style')
  <link rel="stylesheet" href="/css/custom/listaroles.css">
@endsection
@section('content')
	 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Lista de Permisos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <!-- container -->
      <div class="container-fluid">
        <!-- row -->
        <div class="row justify-content-center">
          <!-- left column -->
          <!-- right column -->
          <div class="col-md-12">
            <!-- card -->
            <div class="card card-primary" id="card_permisos">
              <div class="card-header">
                <h3 class="card-title ">Permisos para el sistema</h3>
                <span class="float-right">
                  <button type="button" class="btn btn-primary p-0 ml-1" style="padding: 0 0.3rem; line-height: 1.2;" data-title="Expandir todos" id="collapse" ><i class="fas fa-chevron-circle-down"></i></button>
                </span>
                <span class="float-right pr-2">(29)</span>
              </div>
              <div class="card-body">
                <div class="row ">
                  @foreach($categorias_permisos as $categoria => $permisos)
                  <div class="input-group col-sm-12 ">
                    <button class="collapsible p-2" type="button">
                      <span class="pl-1">Permisos para {{$categoria}} ({{count($permisos)}})</span>
                    </button>
                    <div class="contenido" style="width: 100%;">
                    @foreach($permisos as $permiso )
                      <div class="input-group-prepend" style="width: 100%;">
                        <div class="input-group-text role-element p-0 border-rad" style="width: 100%;">
                          <label class="form-check-label d-block area-label pl-4"style="width:100%; text-align: left;">
                            <i class="fas fa-check-square text-primary"></i>
                            <span class="pl-1">{{$permiso['description']}}</span>
                          </label>
                        </div>
                      </div>
                    @endforeach
                    </div>
                  </div>
                  @endforeach
                </div>
              </div><!--card body-->
              <div class="card-footer">
                <p class="text-secondary m-0">Si necesita nuevos permisos <a href="mailto:edsondanyel@gmail.com?subject=Agregar%20nuevos%20permisos%20al%20sistema.">contacte al desarrollador.</a></p>
              </div>
              
            </div><!-- card -->
          </div><!-- left column -->
        </div><!-- row -->
      </div><!-- container -->
    </section>
@endsection

@section('scripts')
<script type="text/javascript">
  $("#collapse").click( function(){
    if($(this).children().hasClass("fa-chevron-circle-down")){
      expand_all();
      $("#collapse").children()
      .removeClass("fa-chevron-circle-down")
      .addClass("fa-chevron-circle-up");
      $(this).attr("data-title","Ocultar todos");
    }
    else{
      $("#collapse").children()
      .addClass("fa-chevron-circle-down")
      .removeClass("fa-chevron-circle-up");
      collapse_all();
      $(this).attr("data-title","Expandir todos");
    }
  });


  

  var coll = document.getElementsByClassName("collapsible");
  var i;
  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var content = this.nextElementSibling;
      if (content.style.maxHeight){
        content.style.maxHeight = null;
      } else {
        content.style.maxHeight = content.scrollHeight + "px";
      }
      content.classList.toggle("mb-3");
      if($(".active").length == $(".collapsible").length){
        $("#collapse").children()
        .removeClass("fa-chevron-circle-down")
        .addClass("fa-chevron-circle-up");
        $("#collapse").attr("data-title","Ocultar todos");
      }

      if($(".active").length == 0){
        $("#collapse").children()
        .addClass("fa-chevron-circle-down")
        .removeClass("fa-chevron-circle-up");
        $("#collapse").attr("data-title","Expandir todos");
      }
    });
  }
  function expand_all(){
    $(".collapsible").addClass('active');
    $(".contenido").addClass("mb-3");
    $.each( $(".contenido"), function() {
      this.style.maxHeight = this.scrollHeight + "px";
    });
  }
  function collapse_all(){
    $(".collapsible").removeClass('active');
    $(".contenido").removeClass("mb-3").css("max-height","");
    //$("html, body").animate({ scrollTop: $("#card_permisos").offset().top }, 200);
  }
</script>
@endsection