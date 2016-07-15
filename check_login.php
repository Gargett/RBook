<!DOCTYPE HTML> 
<?php session_start(); ?>
<html>
<head>
</head>
<body> 

<?php
//建立数据库
  $con = mysql_connect("localhost","root","123");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

  mysql_select_db("register_db", $con);
?>



<?php
//验证账号密码

$name = $password  = "";
$password_check = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $password = test_input($_POST["password"]);
  $temp = mysql_query("SELECT * FROM Register WHERE Accout = '".$name."'");
  $find = mysql_fetch_array($temp);
  $password_check = $find['Password'];
  //如果用户名和密码都匹配
  if($password_check == $password) {
      if ($find['Accout'] == "admin") {
        //管理员界面
        setcookie("user", "admin");
        header('Location: php/admin.php');
      } else {
        //用户界面
        setcookie("user", $name);
        header('Location: index.html');
       /* $_SESSION['id']='user';
        header('Location: user.php?user='.$name);*/
      }
  } else {
      //echo "<script>history.back(-1)</script>";
    header('Location: login.html?error_ret=not_match');
  }
}


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>


</body>
</html>
