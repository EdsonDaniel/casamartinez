@extends('layouts.plantilla')

@section('title')
	Certificaciones
@endsection

@section('stylesheet')
<link href="css/custom/campos.css" rel="stylesheet" type="text/css" />
@endsection

@section('id-container')
  id="wh-bg"
@endsection

@section('content')
<!--encabezado-->
  <div class="bg-image container-image fade-scroll"style="background-color: black; height: 100vh;">
    <!--<div class="centered" style="top: 50%;">Certificaciones</div>-->
    <div class="bg-img" style="background-image: url('img/portada-certificaciones.jpg');"></div>
  </div>
  <!--encabezado-->

  <!-- texto -->
  <div class="texto">
    <h3>CERTIFICACIONES</h3>
    <p>El respeto a la tierra es lo que le enseñamos a nuestros hijos. Nuestro producto Origen Verde es la única marca en el mercado completamente ecológica.</p>
    <p>Somos la única familia Mezcalera en contar con certificación <b>ORGÁNICA</b> y <b>BIODINÁMICA</b>.</p>
    <p><b>Certificación Orgánica </b> bajo las normas NOP de EEUU y EU y la NOM Mexicana.</p>
    <p><b>Actualmente somos la primera marca de Mezcal en contar con Certificación Biodinámica.</b></p>
    <p>En la agricultura biodinámica respetamos principios para asegurar la salud de la tierra, las plantas, los animales y las personas.</p>
    <p>Certificados por <a href="https://imocert.bio/" style="color: #212529; text-decoration: underline;">IMOCert</a></p>
  </div>
  <!-- texto -->

  <div class="container">
    <div class="row">
      
      <div class="col-6 col-md-3">
        <a href="https://www.gob.mx/agricultura/es/articulos/certificacion-de-productos-organicos"  title="Logo SAGARPA"><img class="img-fluid p-4" src="/img/logo-sagarpa-organico.png" alt="Logo Sagarpa Orgánico"></a>
      </div>

      <div class="col-6 col-md-3">
        <a href="https://certifications.controlunion.com/es/certification-programs/certification-programs/usda-normativa-organica-de-nop-para-eeuu"  title="Logo USDA"><img class="img-fluid p-4" src="/img/usda-organic.png" alt="Logo USDA Organic"></a>
      </div>

      <div class="col-6 col-md-3 d-flex align-items-center">
        <a href="https://ec.europa.eu/info/food-farming-fisheries/farming/organic-farming/organic-logo_es"  title="Logo EU Organic"><img class="img-fluid" src="/img/eu-organic-logo.png" alt="Logo EU Organic"></a>
      </div>

      <div class="col-6 col-md-3 d-flex align-items-center">
        <a href="https://www.demeter-usa.org/certification/"  title="Logo DEMETER"><img class="img-fluid" src="/img/logo-demeter.png" alt="Logo DEMETER"></a>
      </div>

    </div>
   
  </div>


 <hr style="margin: 80px auto; width: 80%;" >

  <!-- texto -->
  <div class="texto">
    <h3>PROGRAMAS</h3>
    <p>Contamos con dos programas de responsabilidad:</p>
    <ul>
      <li><strong>AgaVerde:</strong> Programa de responsabilidad ambiental. 
        <br> Basado en el cultivo sustentables y la aplicación de los principios orgánicos y biodinámicas en nuestro cultivo y producción.
      </li>
      <li><strong>Bin Dob:</strong> Programa de responsabilidad social. 
        <br>Programa en donde buscamos enaltecer a nuestra gente, nuestra cultura, nuestra lengua y con el Señor Maguey.
      </li>
    </ul>
  </div>
  <!-- texto -->

  <div class="block-cita">
    <blockquote>
      <p class="text-cita"><em>“Por su naturaleza de vegetal resistente al desierto, pero generoso en sus dadivas para quien las sabe aprovechar; por su vínculo estrecho con la luna, que simboliza la totalidad de la vida sacralizada del México antiguo; porque después de la conquista y el desplome de las civilizaciones mesoamericanas siguió siendo techo, vestido, ayate, comida, vino, medicina y defensa de los mexicanos, el maguey merece ser llamado reverencialmente Señor Maguey.”</em></p>
    </blockquote>
    <p class="ref-cita">[El Señor Maguey, Fernando Benítez, Artes de México, 51.]</p>
  </div>

  <!-- RECONOCIMIENTOS -->
  <div class="texto">
    <h3>RECONOCIMIENTOS</h3>
    <p>Nos esforzamos día a día por mejorar y ofrecerle los productos de la más alta calidad. Fruto de nuestra dedicación y amor a nuestra profesión, se nos ha atribuido el honor de ser galardonados con  los siguientes reconocimientos otorgados por <a href="https://www.sfspiritscomp.com/about/" style="color: #4a4a4a; text-decoration: underline;">San Francisco World Spirits Competition:</a> 
    </p>
    <ul>
      <li><a href="https://www.sfspiritscomp.com/wp-content/uploads/2018/01/2011_SpiritsBrand.pdf#page=51" style="color: #4a4a4a;">2011 Mezcal Reposado</a>
        <ul id="sub-items">
          <li>Best in Show.</li>
          <li>Best aged white spirit.</li>
          <li>Double Gold Medal.</li>
          <li>Top 5 Best Spirits of the world</li>
        </ul>
      </li>
      <li style="margin-top: 30px;"><a style="color: #4a4a4a;" href="https://www.sfspiritscomp.com/wp-content/uploads/2018/01/2012_resultsByBrand.pdf#page=51">2012 Mezcal Joven</a>
        <ul id="sub-items">
          <li>Silver Medal.</li>
        </ul>
      </li>  
    </ul>
  </div>
  <!-- RECONOCIMIENTOS -->

  <!--next section-->
  <div class="next" style="background-color: black;">
    <div class="next-text">
      <p>CONOCE</p>
      <p><a href="/productos">PRODUCTOS CASA MARTÍNEZ</a></p>
    </div>
    <div class="next-fondo" style="background-image: url('img/productos.jpg');"></div>
  </div>
  <!--next section-->
@endsection


@section('scripts')
<!--change navbar bg color-->
<script type="text/javascript">
  $(window).scroll(function(){
    var alto = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
    $("nav").toggleClass('scrolled', $(this).scrollTop()>alto/2);
    $('.dropdown-content').toggleClass('scrolled', $(this).scrollTop()>alto/2);
  });
</script>
@endsection