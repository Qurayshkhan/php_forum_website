<?php

include "configs/connections.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="public/style.css">
    <title>Home</title>
  
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-lg">

       <?php
       
       if (!isset($_SESSION['name'])) {
           echo '<a class="navbar-brand" href="index.php">LiveForum</a>';
       }else{
           echo '<a class="navbar-brand" href="home.php">LiveForum</a>';
       }

       ?>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <?php
               
               if (!isset($_SESSION['name'])) {
                   echo ' <li class="nav-item active">
                   <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
               </li>';
               }else{
                echo ' <li class="nav-item active">
                <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>';
               }
               
               ?>
                <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <?php
           
           $sql="SELECT cat_name, id FROM `categories` LIMIT 5";
           $query=mysqli_query($conn,$sql);
          while($cat=mysqli_fetch_assoc($query)){
echo '  <a class="dropdown-item" href="threadslist.php?id='.$cat['id'].'">'.$cat['cat_name'].'</a>';

          } 

           ?>
        </div>
      </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutus.php">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactus.php">Contact us</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
                <input  type="search" class="form-control mr-sm-2" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-info my-2 my-sm-0 " type="submit">Search</button>

            </form>
                <ul class="navbar-nav mr-5">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
           
           if (isset($_SESSION['name'])) {
            echo '
             
            '.$_SESSION["name"].'
            ';
           }else{
            echo 'Registration';
           }
           
           ?>
         
        </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                       <?php
                       
                       if(!isset($_SESSION['name'])){

                        echo '<a class="dropdown-item" href="login.php">Login</a>';
                        echo '<a class="dropdown-item" href="register.php">Register</a>';
                    }else{
                        echo '<a class="dropdown-item" href="logout.php">Logout</a>';
                    }
                       ?>
                  
                      
                       
                    </div>
                </li>
                </ul>

        </div>
    </nav>