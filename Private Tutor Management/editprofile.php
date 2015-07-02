<?php
session_start();
require_once("style.php");
if($_SESSION["uname"]==""){
    header('location: index.php');
}
else {
    pageheader("All Students", $_SESSION["name"], "", "", "", $_SESSION["status"]);

    if (isset($_POST["go"])) {
        $institute = mysql_real_escape_string(trim($_POST["institute"]));
        $class = mysql_real_escape_string(trim($_POST["class"]));
        $email = mysql_real_escape_string(trim($_POST["email"]));
        $contact = mysql_real_escape_string(trim($_POST["contact"]));
        $address = mysql_real_escape_string(trim($_POST["address"]));
        $username = mysql_real_escape_string(trim($_SESSION["uname"]));


        if ($institute != "") {
            $q1 = "UPDATE `student` SET `institute`='$institute' WHERE `username`='$username'";
            $rs1 = mysql_query($q1);
            if ($rs1 === FALSE) {
                die(mysql_error());
            } else
                $msg = "Updated successfully";
        }
        if ($class != "") {
            $q2 = "UPDATE `student` SET  `class`='$class' WHERE `username`='$username'";        # code...

            $rs2 = mysql_query($q2);
            if ($rs2 === FALSE) {
                die(mysql_error());
            } else
                $msg = "Updated successfully";
        }
        if ($email != "") {
            $q3 = "UPDATE `student` SET  `email`='$email' WHERE `username`='$username'";        # code...

            $rs3 = mysql_query($q3);
            if ($rs3 === FALSE) {
                die(mysql_error());
            } else
                $msg = "Updated successfully";
        }
        if ($contact != "") {
            $q4 = "UPDATE `student` SET  `contact`='$contact' WHERE `username`='$username'";        # code...

            $rs4 = mysql_query($q4);
            if ($rs4 === FALSE) {
                die(mysql_error());
            } else
                $msg = "Updated successfully";
        }
        if ($address != "") {
            $q5 = "UPDATE `student` SET  `address`='$address' WHERE `username`='$username'";        # code...

            $rs5 = mysql_query($q5);
            if ($rs5 === FALSE) {
                die(mysql_error());
            } else
                $msg = "Updated successfully";
        }
    }
    if (isset($_POST["submit"])) {
        $institute = mysql_real_escape_string(trim($_POST["institute"]));
        $semester = mysql_real_escape_string(trim($_POST["semester"]));
        $email = mysql_real_escape_string(trim($_POST["email"]));
        $contact = mysql_real_escape_string(trim($_POST["contact"]));
        $address = mysql_real_escape_string(trim($_POST["address"]));
        $cgpa = mysql_real_escape_string(trim($_POST["cgpa"]));
        $username = mysql_real_escape_string(trim($_SESSION["uname"]));

        if ($institute != "") {
            $q1 = "UPDATE `tutor` SET `institute`='$institute' WHERE `username`='$username'";
            $rs1 = mysql_query($q1);
            if ($rs1 === FALSE) {
                die(mysql_error());
            } else
                $msg = "Updated successfully";
        }
        if ($semester != "") {
            $q2 = "UPDATE `tutor` SET  `semester`='$semester' WHERE `username`='$username'";        # code...

            $rs2 = mysql_query($q2);
            if ($rs2 === FALSE) {
                die(mysql_error());
            } else
                $msg = "Updated successfully";
        }
        if ($email != "") {
            $q3 = "UPDATE `tutor` SET  `email`='$email' WHERE `username`='$username'";        # code...

            $rs3 = mysql_query($q3);
            if ($rs3 === FALSE) {
                die(mysql_error());
            } else
                $msg = "Updated successfully";
        }
        if ($contact != "") {
            $q4 = "UPDATE `tutor` SET  `contact`='$contact' WHERE `username`='$username'";        # code...

            $rs4 = mysql_query($q4);
            if ($rs4 === FALSE) {
                die(mysql_error());
            } else
                $msg = "Updated successfully";
        }
        if ($cgpa != "") {
            $q5 = "UPDATE `tutor` SET  `cgpa`='$cgpa' WHERE `username`='$username'";        # code...

            $rs5 = mysql_query($q5);
            if ($rs5 === FALSE) {
                die(mysql_error());
            } else
                $msg = "Updated successfully";
        }
        if ($address != "") {
            $q6 = "UPDATE `tutor` SET  `address`='$address' WHERE `username`='$username'";        # code...

            $rs6 = mysql_query($q6);
            if ($rs6 === FALSE) {
                die(mysql_error());
            } else
                $msg = "Updated successfully";
        }
    }
?>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Update Information</div>
            <div class="panel-body">
                <div>Fill the boxes to update your profile</div>
                <div style="color: red; font-weight: bold;"><?=@$msg?></div>
            </div>

            <!-- List group -->
            <?php
                if ($_SESSION["status"]==3) {
            ?>
            <form action="editprofile.php" method="post">
            <div class="table-responsive">
                <table class="table" align="center">
                    <tr>
                        <td align="right"><div>Institute:</div></td>
                        <td align="left"> <input type="text" name="institute" class="form-control" </td>
                        
                    </tr>

                    <tr>
                        <td align="right"><div>Class:</div></td>
                        <td align="left"> <input type="text" name="class" pattern="[0-9]*" class="form-control"</td>
                        
                    </tr>

                    <tr>
                        <td align="right"><div>Email:</div></td>
                        <td align="left"> <input type="email" name="email" class="form-control"  /></td>
                        
                    </tr>

                    <tr>
                        <td align="right"><div>Contact:</div></td>
                        <td align="left"> <input type="text" name="contact" class="form-control" /></td>
                        
                    </tr>

                    <tr>
                        <td align="right"><div>Address:</div></td>
                        <td align="left"> <input type="text" name="address" class="form-control" /></td>
                        
                    </tr>

                    <tr>
                        <td align="right"></td>
                        <td align="left"><input type="submit" class="btn btn-primary" name="go" value="Done"></button></td>
                    </tr>      
                </table>
            </div>
            </form>
            <?php
            }
            if ($_SESSION["status"]<3) {
                # code...
            ?>
            <form action="editprofile.php" method="post">
            <div class="table-responsive">
                <table class="table" align="center">
                    <tr>
                        <td align="right"><div>Institute:</div></td>
                        <td align="left"> <input type="text" name="institute" class="form-control" </td>
                        
                    </tr>


                    <tr>
                        <td align="right"><div>Email:</div></td>
                        <td align="left"> <input type="email" name="email" class="form-control"  /></td>
                        
                    </tr>

                    <tr>
                        <td align="right"><div>Contact:</div></td>
                        <td align="left"> <input type="text" name="contact" class="form-control" /></td>
                        
                    </tr>

                    <tr>
                        <td align="right"><div>Address:</div></td>
                        <td align="left"> <input type="text" name="address" class="form-control" /></td>
                        
                    </tr>


                    <tr>
                        <td align="right"><div>Cgpa:</div></td>
                        <td align="left"> <input type="text" name="cgpa" pattern="(\d{1})([\.])(\d{2})" title="Need a Deciman Point and Two Digit After the Decimal Point" class="form-control" /></td>
                        
                    </tr>

                    <tr>
                        <td align="right"><div>Semester:</div></td>
                        <td align="left"> <input type="text" name="semester" class="form-control" /></td>
                        
                    </tr>

                    <tr>
                        <td align="right"></td>
                        <td align="left"><input type="submit" class="btn btn-primary" name="submit" value="Done"></button></td>
                   
                    </tr>
                </table>
            </div>
            </form>
            <?php
            }
    pagefooter();
}
?>