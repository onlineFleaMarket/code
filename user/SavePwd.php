<?PHP 
  include('isUser.php');
  session_start();
  if (!$_SESSION["Passed"])
  {
    header("Location: ../index.php");
  } 
  $UserId=$_GET["uid"];
?>
<html>
<head>
<title>�û�����</title>
</head>
<body>
<?PHP 
  $OriPwd=$_POST["OriPwd"];
  $Pwd=$_POST["Pwd"];
  //����SQL��䣬�ж��Ƿ���ڴ��û�
  include('..\Class\Users.php');
  $objUser = new Users();
  $objUser->UserId = $UserId;
  $objUser->UserPwd = $OriPwd;
  if(!$objUser->CheckUser())
  {
    print "�����ڴ��û������������";
?>
	<Script Language="JavaScript">	
      setTimeout("history.go(-1)",1600);	  	  
  	</Script>
<? 
  }
  else
  {
     $objUser->UserPwd = $Pwd;
	 $objUser->setpwd($UserId);
     print "<h2>��������ɹ���</h2>";
     $_SESSION["user_pwd"]=trim($Pwd);
?>
    <Script Language="JavaScript">
      setTimeout("window.close()",1600);	
    </Script>
<? 
} 
?>	
</body>
</html>
