<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>We Programmer</title>
    <style>
      #ques{
        min-height:455px;
      }
    </style>
  </head>
  <body>
    <?php include 'syntax/_header.php' ; ?>
    <?php include 'syntax/_dbconnect.php' ; ?>

    <?php 
    $id= $_GET['proid'];
    $sql= "SELECT * FROM `programmer` WHERE programmer_id= $id;";
    $result = mysqli_query($conn , $sql);
    $noResult=true;
    while($row = mysqli_fetch_assoc($result)){
      $noResult=true;
    $proname=$row['programmer_name'];
    $prodecs=$row['programmer_decs'];
    }
    ?>

<?php
 $showAlert =false;
$method =$_SERVER['REQUEST_METHOD'];
IF ($method=='POST'){
  // INSERT INTO THREAD  INTO DATABASE
  $th_title=$_POST['title'];
  $th_decs=$_POST['decs'];

  $sql= "INSERT INTO `threads` ( `thread_title`, `thread_decs`, `thread_pro_id`, `thread_user_id`, `datatime`) VALUES ('$th_title', '$th_decs', '$id', '0', current_timestamp())";
  $result = mysqli_query($conn , $sql);
  $showAlert =true;
if($showAlert){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your Problem Has Been Added !! Please Wair For Someone To Response.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
  
  
  ';
}
}



    ?>
    
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $proname;?> </h1>
            <p class="lead"><?php echo $prodecs;?></p>
            <hr class="my-4">
            <p> We Programmer bring the Project into reality !!</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn More</a>
        </div>
    </div>
<div class="container">
<h1 class ="py-4">Ellaborate Discussion About Your (Problem)</h1>
<form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Problem</label>
              <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">Keep your querry as short as possible</div>
            </div>
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Ellaborate Your Concern</label>
           <textarea class="form-control" id="decs" name="decs" rows="3"></textarea>
           </div>
            <button type="submit" class="btn btn-success">Submit</button>
          </form>

</div>
    <div class="container" id="ques">
        <h1 class ="py-3">Browse Concern (Problem)</h1>
        <?php 
    $id= $_GET['proid'];
    $sql= "SELECT * FROM `threads` WHERE thread_pro_id=$id;";
    $result = mysqli_query($conn , $sql);
    $noResult =true;
    while($row = mysqli_fetch_assoc($result)){
      $noResult =false;
    $id=$row['thread_id'];
    $title=$row['thread_title'];
    $decs=$row['thread_decs'];
    $thread_time =$row['datatime'];
    
    
        echo'<div class="media my-3">
    <img src="img/defaultimg.png" width="60px" class="mr-3" alt="...">
  <div class="media-body">
  <p class="my-0" ><b> Anonymous User at ' . $thread_time .' </b> </p>

    <h5 class="mt-0"> <a href ="thread.php?threadid=' . $id .'">' . $title . ' </a></h5>

    ' . $decs . '
  </div>
</div>';
}

// echo var_dump($noResult);
if($noResult){
  echo'<div class = "jumbotron jumbotron-fluid">
  <div class="container">
  <p class="display-4">No Result Found</p>
  <p class="lead">Be the first person to ask querry</p>
  </div>
  </div>';
}
?>


 <?php include 'syntax/footer.php' ; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>  
</body>
</html>