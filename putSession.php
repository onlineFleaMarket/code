<?
  session_start();
  //ȡ������û���������
  $UID=$_POST["loginname"];
  $PSWD=$_POST["password"];

  // ���û������������session
  $_SESSION["user_id"]=$UID;
  $_SESSION["user_pwd"]=$PSWD;
  header("Location: index.php");
?>
