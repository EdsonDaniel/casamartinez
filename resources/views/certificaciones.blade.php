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
  <div class="bg-image container-image fade-scroll"style="background-color: black; height: 50vh;">
    <div class="centered" style="top: 50%;">Certificaciones</div>
    <div class="bg-img" style="background-image: url('img/certificaciones.jpg');"></div>
  </div>
  <!--encabezado-->

  <!-- texto -->
  <div class="texto">
    <h3>CERTIFICACIONES</h3>
    <p>Contamos con certificación Orgánica bajo las normas NOP de EEUU y EU. y actualmente somos la primera marca de Mezcal en contar con Certificación Biodinámica.</p>
    <p>Certificados por <a href="https://imocert.bio/" style="color: #212529;">IMOCert</a></p>
  </div>
  <!-- texto -->

  <!--certificacion NOP-->
  <div>
    <h2 class="carousel-title text-center">CERTIFICACIÓN ORGÁNICA (NOP-USDA)</h2>
    <div class="text-and-img">
      <div>
        <p class="texto">Estados Unidos es el primer mercado mundial de Productos Ecológicos y cuenta con sus propias normas de Producción Orgánica creadas por su Ministerio de Agricultura. <a href="https://imocert.bio/?portfolio=national-organic-program-nop-usda" style="text-decoration: underline; color: #212529;" target="_blank"> (USDA-NOP: United States Department of Agriculture - National Organic Program standard).</a>
        </p>
        <p class="texto mb-0">
        La certificación orgánica (NOP-USDA) está basada en dichas normas y es sumamente necesaria para clientes que desean exportar su producción orgánica a Estados Unidos, incluso aunque tengan certificados para otros países.</p>
      </div>
      <div class="div-img">
        <img src="img/nopusda.png" alt="Generic placeholder image">
      </div>
    </div>
  </div>
  <!--certificacion NOP-->

  <hr style="margin-top: 80px; width: 80%;">

  <!--certificacion Biodinamica -->
  <h2 class="carousel-title text-center">CERTIFICACIÓN BIODINÁMICA (DEMETER)</h2>
  <div class="text-and-img">
    <div>
      <p class="texto"><a href="https://imocert.bio/?portfolio=demeter" style="text-decoration: underline; color: #212529;" target="_blank"> Demeter</a> es una marca de certificación cuyo objetivo es identificar los productos agrícolas o ganaderos producidos conforme a los principios de la agricultura biodinámica, siendo un requisito previo indispensable estar certificado conforme al reglamento europeo de agricultura ecológica.
      </p>
      <p class="texto mb-0">
        La biodinámica se basa en crear en cada situación particular un agro-eco-sistema único al cual se le denomina organismo agrícola. Este va tomando la fuerza y salud propia en la medida en que se va convirtiendo en una individualidad agrícola completa. 
      </p>
    </div>
    <div class="div-img">
      <img src="img/demeter.jpg" alt="Generic placeholder image">
    </div>
  </div> 
  <!--certificacion Biodinamica -->

  <hr style="margin-top: 80px; width: 80%;" >

  <!--imocert -->
  <h2 class="carousel-title text-center">ENTIDAD REGULADORA (IMOCERT)</h2>
  <div class="text-and-img">
    <div>
      <p class="texto"><a href="https://imocert.bio/?portfolio=demeter" style="text-decoration: underline; color: #212529;" target="_blank">IMOCERT</a> es una entidad de servicios de inspección y certificación ecológica, para los ámbitos de producción vegetal, de recolección silvestre, producción pecuaria, apicultura, manejo de bosques, artesanía, minería, insumos para la agricultura ecológica entre otros.
      </p>
      <p class="texto">
        Nos sentimos orgullosos de contar con el respaldo de ésta institución pionera en Latinoamérica, quién cuenta con gran experiencia en la inspección y certificación.
      </p>
    </div>
    <div class="div-img">
      <img src="img/imocert.png" alt="Generic placeholder image">
    </div>
  </div> 
  <!--imocert -->

  <hr style="margin-top: 80px; width: 80%;">

  <!-- texto -->
  <div class="texto">
    <h3>PROGRAMAS</h3>
    <p>Contamos con dos programas de responsabilidad:</p>
    <ul>
      <li>AgaVerde: Programa de responsabilidad ambiental.</li>
      <li>Bin Dop (Señor maguey en zapoteco): Programa de responsabilidad social.</li>
    </ul>
  </div>
  <!-- texto -->

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
  });
</script>
@endsection