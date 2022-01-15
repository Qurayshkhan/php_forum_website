<?php
$pnot=false;
$imgExt=false;
include "configs/connections.php";

include "header.php";

?>

<?php
if ($imgExt) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry!</strong> Image Extention Did not Match!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
if ($pnot) {
    echo '<div class="alert alert-Danger alert-dismissible fade show" role="alert">
    <strong>Sorry!</strong> Password Did not match!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}



if (isset($_POST['submit'])) {
    $title=$_POST['title'];
    $desc=$_POST['desc'];
    $file=$_FILES['image'];
    $filename=$file['name'];
    $fileerror=$file['error'];
    $filetemp=$file['tmp_name'];
    $fileex=explode(".",$filename);
    $fileCheck=strtolower(end($fileex));
    $fileexstored=array("jpg","jpeg","png");
    if(in_array($fileCheck,$fileexstored)){
        $filedestination='upload/'.$filename;
        move_uploaded_file($filetemp,$filedestination);

$insert="INSERT INTO `categories` (`cat_name`, `cat_description`,`image`) VALUES ( '$title', '$desc', '$filedestination')";
$query2=mysqli_query($conn,$insert);
if ($query2) {
  
    $insert2=true;
   

}else{
    ?>
    <script>
        alert("Data Not inserted")
    </script>
    <?php
}

    }else{
       $imgExt=true;
       }

}else{
   $pnot=true;
}



?>
<div class="container col-sm-8">

<h1>Category</h1>

<form action="category.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" name="title" id="" placeholder="Title">
  </div>
  
  <div class="form-group">
    <label for="">Description</label>
    <textarea class="form-control" name="desc" id="" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="">Image</label>
<input type="file" name="image" class="form-control">
  </div>
  <div class="form-group">
    
<button type="submit" name="submit" class="btn btn-success btn-lg">create</button>
  </div>
</form>


</div>



<?php

include "footer.php";

?>