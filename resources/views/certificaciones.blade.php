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
    <p>El respeto a la tierra es lo que le enseñamos a nuestros hijos. Nuestro producto Origen Verde es la única marca en el mercado completamente ecológica.</p>
    <p>Somos la única familia Mezcalera en contar con certificación <b>ORGÁNICA</b> y <b>BIODINÁMICA</b>.</p>
    <p>Certificación Orgánica bajo las normas NOP de EEUU y EU y la NOM Mexicana.</p>
    <p>Actualmente somos la primera marca de Mezcal en contar con Certificación Biodinámica. En la agricultura biodinámica se pretende respetar ciertos principios para asegurar la salud de la tierra y de las plantas, y para procurar una nutrición sana para los animales y el ser humano.</p>
    <p>Certificados por <a href="https://imocert.bio/" style="color: #212529; text-decoration: underline;">IMOCert</a></p>
  </div>
  <!-- texto -->

  <!--certificacion NOP-->
  <div>
    <h2 class="carousel-title text-center">CERTIFICACIÓN ORGÁNICA (NOP-USDA)</h2>
    <div class="text-and-img">
      <div class="div-texto">
        <p class="body-carousel" style="color: #4a4a4a;">Estados Unidos es el primer mercado mundial de Productos Ecológicos y cuenta con sus propias normas de Producción Orgánica creadas por su Ministerio de Agricultura. <a href="https://imocert.bio/?portfolio=national-organic-program-nop-usda" style="text-decoration: underline; color: #212529;" target="_blank"> (USDA-NOP: United States Department of Agriculture - National Organic Program standard).</a>
        </p>
        <p class="body-carousel mb-0" style="color: #4a4a4a;">
        La certificación orgánica (NOP-USDA) está basada en dichas normas y es sumamente necesaria para clientes que desean exportar su producción orgánica a Estados Unidos, incluso aunque tengan certificados para otros países.</p>
      </div>
      <div>
        <img src="/img/usda-organic.png" class="logos" alt="Generic placeholder image">
      </div>
    </div>
  </div>
  <!--certificacion NOP-->

 <hr style="margin: 80px auto; width: 80%;" >

  <!--certificacion Biodinamica -->
  <h2 class="carousel-title text-center">CERTIFICACIÓN BIODINÁMICA (DEMETER)</h2>
  <div class="text-and-img">
    <div class="div-texto">
      <p class="body-carousel" style="color: #4a4a4a;"><a href="https://imocert.bio/?portfolio=demeter" style="text-decoration: underline; color: #212529;" target="_blank"> Demeter</a> es una marca de certificación cuyo objetivo es identificar los productos agrícolas o ganaderos producidos conforme a los principios de la agricultura biodinámica, siendo un requisito previo indispensable estar certificado conforme al reglamento europeo de agricultura ecológica.
      </p>
      <p class="body-carousel mb-0" style="color: #4a4a4a;">
        La biodinámica se basa en crear en cada situación particular un agro-eco-sistema único al cual se le denomina organismo agrícola. Este va tomando la fuerza y salud propia en la medida en que se va convirtiendo en una individualidad agrícola completa. 
      </p>
    </div>
    <div>
      <img src="/img/logo-demeter.png" class="logos" alt="Generic placeholder image">
    </div>
  </div> 
  <!--certificacion Biodinamica -->

  <hr style="margin: 80px auto; width: 80%;" >

  <!--imocert -->
  <h2 class="carousel-title text-center">ENTIDAD REGULADORA (IMOCERT)</h2>
  <div class="text-and-img">
    <div class="div-texto">
      <p class="body-carousel" style="color: #4a4a4a;"><a href="https://imocert.bio/?portfolio=demeter" style="text-decoration: underline; color: #212529;" target="_blank">IMOCERT</a> es una entidad de servicios de inspección y certificación ecológica, para los ámbitos de producción vegetal, de recolección silvestre, producción pecuaria, apicultura, manejo de bosques, artesanía, minería, insumos para la agricultura ecológica entre otros.
      </p>
      <p class="body-carousel" style="color: #4a4a4a;">
        Nos sentimos orgullosos de contar con el respaldo de ésta institución pionera en Latinoamérica, quién cuenta con gran experiencia en la inspección y certificación.
      </p>
    </div>
    <div>
      <img class="logos" src="/img/imocert-logo.png" alt="Generic placeholder image">
    </div>
  </div> 
  <!--imocert -->

 <hr style="margin: 80px auto; width: 80%;" >

  <!-- texto -->
  <div class="texto">
    <h3>PROGRAMAS</h3>
    <p>Contamos con dos programas de responsabilidad:</p>
    <ul>
      <li><strong>AgaVerde:</strong> Programa de responsabilidad ambiental. 
        <br> Basado en el cultivo sustentables y la aplicación de los principios orgánicos y biodinámicas en nuestro cultivo y producción.
      </li>
      <li><strong>Bin Dop:</strong>(Señor maguey en zapoteco): Programa de responsabilidad social. 
        <br>Programa en donde buscamos el respeto a nuestra gente, nuestra cultura, nuestra lengua y con el Señor Maguey.
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
  });
</script>
@endsection