<?
  session_start();
  //取输入的用户名和密码
  $AID=$_POST["loginname"];
  $PSWD=$_POST["password"];

  // 把用户名和密码放入session
  $_SESSION["admin_id"]=$AID;
  $_SESSION["admin_pwd"]=$PSWD;
  header("Location: AdminLogin.php");
?>
