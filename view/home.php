<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
      aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
      aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
      aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../img/car/car1.jpg" class="d-block w-100 " style="width: 1400px; height: 450px; margin: auto;"
        alt="...">
    </div>
    <div class="carousel-item">
      <img src="../img/car/car2.jpg" class="d-block w-100 " style="width: 1400px; height: 450px; margin: auto;"
        alt="...">
    </div>
    <div class="carousel-item">
      <img src="../img/car/car3.jpg" class="d-block w-100 " style="width: 1400px; height: 450px; margin: auto;"
        alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden ">Next</span>
  </button>
</div>
<!-- end carousel -->

<div class="text-bg-dark p-0 " style="text-align: center; margin-top: 10px; ">
  <h1>
    Category
  </h1>
</div>

<div class="row row-cols-1 row-cols-md-3 g-4 m-1">
  <?php

  foreach ($dsdm as $dm) {
    echo '
    <div class="col">
      <div class="card h-100">

        <a href="index.php?act=product&id=' . $dm['id'] . '"><img src="../uploaded/dm/' . $dm['img'] . '" class="card-img-top w-100" style="height: 300px;" alt="..."></a>
        <div class="card-body">
          <h5 class="card-title">' . $dm['tendm'] . '</h5>
          </div>
        </div>
     </div>
    ';
  }
  ?>

</div>
<!--end categry  -->

