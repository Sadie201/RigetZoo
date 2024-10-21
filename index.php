<?php
//Contains the nav-bar and external links. 
require_once "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riget Zoo Advenutres</title>
</head>

<body>

    <h1><u>Welcome to Riget Zoo Adventures!</u></h1>

    <p>Riget Zoo Adventures is a safari-style wildlife zoo which aims to allow all ages to have a good experience at our zoo! We offer a way for families and schools to educate children about the animals we hold. Wamt to experience everything our zoo have? Why not book at our on-site hotel!</p>


     <!--Carousel starts-->
     <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/elephants.jpg" class="d-block w-60" alt="Elephants">
      <div class="carousel-caption d-md-block">
        <h5>Elephants exhibit</h5>
        <p>At our zoo we have elephants which you will be able to see in the elephant exhibit.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/giraffe.jpg" class="d-block w-60" alt="Giraffe">
      <div class="carousel-caption d-md-block">
        <h5>Giraffes Valley</h5>
        <p>At our zoo we have giraffes which you can watch as their tall necks reach for food. They are located in the giraffe valley.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/lions.jpg" class="d-block w-60" alt="Lions">
      <div class="carousel-caption d-md-block">
        <h5>Lions sanctuary</h5>
        <p>These lions are roaring to go! You can see these big cats in the sanctuary or you could go on our safari ride and be able to see their glory up close.</p>
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
<!---Carousel ends-->
<br><br>
</body>
</html>