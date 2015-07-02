<?php
session_start();
require_once("style.php");
if($_SESSION["uname"]==""){
    header('location: index.php');
}
else {
    pageheader("Post Jobs", $_SESSION["name"], "", "", "active",$_SESSION["status"]);

    if (isset($_POST["postjob"])) {
        $jobtile = $_POST["jobtitle"];
        $requirements = mysql_real_escape_string($_POST["requirements"]);
        $workingdays = $_POST["workingdays"];
        $salary = $_POST["salary"];
        $uname = $_SESSION["uname"];
        if($_SESSION["status"]==3) {
            $q = mysql_query("SELECT email,contact,address FROM `student` WHERE username='$uname'");
            $d = mysql_fetch_assoc($q);
            $email = $d["email"];
            $contact = $d["contact"];
            $address = $d["address"];
        }
        else{
            $q = mysql_query("SELECT email,contact,address FROM `tutor` WHERE username='$uname'");
            $d = mysql_fetch_assoc($q);
            $email = $d["email"];
            $contact = $d["contact"];
            $address = $d["address"];
        }


        $query = mysql_query("INSERT INTO `jobs`(`job_id`, `username`, `jobtitle`, `requirements`, `workingdays`,
                                 `salary`, `contact`, `email`, `address`) VALUES (NULL ,'$uname',
                                 '$jobtile','$requirements','$workingdays','$salary','$contact','$email','$address')");
        if ($query == FALSE) {
            die(mysql_error());
        }
        else if ($query)
            $suc = "Your advertise has been successfully posted";

    }
    ?>


    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Post a Job Advertisement</div>
        <div class="panel-body">
            <div>You can post a job from here. You have to fill all the boxes to post a job.</div>
            <div style="color: red; font-weight: bold;"><?=@$suc?></div>
        </div>
        <form action="postjobs.php" method="post">
            <!-- List group -->
            <div class="table-responsive">
                <table class="table" align="center">
                    <tr>
                        <td align="right"><label>Job Title</label></td>
                        <td align="left"><input type="text" class="form-control" name="jobtitle" required/></td>
                    </tr>
                    <tr>
                        <td align="right"><label>Requirements</label></td>
                        <td align="left"><textarea style="height:300px;" class="form-control" name="requirements"
                                                   required></textarea></td>
                    </tr>
                    <tr>
                        <td align="right"><label>Working Days</label></td>
                        <td align="left"><input type="text" class="form-control" name="workingdays" required/></td>
                    </tr>
                    <tr>
                        <td align="right"><label>Salary</label></td>
                        <td align="left"><input type="text" pattern="[0-9]*" class="form-control" name="salary"
                                                required/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="left"><input type="submit" class="btn bg-primary" name="postjob" required/></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>


    <?php
    pagefooter();
}
?>