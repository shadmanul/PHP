<?php
function pageheader($title,$name,$active1,$active2,$active3,$status){
    require_once("db.php");
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?=@$title?></title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet"/>

    </head>
    <body >
        <div class="container">
        <div class="page-header">
            <h1>TUTOR EYE <h4>Connecting Sudents with Home Tutors</h4></h1>
        </div>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="" href="home.php"><img src="img/logo.png" style="height: 60px; width: 60px;
                                                                margin-right: 20px;"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="<?=@$active1?>"><a href="home.php">HOME <span class="sr-only">(current)</span></a></li>
                        <li class="<?=@$active2?>"><a href="availablejobs.php">AVAILABLE JOBS</a></li>
                        <?php
                        if($status != 2) {
                            ?>
                            <li class="<?= @$active3 ?>"><a href="postjobs.php">POST JOBS</a></li>
                        <?php
                        }
                        else{
                        ?>
                            <li class="<?= @$active3 ?>"><a href="notabletopost.php">POST JOBS</a></li>
                        <?php
                        }
                        ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">MEMBERS <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="allteacher.php">Teacher</a></li>
                                <li><a href="allstudent.php">Student</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?=@$name?><span class="caret"></span></a>
                            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                <li><a href="profile.php">Profile</a></li>
                                <li><a href="editprofile.php">Edit Profile</a></li>

                                <?php
                                if($status != 2) {
                                    ?>
                                    <li class="divider"></li>
                                    <li><a href="deletejobs.php">Delete Jobs</a></li>
                                <?php
                                }
                                if($status==1) {
                                    ?>
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="#">Delete Members</a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="deletestudent.php">Delete Student</a></li>
                                            <li><a href="deleteteacher.php">Delete Teacher</a></li>
                                        </ul>
                                    </li>
                                <?php
                                }
                                ?>
                                <li class="divider"></li>
                                <li><a href="aboutus.php">About Us</a></li>
                                <li><a href="logout.php">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

    <?php
}
function pagefooter(){
    ?>
    </div> <!--Container ending div-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    </body>
    </html>
<?php
}
?>