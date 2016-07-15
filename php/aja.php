<?php
   $con = mysql_connect("localhost","root","123");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}
if (mysql_query("CREATE DATABASE register_db",$con)) {
  echo "Database created";
} else {
//  echo "Error creating database: " . mysql_error();
}
mysql_select_db("register_db", $con);
$x = json_decode($_POST['cont'],true);
$name = $x['accout'];
$nameErr = "";
$accout_pass = 1;
$temp = mysql_query("SELECT * FROM Register WHERE Accout = '".$name."'");
    $find = mysql_fetch_array($temp);
       if ($find['Accout'] == $name) {
       $nameErr =  "账号已被注册";
       $accout_pass = 0;
       } 
   echo  $nameErr;
?>