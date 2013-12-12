<html>
<head>
<title>保存用户信息</title>
</head>
<body>
<? 
  include('..\Class\Users.php');
  $objUser = new Users(); //创建User对象，用于访问个人信息表
  $uid=$_POST["userid"]; // 用户名
  $objUser->UserId=$_POST["userid"]; // 用户名
  $objUser->UserPwd=$_POST["pwd"]; // 密码
  $objUser->Name=$_POST["username"]; // 姓名
  $objUser->Sex=intval($_POST["sex"]); // 性别 
  $objUser->Dorm=$_POST["dorm"]; // 地址
  $objUser->Number=$_POST["number"]; // 学号
  $objUser->Email=$_POST["email"]; // 电子邮件
  $objUser->Telephone=$_POST["telephone"]; // 电话


	
  if ($_POST["isadd"]=="new")
  {
    //判断此用户是否存在
    if($objUser->HaveUsers($uid))
    {
?>
			<script language="javascript">
				alert("已经存在此用户名！");
				history.go(-1);
			</script>
<? 
    }
    else
    {
      $objUser->UserType=0; // 用户类型
      $objUser->insert();
    } 
  }
  else
  {
    //更新用户信息
    $objUser->update($objUser->UserId);
  } 
  print "<h2>用户信息已成功保存！</h2>";
?>
</body>
<script language="javascript">
	opener.location.reload();
	setTimeout("window.close()",800);
</script>
</html>
