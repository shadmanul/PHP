<?php
$con = mysql_connect("localhost","root","");
if(!$con){
	die("Could not connect to database");
}
mysql_select_db("project",$con);
?>