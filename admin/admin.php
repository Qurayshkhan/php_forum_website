<?php
session_start();
include "configs/connections.php";

include "header.php";

?>

<div class="jumbotron">
<div class="container">
<h1 class="display-4">Welcome  <?php echo $_SESSION['name'] ?> </h1>
</div>


</div>

<?php
include "footer.php";

?>







