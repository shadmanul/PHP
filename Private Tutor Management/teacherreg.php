<?php
require_once("db.php");
if (isset($_POST["submit"]))
{
    $firstname = mysql_real_escape_string( trim($_POST["firstname"]));
    $lastname = mysql_real_escape_string( trim($_POST["lastname"]));
    $username = mysql_real_escape_string( trim($_POST["username"]));
    $password = mysql_real_escape_string( trim($_POST["pass"]));
    $repassword = mysql_real_escape_string( trim($_POST["repass"]));
    $gender = mysql_real_escape_string(trim($_POST["gender"]));
    $email= mysql_real_escape_string(trim($_POST["email"]));
    $contact= mysql_real_escape_string(trim($_POST["contact"]));
    $address=mysql_real_escape_string(trim($_POST["address"]));
    $institute= mysql_real_escape_string(trim($_POST["institute"]));
    $semester= mysql_real_escape_string(trim($_POST["semester"]));
    $cgpa= mysql_real_escape_string(trim($_POST["cgpa"]));
    $sscol= mysql_real_escape_string(trim($_POST["sscol"]));
    $ores= mysql_real_escape_string(trim($_POST["ores"]));
    $hscal= mysql_real_escape_string(trim($_POST["hscal"]));
    $ares= mysql_real_escape_string(trim($_POST["ares"]));
    $dateofbirth=mysql_real_escape_string(trim($_POST["year"]))."-".
        mysql_real_escape_string(trim($_POST["month"]))."-".mysql_real_escape_string(trim($_POST["day"]));
    $year=mysql_real_escape_string(trim($_POST["year"]));

    if($password!=$repassword){
        $check="1";
    }
    else {
        $check="0";
    }
    if($check=="1"){
        $msg = "Password didn't match";
    }
    else {
        $q1 = "INSERT INTO `tutor`(`id`, `firstname`, `lastname`, `username`, `gender`, `email`, `contact`, `address`, `institute`, `semester`, `cgpa`, `ssc_ol`, `ores`, `hsc_al`, `ares`, `dateofbirth`, `rating`, `ratedby`) VALUES (NULL,'$firstname','$lastname','$username','$gender','$email','$contact','$address','$institute','$semester','$cgpa','$sscol','$ores','$hscal','$ares','$dateofbirth','0','0')";
        //$q1= "INSERT INTO student values(NULL,$firstname,$lastname,$username,$gender,$institute,$class,$email,$contact,$address,$dateofbirth)";
        $q2 = "INSERT INTO `login` values('$username','$password','2')";
        $d2 = mysql_query($q2);
        if ($d2) {
            $d1 = mysql_query($q1);
            if ($d1)
                header('location: success.php');
        } else
            $invaliduser = "Username Taken";
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Teacher Registration</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/teacherregistration.css"/>
</head>
<body>
    <form action="teacherreg.php" class="register" method="post" >
        <h1>Teacher Registration Form</h1>
        <fieldset class="row">
            <legend>Account Details
            </legend>
            <p>
                <label id="user">Username *
                </label>
                <input type="text" value="<?=@$username?>" name="username" id="uname" placeholder="User name" required/>
                <label style="color: red; font-weight: bold" ><?=@$invaliduser?></label>
            </p>
            <p>
                <label id>Password*
                </label>
                <input type="text" value="<?=@$password?>" name="pass" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Require Uppercase, Lowercase, Numeric value, Special Symbol & Lenght should be Greater than 8." id="password" placeholder="Password" required/>
            </p>
            <p>
                <label>Repeat Password*</label>
                <input type="text" value="<?=@$repassword?>" name="repass" id="repass" onblur="rePass()" required/>
                <label id="vrepass" style="color: red; font-weight: bold"><?=@$msg?></label>
            </p>
        </fieldset>
        <fieldset class="row">
            <legend>Personal Details
            </legend>
            <p>
                <label>First Name *
                </label>
                <input type="text" value="<?=@$firstname?>" name="firstname" id="firstname" class="long" pattern="[a-zA-Z]{5,}" title="Minimum 5 letters" required onblur="fnv()"/>
                <label id="vfirstname"></label>
            </p>
            <p>
                <label>Last Name *
                </label>
                <input type="text" value="<?=@$lastname?>" name="lastname" id="lastname" class="long" pattern="[a-zA-Z]{3,}" title="Minimum 3 letters" required onblur="lnv()"/>
                <label name="llastname" id="vlastname"></label>
            </p>
            <p>
                <label id="vemail">Email *
                </label>
                <input type="email" value="<?=@$email?>" name="email" id="email" class="long" placeholder="email@domain.com" required/>
            </p>
            <p>
                <label id="vcontact">Contact *
                </label>
                <input type="text" value="<?=@$contact?>" name="contact" pattern="[0-9]*" placeholder="Example +01730000000" id="contact" class="long" required/>
            </p>
            <p>
                <label id="vadd">Address *
                </label>
                <textarea rows="4" cols="50" value="<?=@$address?>" name="address" placeholder="My address is..." required></textarea>
            </p>
            <p>
                <label id="vgender">Gender *</label>
                <select name="gender" required >
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </p>
            <p>
                <label id="inst">Current Institute *
                </label>
                <input type="text" value="<?=@$institute?>" name="institute"  placeholder="Enter your institute" id="institute" class="long" required />
            </p>
            <p>
                <label id="vsemester">Semester *
                </label>
                <input type="text" value="<?=@$semester?>" name="semester" placeholder="Current Semester" class="long" required/>
            </p>
            <p>
                <label id="vcgpa">CGPA *
                </label>
                <input type="text" name="cgpa" value="<?=@$cgpa?>" placeholder="Total CGPA" pattern="(\d{1})([\.])(\d{2})" title="Need a Deciman Point and Two Digit After the Decimal Point" class="long" required/>
            </p>
            <p>
                <label id="vssc">SSC / O Levels From *
                </label>
                <input type="text" name="sscol" value="<?=@$sscol?>" class="long" required/>
            </p>
            <p>
                <label id="vsscres">SSC / O Levels result *
                </label>
                <input type="text" name="ores" value="<?=@$ores?>" class="long" required/>
            </p>
            <p>
                <label id="vhsc">HSC / A Levels From *
                </label>
                <input type="text" name="hscal" value="<?=@$hscal?>" class="long" required/>
            </p>
            <p>
                <label id="vhscres">HSC / A Levels Result *
                </label>
                <input type="text" name="ares" value="<?=@$ares?>" class="long" required/>
            </p>
            <p>
                <label id="dob">Birthdate *
                </label>
                <select required class="date" name="day">
                    <option value="1">01
                    </option>
                    <option value="2">02
                    </option>
                    <option value="3">03
                    </option>
                    <option value="4">04
                    </option>
                    <option value="5">05
                    </option>
                    <option value="6">06
                    </option>
                    <option value="7">07
                    </option>
                    <option value="8">08
                    </option>
                    <option value="9">09
                    </option>
                    <option value="10">10
                    </option>
                    <option value="11">11
                    </option>
                    <option value="12">12
                    </option>
                    <option value="13">13
                    </option>
                    <option value="14">14
                    </option>
                    <option value="15">15
                    </option>
                    <option value="16">16
                    </option>
                    <option value="17">17
                    </option>
                    <option value="18">18
                    </option>
                    <option value="19">19
                    </option>
                    <option value="20">20
                    </option>
                    <option value="21">21
                    </option>
                    <option value="22">22
                    </option>
                    <option value="23">23
                    </option>
                    <option value="24">24
                    </option>
                    <option value="25">25
                    </option>
                    <option value="26">26
                    </option>
                    <option value="27">27
                    </option>
                    <option value="28">28
                    </option>
                    <option value="29">29
                    </option>
                    <option value="30">30
                    </option>
                    <option value="31">31
                    </option>
                </select>
                <select  required name="month">
                    <option value="1">January
                    </option>
                    <option value="2">February
                    </option>
                    <option value="3">March
                    </option>
                    <option value="4">April
                    </option>
                    <option value="5">May
                    </option>
                    <option value="6">June
                    </option>
                    <option value="7">July
                    </option>
                    <option value="8">August
                    </option>
                    <option value="9">September
                    </option>
                    <option value="10">October
                    </option>
                    <option value="11">November
                    </option>
                    <option value="12">December
                    </option>
                </select>
                <input class="year" value="<?=@$year?>" type="text" size="4" pattern="[0-9]*" name="year" maxlength="4" required/>
            </p>
            <p>
            <table width="100%" >
                <tr>
                    <td width="50%">
                        <br/>
                        <p>
                        <div><input type="submit" value="Register &raquo;" name="submit" class="button" ></div></p></p></td>

                    <td><div class="infobox"><h4>Helpful Information</h4>
                            <br/><div style="font-size: 12px;">You need to fill up all the boxes to get registered. There is no optional field.<div style="font-size: 12px; color: darkred">
                                    If you see any
                                    error after submitting please reselect gender and date of birth</div></div>
                        </div><td/>
                </tr>
            </table>
        </fieldset>

    </form>
    <script src="js/registrationScript.js" type="text/javascript"></script>
</body>
</html>