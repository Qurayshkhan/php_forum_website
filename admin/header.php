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
    <link rel="stylesheet" href="../public/style.css">
    <title>Home</title>
  
</head>

<body style="background-color: #e9ecef;">
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-lg">

    
       
       
           <a class="navbar-brand" href="admin.php">LiveForum</a>'
  
         
    

       
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            
               
            
              <li class="nav-item active">
                <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
            </li>
            
               
           
               
               
            </ul>
            <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
                <input  type="search" class="form-control mr-sm-2" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-info my-2 my-sm-0 " type="submit">Search</button>

            </form>
                <ul class="navbar-nav mr-5">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                </li>
                </ul>

        </div>
    </nav>
    <nav>

    
    <div class="container-fluid">
    <div class="row">
        <nav class="col-sm-2 bg-light sidebar py-5">
<div>
    <ul class="nav flex-coloum">
        <li class="nav-item">
            <a href="category.php" class="text-dark"><b>Add Category</b></a>
        </li>
    </ul>
</div>
        </nav>
    </div>
    </div>

     