<?php
  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysql_connect("localhost","root","123");
    if (!$con) {
      die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("register_db", $con);
    $get = $_POST['time_select'];
    $phone = $_POST['phone_num'];
    $user = $_COOKIE['user'];
    $result = mysql_query("SELECT * FROM Book WHERE Time = '".$get."'");
    $num = mysql_num_rows($result);
    if ($num >= 3) {
      header('Location: ../book.html?error_=full');
    }
    else {
      mysql_query("INSERT INTO Book(User,Time, Phone) 
        VALUES ('".$user."', '".$get."', '".$phone."')");
      header('Location: ../booked.html');
    }
  }

  $result = mysql_query("SELECT * FROM Book");
  
while($row = mysql_fetch_array($result))
  {
  echo  $row['User'] . " " .$row['Time'] . " " . $row['Phone'];
  echo "<br />";
  }
  mysql_close($con);
?>