<?php
session_start();
require_once("style.php");
if($_SESSION["uname"]==""){
    header('location: index.php');
}
else {
    pageheader("Home", $_SESSION["name"], "active", "", "",$_SESSION["status"]);
    ?>
    <div class="row" >
        <div class="col-md-7 ">
            <div id="carousel-example-generic" class="carousel slide" data-interval="3000" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="carousel/2.jpg" alt="...">

                        <div class="carousel-caption">
                            ...
                        </div>
                    </div>
                    <div class="item">
                        <img src="carousel/3.jpg" alt="...">

                        <div class="carousel-caption">
                            ...
                        </div>
                    </div>
                    <div class="item">
                        <img src="carousel/1.jpg" alt="...">

                        <div class="carousel-caption">
                            ...
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 ">
            <div class="jumbotron">
                <h1>WELCOME</h1>

                <p>This website is made for all the student and teacher who are currently seeking part time jobs.
                    Our main objective is to connect all the students and home tutors all over bangladesh.</p>

                <p><a class="btn btn-primary btn-lg" href="aboutus.php" role="button">Learn more</a></p>
            </div>
        </div>
    </div>






    <?php
    pagefooter();
}
?>