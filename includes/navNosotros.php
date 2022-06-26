
<div class="contenedor_car_nosotros">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/ballet_5.jpg" class="d-block w-100 img_carousel" alt="..." >
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/ballet_10.jpg" class="d-block w-100 img_carousel" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/ballet_4.jpg" class="d-block w-100 img_carousel" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>


<div id="gal"></div>

<!--
<div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-dark p-4">
  <nav   class="navbar navbar-dark bg-dark">
<div class="container-fluid column mt-4 d-flex justify-content-center ">
<ul class="nav menu_nosotros">
  <li class="m-2"><a href="publicaciones.php#gal">Publicaciones</a></li>
  <li  class="m-2"><a href="galeria.php#gal">Fotos</a></li>
  <li  class="m-2"><a href="videos.php#gal">Videos</a></li>
</ul>
</div>
</nav>
  </div>
</div>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav> -->
<div width="100%" style="display:flex; justify-content:center; align-items:center;">
  <div class="nav nav-tabs text-center nav-nosotros" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Publicaciones</button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile_" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Fotos</button>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Videos</button>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-work" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Trabaja con nosotros</button>
 
  </div>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent ">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> <?php include_once("historia.php"); ?></div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><?php include_once("publicaciones.php"); ?></div>
  <div class="tab-pane fade" id="nav-profile_" role="tabpanel" aria-labelledby="nav-profile-tab"><?php include_once("galeria.php"); ?></div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"><?php include_once("videos.php")?>;</div>
  <div class="tab-pane fade" id="nav-work" role="tabpanel" aria-labelledby="nav-contact-tab"><?php include_once("trabajaConNosotros.php")?>;</div>


</div>

<nav>



