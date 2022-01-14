<?php
include "configs/connections.php";
?>
    <?php

include "header.php";

?>

        <div class="container my-3 search">
            <h1>Search Result for <em>"
    <?php

echo $_GET['search'];
  
    ?>
"</em></h1>
            <?php
$qury=$_GET['search'];
$search="SELECT * FROM `threads` WHERE MATCH(thread_title, thread_description) AGAINST ('$qury')";
$result=mysqli_query($conn,$search);

if (!$result) {
    echo "error".mysqli_error($conn);
}
$norsult=true;
while($row=mysqli_fetch_assoc($result)){
    $title=$row['thread_title'];
    $desc=$row['thread_description'];
    $url="threadslist.php?id=".$row['id'];
    $norsult=false;
    echo '

    <div class="jumbotron">
<h3><a href="'.$url.'">'.$title.'</a></h3>
<p>'.$desc.'</p>

</div>
';
}

?>

                <?php

if ($norsult) {
    echo '<div class="jumbotron jumbotron-fluid">
    <div class="container searchresult">
      <h1 class="display-4">No Search Result Found</h1>
      <p class="lead">Be The first person to ask a question</p>
    </div>
  </div>';
}

?>




                    <?php
include "footer.php";

?>