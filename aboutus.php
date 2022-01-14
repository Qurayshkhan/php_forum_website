<?php

include "configs/connections.php";
include "header.php";

?>


<section class="main_heading my-5">

<div class="text-center">
    <h1 class="display-4">About us</h1>
    <hr class="w-25 mx-auto">
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12 col-xxl-6">
            <figure>
                <img src="images/laravel.png" class="img-fluid about_image" alt="">
            </figure>
        </div>
        <div class="col-lg-6 col-md-6 col-12 col-xxl-6 d-flex justify-content-around align-items-start flex-column">
            <h1>Our Journey</h1>
            <p>I'm a full stack developer , having experience in 
web development with and passionate to explore 
updated languages and highly motivated to face 
any challenge</p>
<a href="#scrollspyHeading1">

<button type="button" class="btn btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="right"  title="I am Hassan khan">Check more</button>
</a>
           

        </div>

    </div>
</div>
</section>


<div class="container">
        <div class="row">
            <div id="navbar-example" style="position: relative;">


                <nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
                    <a class="navbar-brand" href="#">Hassan Khan</a>
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link" href="#scrollspyHeading1">TALENTS & SKILLS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#scrollspyHeading2">Programming Languages:
</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#scrollspyHeading3" role="button" aria-expanded="false">Dropdown</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#scrollspyHeading3">CONTACT INFORMATION</a></li>
                                <li><a class="dropdown-item" href="#scrollspyHeading4">ACADEMIC BACKGROUND
</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#scrollspyHeading5">CAREER HISTORY</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0" style="height: 300px;overflow-y:scroll;">
                    <h4 id="scrollspyHeading1">TALENTS & SKILLS</h4>
                    <p>Expert in PHP <br>
OneYearExperince using Laravel Framework  <br>
Understanding of MVC inlaravel <br>
Managing Packaging in Laravel <br>
Basic Laravel Debugging and Composer  <br>
Understanding of service providers <br> 
Understanding of Model Factories <br> 
Middleware Managment <br> 
Understanding ofLocalization <br>
Basic Understanding of Laravel Elixir <br> 
Understanding of Query Builder <br> 
Understanding of API's <br>
Highly knowledgeable of products <br> 
Up to date knowledge of the market  <br>
Excellent communication skills <br>
Expert at building rapport with clients <br></p>
                    <h4 id="scrollspyHeading2">Programming Languages</h4>
                    <p>PHP, LARAVEL (Framework)  <br>
HTML5, CSS <br>
JavaScript ES6 ,Bootstrap  <br>
Especially Tailwind <br>
C++, C, Assembly Language, Java <br>
OOP <br></p>
                    <h4 id="scrollspyHeading3">CONTACT INFORMATION</h4>
                    <p>Address: House #13 St #3 Madni Colony Chand 
Park Bagbanpura LHR <br>
Punjab, Cantt Lahore <br>
Phone: 03484348709 <br>
Email: webdevhassankhan@gmail.com <br>
Website: https://github.com/qurayshkhan</p>
                    <h4 id="scrollspyHeading4">ACADEMIC BACKGROUND</h4>
                    <p><b>Virtual University of Pakistan, Lahore</b>
<b>Bachelor's in Computer Science</b>
Current Semester 5th
Team Leader of Semester Projects
<b>Degree College Shalamar Town
ICS 2018</b>
Vice Captian in a cricket team
<b>Fayyaz Model high school , Shadbagh
Matriculation (Computer Science) 2016</b></p>
                    <h4 id="scrollspyHeading5">CAREER HISTORY</h4>
                    <p><b>Personal Experience</b>
Web Projects <br>
E-Commerce <br>
Forum Website <br>
Restruant Managment System <br> 
Tourism Booking Website <br> 
OnlineResumeCreatorWebsite <br> 
Online Quiz Website <br>
Alkhwarzmi KICS,NAVTCC,UETmaincampus <br>
Web And Application Internship <br>
PHP Laravel Projects during this era
Created Hospital Managment System for UET 
Student Managment System <br>
Services Managment System <br></p>
                </div>

            </div>
        </div>
    </div>



<?php  include "footer.php" ?>