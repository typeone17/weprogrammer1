<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>We Programmer</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
      #ques{
        min-height:455px;
      }
    </style>
  </head>
  <body>
    <?php include 'syntax/_header.php' ; ?>
    
    <?php include 'syntax/_dbconnect.php' ; ?>
    <!-- slider start here -->
    <div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://source.unsplash.com/1100x700/?comuter,hacking" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/1100x700/?software,hardware" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/1100x700/?database,programming" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="container my-3" id="ques">
  <h2 class="text-center my-3"> Welcome To  We Programmer - Browse Categories</h2>
  
  <div class="row">
    <!-- Fetch all the caterogies and use a loop to iterate through programmer -->
    <?php 
    $sql= "SELECT * FROM `programmer`";
    $result = mysqli_query($conn , $sql);
    while($row = mysqli_fetch_assoc($result)){
// // echo $row ['programmer_id'];
// // echo $row ['programmer_decs'];
$id = $row ['programmer_id'];
$pro = $row ['programmer_name'];
$decs = $row ['programmer_decs'];
echo '<div class="col-md-4 my-2">
      <div class="card" style="width: 18rem;">
        <img src="https://source.unsplash.com/500x400/?' . $pro . ',coding" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><a href="threadlist.php?proid=' . $id . '">' . $pro . '</a></h5>
          <p class="card-text">' . substr($decs, 0, 180) . ' </p>
          <a href="threadlist.php?proid=' . $id . '" class="btn btn-primary">Explore More</a>
        </div>
      </div>
    </div>';
    }
      ?>
    </div>
  </div>
 <?php include 'syntax/footer.php' ; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>  
</body>
</html>