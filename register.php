<?php
$success=false;
$wrong=false;
$exists=false;
include "configs/connections.php";

if (isset($_POST['submit'])) {
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $cpassword=mysqli_real_escape_string($conn,$_POST['cpassword']);
    
    $pass=password_hash($password,PASSWORD_BCRYPT);
    $cpass=password_hash($cpassword,PASSWORD_BCRYPT);

    $emailcount="SELECT * FROM `auth` where `email`='$email'";
    $query=mysqli_query($conn,$emailcount);
    if ($query) {
        // echo "done";
    }else{
        echo "not done";
    }
    $emailcond=mysqli_num_rows($query);
    if ($emailcond>0) {
      $exists=true; 
      ;
    }else{
        if ($password===$cpassword) {
            $insert="INSERT INTO `auth` (`name`, `email`, `password`, `cpassword`) VALUES ('$name', '$email', '$pass', '$cpass')"; 
            $sql=mysqli_query($conn,$insert);
            if ($sql) {
              $success=true;
               
            }  else{
                echo "data not insert".mysqli_error($conn);
            } 
        }else{
          $wrong=true;
          
        }
    }     
    
    }

?>


<?php

include "header.php";

if ($success) {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Congragulation Your Account created successfully!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if ($wrong) {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Wrong!</strong> Email or Password did not matched!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if ($exists) {
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>oops!</strong> Email You Entered Already exists
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
echo '
<div class="container mt-3 reg">
<h1 class="text-center">Register Here</h1>


    <form action="" method="POST">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="text" class="form-control" name="name" id=""  placeholder="Enter username">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="password" id="" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Confirm Password</label>
          <input type="password" class="form-control" name="cpassword" id="" placeholder="Password">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
        <strong>Already have an account<a href="login.php"> Login Here</a></strong> 
      </form>
</div>

';



include "footer.php";

?>