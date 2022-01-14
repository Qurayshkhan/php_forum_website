<?php
session_start();

include "configs/connections.php";
include "header.php";

?>

<?php

$id=$_GET['id'];
$thread="SELECT * FROM `categories` WHERE `id`='$id'";
$sql=mysqli_query($conn,$thread);
$noresult=true;
while($row=mysqli_fetch_assoc($sql)){
$noresult=false;
    $catname=$row['cat_name'];
    $catdesc=$row['cat_description'];
echo '<div class="container mt-3">
<div class="jumbotron">
  <h1 class="display-4">Welcome to '.$catname.' Forum</h1>
  <p class="lead">'.$catdesc.'</p>

</div>
</div>';
}
?>


<div class="container">
  
<?php
if (isset($_SESSION['name'])) {
  echo'
  <div class="jumbotron">
  <h4>Welcome '.$_SESSION['name'].' Start Your Discussions</h4>
  </div>';

}else{
 echo' 
 
 <div class="jumbotron">
 <hr class="my-4">
  <strong><p>You Need To Register First To Start a discussion</p></strong>
 <p class="lead">
   <a class="btn btn-success btn-lg" href="register.php" role="button">Register</a>
 </p>
 </div>
 ';
}
$showalert=false;
$method=$_SERVER['REQUEST_METHOD'];
if ($method=='POST') {
  $id=$_POST['id'];
  $userid=$_POST['userid'];
  
  $th_title=mysqli_real_escape_string($conn,$_POST['title']);
  $th_desc=mysqli_real_escape_string($conn, $_POST['desc']);
  $th_title=str_replace("<","&lt;",$th_title);
  $th_title=str_replace(">","&gt;",$th_title);
  $th_desc=str_replace("<","&lt;",$th_desc);
  $th_desc=str_replace(">","&gt;",$th_desc);

  $sql="INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_catid`, `thread_userid`) VALUES ('$th_title', '$th_desc', '$id', '$userid')";
  $result=mysqli_query($conn,$sql);
    if ($result) {
      $showalert=true;
      if ($showalert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong>Post submitt successfully!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
    }
}
?>
<?php
$id=$_GET['id'];
$uri=$_SERVER['REQUEST_URI'];
if (isset($_SESSION['name'])) {
  echo '
  <form action="'.$uri.'"  method="POST">
    <div class="form-group">
      <label for="exampleFormControlInput1">Problem Title</label>
      <input type="text" class="form-control" name="title" id="" placeholder="Enter Problem Title">
    </div>
    <small>Keep your title short and crisp as possible</small>
    <div class="form-group">
      <label for="">Ellaborate Your Concern</label>
      <textarea class="form-control" id="" name="desc" rows="3"></textarea>
    </div>
    <input type="hidden" name="id" value="'.$id.'">
    <input type="hidden" name="userid" value="'.$_SESSION['id'].'">
    
    <button type="submit" class="btn btn-success btn-lg" name="submit">Post</button>
  </form>
  <hr>
  </div>
  
  ';
}

?>

<div class="container">
    <h1>Browsing Question</h1>
    <hr>
   <?php
   $id=$_GET['id'];
   $thread="SELECT * FROM `threads` WHERE thread_catid='$id'";
   $sql=mysqli_query($conn,$thread);
   $noresult=true;
   while($row=mysqli_fetch_assoc($sql)){
    $noresult=false;
     $threadid=$row['id'];
       $threadtitle=$row['thread_title'];
       $threaddes=$row['thread_description'];
       $threaduserid=$row['thread_userid'];
      $username="SELECT * FROM `auth` WHERE `id`=$threaduserid";
      $fetchname=mysqli_query($conn,$username);
      $name=mysqli_fetch_assoc($fetchname);

       echo '<div class="media my-3">
     
       <img class="mr-3" src="images/user.png" alt="Generic placeholder image" height="70px">
     
       <div class="media-body">
       <p>Ask by "<b>'.$name['name'].'"</b></p>
         <h5 class="mt-0"><a href="threads.php?id='.$threadid.'">'.$threadtitle.'</a></h5>
        <p>'.$threaddes.'</p>
       </div>
     </div>';
    }
    if ($noresult) {
      echo '<div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">No Result Found</h1>
        <p class="lead">Be The first person to ask a question</p>
      </div>
    </div>';
    }
   
   ?>
</div>




<?php

include "footer.php";
?>