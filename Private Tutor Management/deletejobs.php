<?php
session_start();
require_once("style.php");
if($_SESSION["uname"]==""){
    header('location: index.php');
}
else {
    pageheader("Delete Jobs", $_SESSION["name"], "", "", "",$_SESSION["status"]);
    if($_SESSION["status"]==3){
        jobs("select * from jobs where username='$_SESSION[uname]' order by job_id desc");
    }
    else if($_SESSION["status"]==1){
        jobs("select * from jobs order by job_id desc");
    }
    else{
        header('location: home.php');
    }

    pagefooter();
}
?>
<?php
function jobs($query){
    if(isset($_POST["deleteall"])){
        $all=mysql_query("delete from jobs where username='$_SESSION[uname]'");
        header('location: deletejobs.php');
    }
    ?>

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">All the available jobs you Posted.</div>
        <div class="panel-body">
            <div>Click on the delete button to deleted a job.</div><br/>
            <form method="post" action="deletejobs.php">
                <input type="submit" class="btn-lg bg-primary" value="Delete All Jobs" name="deleteall">
            </form>
        </div>

        <!-- List group -->
        <ul class="list-group">

            <?php
            if(isset($_POST["deletejob"])){
                $d=$_POST["key"];
                $delete=mysql_query("delete from jobs where job_id='$d'");
            }
            $q = mysql_query($query);
            if ($q === FALSE) {
                die(mysql_error());
            }
            else {
                while ($row = mysql_fetch_assoc($q)) {
                    $id=$row["job_id"];
                    ?>
                    <li class="list-group-item">
                        <form action="deletejobs.php" method="post">
                            <table>
                                <tr>
                                    <td><h3><?=@$row["jobtitle"]?></h3></td>
                                </tr>
                                <tr>
                                    <td><div>Posted by: <a href="profile.php?username="<?=@$row['username']?>>
                                                <?=@$row["username"]?></a></div></td>
                                </tr>
                                <tr>
                                    <td><div><?=@$row["requirements"]?></div></td>
                                </tr>
                                <tr>
                                    <td><div>Working Days: <?=@$row["workingdays"]?></div></td>
                                </tr>
                                <tr>
                                    <td><div>Salary: <?=@$row["salary"]?></div></td>
                                </tr>
                                <tr>
                                    <td><div>Contact no: <?=@$row["contact"]?></div></td>
                                </tr>
                                <tr>
                                    <td><div>Address: <?=@$row["address"]?></div></td>
                                </tr>
                                <tr>
                                    <td>
                                        <br/>
                                        <input type="hidden" name="key" value="<?=@$id?>">
                                        <input type="submit" name="deletejob" value="Delete" class="btn-sm bg-primary" />

                                    </td>
                                </tr>
                            </table>
                        </form>
                    </li>
                <?php
                }
            }
            ?>
        </ul>
    </div>
<?php
}
?>
