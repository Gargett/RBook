<?php
//建立数据库
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


/*建立注册表
$sql = "CREATE TABLE Register 
(
Accout varchar(15),
Password varchar(15)
)";
if(mysql_query($sql,$con)) {
   echo "Database created";
} else {
}

//建立订位表
$sql = "CREATE TABLE Book 
(
Time varchar(15),
Phone varchar(15)
)";
if(mysql_query($sql,$con)) {
   echo "Database created";
} else {
}*/
?>

<?php
// 定义变量并设置为空值
/*$nameErr = $passwordErr =  "";
$name = $password  = "";
$judge = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "用户名是必填的";
   } else {
     $name = test_input($_POST["name"]);
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "只允许字母和空格"; 
     } else {
       $judge = 1;
     }
   }
   
   if (empty($_POST["password"])) {
     $passwordErr = "密码是必填的";
   } else {
     $password = test_input($_POST["password"]);
     if (!preg_match("/^[a-zA-Z0-9]*$/",$password)) {
       $passwordErr = "无效的密码格式"; 
     } else if($judge == 1) {
      //如果用户名和密码都合法格式
      $temp = mysql_query("SELECT * FROM Register WHERE Accout = '".$name."'");
      $find = mysql_fetch_array($temp);
       if ($find['Accout'] == $name) {
       $nameErr =  "账号已被注册";
       } else {
        mysql_query("INSERT INTO Register (Accout, Password) 
        VALUES ('".$name."', '".$password."')");
        header('Location: login.html'); //跳转到一个新的地址
       }
     }
   }
}
*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $account = $_GET["account"];
  $password = $_GET["password"];
  mysql_query("INSERT INTO Register (Accout, Password) 
  VALUES ('".$account."', '".$password."')");
  setcookie("user", $account);
  header('Location: index.html');
}
 //跳转到一个新的地址


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<?php
  $result = mysql_query("SELECT * FROM Register");
  
while($row = mysql_fetch_array($result))
  {
  echo $row['Accout'] . " " . $row['Password'];
  echo "<br />";
  }
  mysql_close($con);
?>
