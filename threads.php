<?php
session_start();

include "configs/connections.php";
include "header.php";
?>

<?php

$id=$_GET['id'];
$thread="SELECT * FROM `threads` WHERE `id`='$id'";
$sql=mysqli_query($conn,$thread);
while($row=mysqli_fetch_assoc($sql)){
    $title=$row['thread_title'];
    $desc=$row['thread_description'];
    $usernameid=$row['thread_userid'];


    $username="SELECT * FROM `auth` WHERE `id`='$usernameid'";
    $exe=mysqli_query($conn,$username);
    $postuser=mysqli_fetch_assoc($exe);
    $username=$postuser['name'];

}
?>
<div class="container mt-3">
<div class="jumbotron">
  <h1 class="display-4"><?php echo $title;?></h1>
  <p class="lead"><?php echo $desc;?> </p>
  <hr class="my-4">
  <p>Posted By: "<strong><?php
  if (!isset($_SESSION['name'])) {
    echo $username;
  }else{
    echo $username;
  }
  
  
  ?>"</strong></p>
 
</div>
</div>


<div class="container">
<?php
$showalert=false;
$method=$_SERVER['REQUEST_METHOD'];
if ($method=='POST') {
  $comment=mysqli_real_escape_string($conn, $_POST['comment']);
  $comment=str_replace("<","&lt;",$comment);
  $comment=str_replace(">","&gt;",$comment);
$userid=$_POST['id'];
  $sql="INSERT INTO `comments` (`comment_content`, `thread_id`, `user_id`) VALUES ('$comment', '$id', '$userid')";
  $result=mysqli_query($conn,$sql);
    if ($result) {
      $showalert=true;
      if ($showalert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your comment has been added successfully!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
    }
}

if (!isset($_SESSION['name'])) {
  
}else{
  echo ' <h1 class="py-2">Post a Comment</h1>
  <form action="'.$_SERVER["REQUEST_URI"].'" method="POST">
   
    <div class="form-group">
      <label for="">Type a Comment</label>
      <textarea class="form-control" id="" name="comment" rows="3"></textarea>
      <input type="hidden" name="id" value="'.$_SESSION['id'].'">
    </div>
    <button type="submit" class="btn btn-success btn-lg" name="submit">Post</button>
  </form>
  <hr>
  </div>';
}


?>

 



<div class="container">
    <h1>Discussions</h1>
    <hr>
 <?php
   $id=$_GET['id'];
   $thread="SELECT * FROM `comments` WHERE thread_id='$id'";
   $sql=mysqli_query($conn,$thread);
   $noresult=true;
   while($row=mysqli_fetch_assoc($sql)){
       $noresult=false;
     $commentid=$row['id'];
       $content=$row['comment_content'];
       $comment_time=$row['comment_time'];
       $comment_user_id=$row['user_id'];
       $name="SELECT * FROM `auth` WHERE `id`='$comment_user_id'";
       $query=mysqli_query($conn,$name);
       $result=mysqli_fetch_assoc($query);
        $user=$result['name'];
        echo '      
        <div class="media my-3">
       
        <img class="mr-3" src="images/user.png" alt="Generic placeholder image" height="70px">
        <div class="media-body">
       <strong> <p>
 
          '.$user.' '.$comment_time=date("Y-m-d h:i:s").' </p></strong>
         <p>'.$content.'</p>
     
       
       
      
        </div>
      </div>';
    }

    ?>


     <?php
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