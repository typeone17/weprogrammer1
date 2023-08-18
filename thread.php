<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
      #ques{
        min-height:455px;
      }
    </style>
    <title>We Programmer</title>
  
  </head>
  <body>
    <?php include 'syntax/_header.php' ; ?>
    <?php include 'syntax/_dbconnect.php' ; ?>
    <?php 
    $id= $_GET['threadid'];
    $sql= "SELECT * FROM `threads` WHERE thread_id=$id";
    $result = mysqli_query($conn , $sql);
    while($row = mysqli_fetch_assoc($result)){
      $title=$row['thread_title'];
      $decs=$row['thread_decs'];
    }
    ?>
    <?php
 $showAlert =false;
$method =$_SERVER['REQUEST_METHOD'];
IF ($method=='POST'){
  // INSERT INTO comment INTO DATABASE
  $comment=$_POST['comment'];
  

  $sql= "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ( '$comment', '$id', '0', current_timestamp());
  ";
  $result = mysqli_query($conn , $sql);
  $showAlert =true;
if($showAlert){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Sucess !</strong> Your Comment Has Been Added !!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
  
  
  ';
}
}



    ?>
    <!-- category start here -->
    <div class="container my-4" >
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title;?> </h1>
            <p class="lead"><?php echo $decs;?></p>
            <hr class="my-4">
            <p> We Programmer bring the Project into reality !!</p>
            <p>Posted by:<b> Prince Kumar Teli Gupta.</b></p>
        </div>
    </div>
    <div class="container">
<h1 class ="py-4">Post Solution </h1>
<form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
            
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Type Your Comment</label>
           <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
           </div>
            <button type="submit" class="btn btn-success">Post Comment</button>
          </form>

</div>
    <div class="container" id="ques">
        <h1 class="py-2">Dicussions</h1>
     <?php
        $id= $_GET['threadid'];
    $sql= "SELECT * FROM `comments` WHERE thread_id=$id;";
    $result = mysqli_query($conn , $sql);
    $noResult =true;
    while($row = mysqli_fetch_assoc($result)){
      $noResult =false;
    $id=$row['thread_id'];
    $content=$row['comment_content'];
    $comment_time =$row['comment_time'];
    
     echo'<div class="media my-3">
    <img src="img/defaultimg.png" width="60px" class="mr-3" alt="...">
  <div class="media-body">
  <p class="font-weight-bold my-0" > Anonymous User at ' . $comment_time .' </p>

  ' . $content . '

  </div>
</div>';
}
if($noResult){
  echo'<div class = "jumbotron jumbotron-fluid">
  <div class="container">
  <p class="display-4">No Result Found</p>
  <p class="lead">Be the first person to ask querry</p>
  </div>
  </div>';
}
   ?> 


  </div>

 <?php include 'syntax/footer.php' ; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>  
</body>
</html>