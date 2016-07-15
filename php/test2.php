<!DOCTYPE HTML>
<html>
<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysql_connect("localhost","root","123");
    if (!$con) {
      die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("register_db", $con);
    mysql_query("DELETE FROM Book");
    mysql_query("DELETE FROM Menu");
    echo "clear!";
    mysql_close($con);
  }
?>

<head>
</head>
<body>
  <a href="admin.php">返回</a>
</body>
</html>

