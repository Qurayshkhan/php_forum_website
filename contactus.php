<?php

include "configs/connections.php";
include "header.php";

?>


?>

<section class="main_heading my-5 pt-5">
        <div class="text-center">
            <h1 class="display-4">Contact us</h1>
            <hr class="w-25 mx-auto">
        </div>

    <?php
    
    if (isset($_POST['submit'])) {
        $name=$_POST['fname'];
        $email=$_POST['email'];
        $gender=$_POST['gender'];
        $country=$_POST['country'];
        $comment=$_POST['comment'];
        $insert="INSERT INTO `contactus` (`fname`, `email`, `gender`, `country`, `comment`) VALUES ('$name', '$email', '$gender', '$country', '$comment')";
        $sql=mysqli_query($conn,$insert);
        if ($sql) {
             echo '
             <div class="container">
             <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! </strong> Your Request Submit we will contact you soon..!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          </div>
          ';
        }else{
            echo 'error'.mysqli_error($conn);
            // ?>
            // <script>
            //     alert('Form not submit');
            // </script>
            // <?php
        }
    }
    
    ?>   
        <form action="contactus.php" method="POST">
            <div class="conatier">
                <div class="row">
                    <div class="col-xxl-8 col col-10 col-md-8 mx-auto">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="" name="fname" placeholder="Enter Your Full Name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleDataList" class="form-label">Select Countery</label>
                            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search..." name="country">
                            <datalist id="datalistOptions">
                          <option value="San Francisco"></option>>
                          <option value="Pakistan"></option>>
                          <option value="India"></option>>
                          <option value="Seattle"></option>>
                          <option value="Los Angeles"></option>>
                          <option value="Chicago"></option>>
                        </datalist>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Upload File</label>
                            <input class="form-control" type="file" id="formFileMultiple" multiple>
                        </div> -->
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Comments</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3"></textarea>
                        </div>
                        <!-- <div class="col-12 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                Check me out
                              </label>
                            </div>
                        </div> -->
                        <div class="col-12 mb-3">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>



<?php  include "footer.php" ?>