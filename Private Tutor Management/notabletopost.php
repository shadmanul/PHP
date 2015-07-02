<?php
session_start();
require_once("style.php");
if($_SESSION["uname"]==""){
    header('location: index.php');
}
else {
pageheader("All Students", $_SESSION["name"], "", "", "",$_SESSION["status"]);

?>
    <div class="panel panel-default">
        <div class="panel-heading">Not Accessible</div>
        <div class="panel-body">Teacher are not able to post job here. Please <a href="home.php">click here</a> to go
            to home page</div>
    </div>
    <?php
    pagefooter();
}
?>