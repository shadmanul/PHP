<?php
session_start();
require_once("style.php");
if($_SESSION["uname"]==""){
    header('location: index.php');
}
else {
    pageheader("Profile", $_SESSION["name"], "", "", "",$_SESSION["status"]);

    ?>

    <?php
    if (isset($_REQUEST['username'])) {
        $uname = $_REQUEST['username'];
        $test = mysql_query("SELECT * FROM `login` WHERE username='$uname'");
        $data = mysql_fetch_assoc($test);
        if ($data["status"] == 3) {
            $q = mysql_query("SELECT * FROM `login`,`student` WHERE login.username=student.username and student.username='$uname' LIMIT 1");
            $d = mysql_fetch_assoc($q);
            $name = $d["firstname"] . " " . $d["lastname"];
            $gender = $d["gender"];
            $institute = $d["institute"];
            $class = $d["class"];
            $email = $d["email"];
            $contact = $d["contact"];
            $address = $d["address"];
            $dateofbirth = $d["dateofbirth"];
            studentHTML($name, $gender, $institute, $class, $email, $contact, $address, $dateofbirth);

        }
        else {
            $q = mysql_query("SELECT * FROM `login`,`tutor` WHERE login.username=tutor.username and tutor.username='$uname' LIMIT 1");
            $d = mysql_fetch_assoc($q);
            $name = $d["firstname"] . " " . $d["lastname"];
            $gender = $d["gender"];
            $email = $d["email"];
            $contact = $d["contact"];
            $address = $d["address"];
            $institute = $d["institute"];
            $semester = $d["semester"];
            $cgpa = $d["cgpa"];
            $sscol = $d["ssc_ol"];
            $ores = $d["ores"];
            $hscal = $d["hsc_al"];
            $ares = $d["ares"];
            $rating = $d["rating"];
            $ratedby = $d["ratedby"];
            $dateofbirth = $d["dateofbirth"];
            teacherHTML($name, $gender, $email, $contact, $address, $institute, $semester, $cgpa, $sscol, $ores, $hscal, $ares, $dateofbirth, $rating, $ratedby);

        }
    } else {
        $uname = $_SESSION["uname"];
        if ($_SESSION["status"] == 3) {
            $q = "select * from student where username='$uname'";
            $rs = mysql_query($q);
            $d = mysql_fetch_assoc($rs);
            $name = $d["firstname"] . " " . $d["lastname"];
            $gender = $d["gender"];
            $institute = $d["institute"];
            $class = $d["class"];
            $email = $d["email"];
            $contact = $d["contact"];
            $address = $d["address"];
            $dateofbirth = $d["dateofbirth"];
            studentHTML($name, $gender, $institute, $class, $email, $contact, $address, $dateofbirth);
        } else {
            $q = "select * from tutor where username='$uname'";
            $rs = mysql_query($q);
            $d = mysql_fetch_assoc($rs);
            $name = $d["firstname"] . " " . $d["lastname"];
            $gender = $d["gender"];
            $email = $d["email"];
            $contact = $d["contact"];
            $address = $d["address"];
            $institute = $d["institute"];
            $semester = $d["semester"];
            $cgpa = $d["cgpa"];
            $sscol = $d["ssc_ol"];
            $ores = $d["ores"];
            $hscal = $d["hsc_al"];
            $ares = $d["ares"];
            $rating = $d["rating"];
            $ratedby = $d["ratedby"];
            $dateofbirth = $d["dateofbirth"];
            teacherHTML($name, $gender, $email, $contact, $address, $institute, $semester, $cgpa, $sscol, $ores, $hscal, $ares, $dateofbirth, $rating, $ratedby);
        }
    }


    pagefooter();
}
function studentHTML($name, $gender, $institute, $class, $email, $contact, $address, $dateofbirth)
{
    echo "
        <html>
        <head>
            <title>Profile</title>
        </head>
        <body>
            <div class='panel panel-default'>
                <div class='panel-heading'>Profile</div>
                    <div class='panel-body'>
                        <div class='row'>
                          <div class='col-xs-6 col-md-3'>
                            <a href='#' class='thumbnail'>
                            <img src='profileimg/test.jpg' alt='...'>
                            </a>
                          </div>
                          <div class='col-xs-6 col-md-9'>
                          <p></p>
                          </div>
                        </div>
                    </div>
                <div class='table-responsive'>
                    <table align='center' class='table'>
                        <tr>
                            <td align='right'><div>Name: </div></td>
                            <td align='left'><div>" . @$name . "</div></td>
                        </tr>
                        <tr>
                            <td align='right'><div>Gender: </div></td>
                            <td align='left'><div>" . @$gender . "</div></td>
                        </tr>
                        <tr>
                            <td align='right'><div>Institute: </div></td>
                            <td align='left'><div>" . @$institute . "</div></td>
                        </tr>
                        <tr>
                            <td align='right'><div>Class: </div></td>
                            <td align='left'><div>" . @$class . "</div></td>
                        </tr>
                        <tr>
                            <td align='right'><div>Email: </div></td>
                            <td align='left'><div>" . @$email . "</div></td>
                        </tr>
                        <tr>
                            <td align='right'><div>Contact: </div></td>
                            <td align='left'><div>" . @$contact . "</div></td>
                        </tr>
                        <tr>
                            <td align='right'><div>Address: </div></td>
                            <td align='left'><div>" . @$address . "</div></td>
                        </tr>
                        <tr>
                            <td align='right'><div>Date of Birth: </div></td>
                            <td align='left'><div>" . @$dateofbirth . "</div></td>
                        </tr>
                    </table>
                </div>
            </div>
        </body>
        </html>";
}

function teacherHTML($name, $gender, $email, $contact, $address, $institute, $semester, $cgpa, $sscol, $ores, $hscal, $ares, $dateofbirth, $rating, $ratedby)
{
    echo "
        <html>
        <head>
            <title>Profile</title>
        </head>
        <body>
            <div class='panel panel-default'>
                <div class='panel-heading'>Profile</div>
                    <div class='panel-body'>
                        <div class='row'>
                          <div class='col-xs-6 col-md-3'>
                            <a href='#' class='thumbnail'>
                            <img src='profileimg/test.jpg' alt='...'>
                            </a>
                          </div>
                          <div class='col-xs-6 col-md-9'>
                          <p></p>
                          </div>
                        </div>
                    </div>
                <div class='table-responsive'>
                    <table align='center' class='table'>
                        <tr>
                            <td align='right'><div>Name: </div></td>
                            <td align='left'><div>" . @$name . "</div></td>
                        </tr>
                        <tr>
                            <td align='right'><div>Gender: </div></td>
                            <td align='left'><div>" . @$gender . "</div></td>
                        </tr>

                        <tr>
                            <td align='right'><div>Email: </div></td>
                            <td align='left'><div>" . @$email . "</div></td>
                        </tr>
                        <tr>
                            <td align='right'><div>Contact: </div></td>
                            <td align='left'><div>" . @$contact . "</div></td>
                        </tr>
                        <tr>
                            <td align='right'><div>Address: </div></td>
                            <td align='left'><div>" . @$address . "</div></td>
                        </tr>
                        <tr>
                            <td align='right'><div>Institute: </div></td>
                            <td align='left'><div>" . @$institute . "</div></td>
                        </tr>
                        <tr>
                            <td align='right'><div>Semester: </div></td>
                            <td align='left'><div>" . @$semester . "</div></td>
                        </tr>
                        <tr>
                            <td align='right'><div>CGPA: </div></td>
                            <td align='left'><div>" . @$cgpa . "</div></td>
                        </tr>
                        <tr>
                            <td align='right'><div>SSC/O Levels from: </div></td>
                            <td align='left'><div>" . @$sscol . "</div></td>
                        </tr>
                        <tr>
                            <td align='right'><div>SSC/O Levels Result: </div></td>
                            <td align='left'><div>" . @$ores . "</div></td>
                        </tr>
                        <tr>
                            <td align='right'><div>HSC/A Levels from: </div></td>
                            <td align='left'><div>" . @$hscal . "</div></td>
                        </tr>
                        <tr>
                            <td align='right'><div>HSC/A Levels Result: </div></td>
                            <td align='left'><div>" . @$ares . "</div></td>
                        </tr>
                        <tr>
                            <td align='right'><div>Date of Birth: </div></td>
                            <td align='left'><div>" . @$dateofbirth . "</div></td>
                        </tr>
                        <tr>
                            <td align='right'><div>Rating: </div></td>
                            <td align='left'><div>" . @$rating . " by " . @$ratedby . " Students</div></td>
                        </tr>
                    </table>
                </div>
            </div>
        </body>
        </html>";
}
?>