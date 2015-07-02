<?php
session_start();
require_once("style.php");
if($_SESSION["uname"]==""){
    header('location: index.php');
}
else {
pageheader("All Students", $_SESSION["name"], "", "", "",$_SESSION["status"]);

?>
          <div class="row">
              <div class="col-md-3">
                  <div id="carousel-example-generic" class="carousel slide" data-interval="2000" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                          
                      </ol>

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                  
                           <div class="item active">
                              <img src="carousel/s2.jpg" alt="...">
                              <div class="carousel-caption">
                                  ...
                              </div>
                          </div>

                          <div class="item">
                              <img src="carousel/k1.jpg" alt="...">
                              <div class="carousel-caption">
                                  ...
                              </div>
                          </div>
                          <div class="item">
                              <img src="carousel/n1.jpg" alt="...">
                              <div class="carousel-caption">
                                  ...
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-9">
                  <div class="jumbotron">
                      <h3><b>OUR STORY</b></h3>
                      <p>This website is made for all the student and teacher who are currently seeking part time jobs.
                          Our main objective is to connect all the student and home tutors all over bangladesh.</p>
                      <h3><b>DEVELOPED BY</b></h3>
                      <p>Islam Md Shadmanul</p>
                      <p>Saha Koushik Kumar</p>
                      <p>Roy Nirbachita</p>
    
                  </div>
              </div>
          </div>
      </div>


    <?php
    pagefooter();
}
?>