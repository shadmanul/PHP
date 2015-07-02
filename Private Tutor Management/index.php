<?php
session_start();
?>
<?php
require_once("db.php");
if(isset($_POST["submit"])){
    $uname = mysql_real_escape_string(trim($_POST["uname"]));
    $pass = mysql_real_escape_string(trim($_POST["pass"]));
    $q="select * from login where username='$uname' and password='$pass'";
    $rs=mysql_query($q);
    if($rs === FALSE) {
      die(mysql_error());
    }
    if(mysql_num_rows($rs)==1){
        $_SESSION["uname"]=$uname;
        $d = mysql_fetch_assoc($rs);
        $_SESSION["status"]=$d["status"];
        header('location: home.php');
        if($d["status"]==3) {
            $nameq = mysql_query("select `firstname`,`lastname` from student where username='$uname'");
            if($nameq === FALSE) {
                die(mysql_error());
            }
            $values=mysql_fetch_assoc($nameq);
            $_SESSION["name"]=$values["firstname"]." ".$values["lastname"];
        }
        else{
            $nameq = mysql_query("select `firstname`,`lastname` from tutor where username='$uname'");
            if($nameq === FALSE) {
                die(mysql_error());
            }
            $values=mysql_fetch_assoc($nameq);
            $_SESSION["name"]=$values["firstname"]." ".$values["lastname"];
        }
    }
    else{
        $msg="Incorrect Password or Username. Try again.";
    }
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Login - TutorEye</title>

    <link rel="stylesheet" href="css/loginstyle.css" media="screen" type="text/css" />

</head>

<body>

<html lang="en-US">
    <head>

    <meta charset="utf-8">

    <title>Login</title>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">

    <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->

    </head>

    <body>

      <div class="container">
        <b><div id="tryagain" align="center"><?=@$msg?></div></b><br/>

        <div id="login">


          <form action="index.php" method="post">

            <fieldset class="clearfix">

              <p><span class="fontawesome-user"></span><input type="text" name="uname" value="Username" onBlur="if(this.value == '') this.value = 'Username'" onFocus="if(this.value == 'Username') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
             <p><span class="fontawesome-lock"></span><input type="password" name="pass" value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
             <p><input type="submit" value="Sign In" name="submit"></p>

            </fieldset>

          </form>

         <p>Not a member? Sign up as <a class="signup" href="studentreg.php">Student</a> or 
          <a class="signup" href="teacherreg.php">Teacher</a></p>       
       </div> <!-- end login -->

     </div>

    </body>
</html>

</body>

</html>