<?PHP include('isUser.php'); ?>
<?
  session_start();
  $UserId=trim($_SESSION["user_id"]); ?>
<html>
<head>
<title>修改密码</title>
<link href="../style.css" rel="stylesheet">
</head>
<Script Language="JavaScript">
function ChkFields() {
  if (document.myform.OriPwd.value=='') {
    alert("请输入原始密码！")
    return false
  }
  if (document.myform.Pwd.value.length<6) {		
    alert("新密码长度大于等于6！")
    return false
  }
  if (document.myform.Pwd.value!=document.myform.Pwd1.value) {		
    alert("两次输入的新密码必须相同！")
    return false
  }
  return true
}
</Script>
<body>
<form method="POST" action="SavePwd.php?uid=<? echo($UserId); ?>" name="myform" onsubmit="return ChkFields()">
<p align="center">修改密码</p>
<table align="center" border="1" cellpadding="1" cellspacing="1" width="263" bordercolor="#008000" bordercolordark="#FFFFFF" height="134">
      <tr>
        <td align=left width="86" height="18">用户名</td>
		<td width="161" height="18"><? echo $UserId; ?></td>
	  </tr>
	  <tr>
	    <td align=left width="86" height="23">原始密码</td>
        <td width="161" height="23"><input type="password" name="OriPwd"></td>
      </tr>
	  <tr>
	    <td align=left width="86" height="23">新密码</td>
        <td width="161" height="23"><input type="password" name="Pwd"></td>
      </tr>
	  <tr>
	    <td align=left width="86" height="23">密码确认</td>
        <td width="161" height="23"><input type="password" name="Pwd1"></td>
      </tr>
  </table> 
<p align="center">
<input type="submit" value=" 提 交 " name="B2"></p>
</form>  
</body>
</html>








