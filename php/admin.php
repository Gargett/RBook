<!DOCTYPE HTML> 
<?php
  if ($_COOKIE['user'] != "admin")
  header('Location: ../login.html');
?>
<html>
<head>
	<meta charset = "utf-8">
	<style type="text/css">
		#user {
			width: 33%;
			float: left;
		}
		#menu {
			width: 33%;
			float: left;
		}
    #book {
      width: 33%;
      float: left;
    }
	</style>
</head>
<body> 


<form method="post" action="test2.php">
  <button type="submit">清除数据库</button>
</form>
<div id = "user">用户：<br>
	<?php
$con = mysql_connect("localhost","root","123");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}
if (mysql_query("CREATE DATABASE register_db",$con)) {
  echo "Database created";
} else {
}
mysql_select_db("register_db", $con);
?>
<?php
  $result = mysql_query("SELECT * FROM Register");
  
while($row = mysql_fetch_array($result))
  {
  echo $row['Accout'] . " " . $row['Password'];
  echo "<br />";
  }
?>
</div>

<div id = "menu">订餐情况：<br>
	<?php
  $result = mysql_query("SELECT * FROM Menu");
  
while($row = mysql_fetch_array($result))
  {
  echo $row['User'] . " " . $row['Cai'];
  echo "<br />";
  }

?>
</div>

<div id = "book">订位情况：<br>
	<?php
  $result = mysql_query("SELECT * FROM Book");
  
while($row = mysql_fetch_array($result))
  {
  echo  $row['User'] . " " .$row['Time'] . " " . $row['Phone'];
  echo "<br />";
  }
  mysql_close($con);
?>
</div>
</body>
</html>





