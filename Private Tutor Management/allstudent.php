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
        <!-- Default panel contents -->
        <div class="panel-heading">All Students</div>
        <div class="panel-body">
            <div>All the students are listed below. Click on the name to view their profile.</div><br/>
            <div style="color: dodgerblue;">Search by name.</div>
            <div><form class="form-search" method="post" action="allstudent.php">
                <input type="text" name="stext" class="input-medium search-query">
                <button type="submit" name="search" class="btn">Search</button>
            </form></div>
        </div>

        <!-- List group -->
        <ul class="list-group">

            <?php
            if(isset($_POST["search"])){
                $search=mysql_query("select firstname, lastname, username from student where firstname like '%$_POST[stext]%'
                            or lastname like '%$_POST[stext]%' order by firstname");
                while($data=mysql_fetch_assoc($search)){
                    echo "<li class='list-group-item'><a style='color: red' href='profile.php?username=" . $data['username'] . "'>"
                        . $data['firstname'] . " " . $data['lastname'] . "</a></li>";
                }
            }
            else {
                $sql = mysql_query("select * from student order by firstname");
                if ($sql === FALSE) {
                    die(mysql_error());
                } else {
                    while ($row = mysql_fetch_assoc($sql)) {
                        echo "<li class='list-group-item'><a href='profile.php?username=" . $row['username'] . "'>"
                            . $row['firstname'] . " " . $row['lastname'] . "</a></li>";
                    }
                }
            }
            ?>
        </ul>
    </div>


    <?php
    pagefooter();
}
?>