<?php
session_start();
require_once("style.php");
if($_SESSION["uname"]==""){
    header('location: index.php');
}
else {
    pageheader("All Teachers", $_SESSION["name"], "", "", "",$_SESSION["status"]);

    ?>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">All Teacher</div>
        <div class="panel-body">
            <div>All the teachers are listed below. Click on the delete button to delete a teacher.</div><br/>
            <div style="color: dodgerblue;">Search by name.</div>
            <div><form class="form-search" method="post" action="deleteteacher.php">
                    <input type="text" name="stext" class="input-medium search-query">
                    <button type="submit" name="search" class="btn">Search</button>
                </form></div>
        </div>

        <!-- List group -->
        <div class="table-responsive">
            <table class="table" align="left">
                <?php
                if(isset($_POST["search"])){
                    if(isset($_POST["deletestd"])){
                        $d=$_POST["key"];
                        $deletestd=mysql_query("delete from tutor where username='$d'");
                        $deletelogin=mysql_query("delete from login where username='$d'");
                    }
                    $search=mysql_query("select firstname, lastname, username from tutor where firstname like '%$_POST[stext]%'
                                or lastname like '%$_POST[stext]%' order by firstname");
                    while($data=mysql_fetch_assoc($search)){
                        $id=$data["username"];
                        echo "<form action='deleteteacher.php' method='post'>";
                        echo "<tr><td><a href='profile.php?username=" . $data['username'] . "'>"
                            . $data['firstname'] . " " . $data['lastname'] . "</a></td><td><input type='submit'
                                 class='btn-sm bg-primary' name='deletestd' value='Delete'/><input type='hidden' name='key' value='$id'></td></tr>";
                        echo "</form>";
                    }
                }
                else {
                    if(isset($_POST["deletestd"])){
                        $d=$_POST["key"];
                        $deletestd=mysql_query("delete from tutor where username='$d'");
                        $deletelogin=mysql_query("delete from login where username='$d'");
                    }
                    $sql = mysql_query("select * from tutor order by firstname");
                    if ($sql === FALSE) {
                        die(mysql_error());
                    } else {
                        while ($row = mysql_fetch_assoc($sql)) {
                            $id=$row["username"];
                            echo "<form action='deleteteacher.php' method='post'>";
                            echo "<tr><td><a href='profile.php?username=" . $row['username'] . "'>"
                                . $row['firstname'] . " " . $row['lastname'] . "</a></td><td><input type='submit'
                                 class='btn-sm bg-primary' name='deletestd' value='Delete'/><input type='hidden' name='key' value='$id'></td></tr>";
                            echo "</form>";
                        }
                    }
                }
                ?>
            </table>
        </div>
    </div>


    <?php
    pagefooter();
}
?>