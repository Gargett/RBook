<?php
//建立数据库

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $x = json_decode($_POST["cont"],true);
}

$con = mysql_connect("localhost","root","123");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("register_db", $con);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = $x["user"];
  $menu = $x["menu"];
  mysql_query("INSERT INTO Menu (User, Cai) 
  VALUES ('".$user."', '".$menu."')");
} else {
	header('Location: ../login.html');
}

?>