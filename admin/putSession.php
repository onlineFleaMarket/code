<?
  session_start();
  //ȡ������û���������
  $AID=$_POST["loginname"];
  $PSWD=$_POST["password"];

  // ���û������������session
  $_SESSION["admin_id"]=$AID;
  $_SESSION["admin_pwd"]=$PSWD;
  header("Location: AdminLogin.php");
?>
