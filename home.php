<?php
session_start();
if (!isset($_SESSION['name'])) {
    header('location:login.php');
}

include "header.php";

echo '


<div id="carouselExampleIndicators" class="carousel slide custom-carousel" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/flask.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/laravel.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/python.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>';
?>

<div class="container mt-3">
    <h1 class="text-center">Categories form Listining Threads</h1>
<div class="row">
<?php

$cat="SELECT * FROM `categories`";
$sql=mysqli_query($conn,$cat);
while($res=mysqli_fetch_assoc($sql)){
    $catid=$res['id'];
    $catname=$res['cat_name'];
    $catdes=$res['cat_description'];
    echo '
    <div class="card mx-4 my-4" style="width: 18rem;">
    <img class="card-img-top" src="https://source.unsplash.com/400x300/?'.$catname.'" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title"><a href="threadslist.php?id='.$catid.'"> '.$catname.'</a></h5>
        <p class="card-text">'.substr($catdes,0,80) .'......</p>
        <a href="threadslist.php?id='.$catid.'" class="btn btn-primary">View Threads</a>
    </div>
</div>
    ';
}

?>
  

    </div>
    </div>

    ';
    
  <?php

  include "footer.php";
  
  ?>