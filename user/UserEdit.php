<html>
<head>
<link rel="stylesheet" href="../style.css">
<title>修改信息</title>
</head>
<script Language="JavaScript">
function ChkFields() {
	
	if (document.myform.userid.value=='') {
		window.alert ("请输入用户名！")
		myform.userid.focus()
		return false
	}
	if (document.myform.userid.value.length<=2) {
		window.alert ("请用户名长度必须大于2！")
		myform.userid.focus()
		return false
	}
	if (document.myform.username.value=='') {		
		window.alert ("请输入用户姓名！")
		myform.username.focus()
		return false
	}
	if (document.myform.email.value=='') {		
		window.alert ("请输入电子邮箱！")
		myform.email.focus()
		return false
	}
	if (document.myform.pwd.value.length<6) {		
		window.alert ("新密码长度大于等于6！")
		myform.pwd.focus()
		return false
	}
	if (document.myform.pwd.value=='') {		
		window.alert ("请输入新密码！")
		myform.pwd.focus()
		return false
	}
	if (document.myform.pwd1.value=='') {		
		window.alert ("请确认新密码！")
		myform.pwd1.focus()
		return false
	}
	if (document.myform.pwd.value!=document.myform.pwd1.value) {		
		window.alert ("两次输入的新密吗必须相同！")
		return false
	}
	return true
}
</script>
<body>
<form method="POST" action="UserUpdate.php" name="myform" onSubmit="return ChkFields()">
<h3></h3>
<p align="center">个人信息</p>
<input type="hidden" name="isadd" value="new">
 <table align="center" border="1" cellpadding="1" cellspacing="1" width="100%" bordercolor="#008000" bordercolordark="#FFFFFF">
     <?		 $UserId = $_GET["uid"];
     		 include('..\Class\Users.php');
  			 $result = new Users(); //创建User对象，用于访问个人信息表
  			 $result->GetUsersInfo($UserId);
  			 
     ?>
      <tr>
		<td align=left bgcolor="#CCFFCC">用户ID</td>
		<td><input type="text" readonly name="userid" value="<? echo $UserId; ?>" size="20"></td>
      </tr>
	  <tr>
		<td align=left bgcolor="#CCFFCC">用户姓名</td>
		<td><input type="text" name="username" value="<? echo $result->Name; ?>" size="20"></td>
      </tr>
	  	  <tr>
	    <td align=left bgcolor="#CCFFCC">用户密码</td>
        <td><input type="password" name="pwd" value="<? echo $result->UserPwd; ?>" size="20"></td>
      </tr>
	  <tr>
	    <td align=left bgcolor="#CCFFCC">密码确认</td>
        <td><input type="password" name="pwd1" value="<? echo $result->UserPwd; ?>" size="20"></td>
      </tr>
      <tr>
	    <td align=left bgcolor="#CCFFCC">性别</td>
        <td><select name="sex">
        <option value="0">男</option>
        <option value="1">女</option>
        </select></td>
      </tr>
     
      <tr>
        <td align=left bgcolor="#CCFFCC">学号</td>
        <td><input name="number" type="text" id="postcode"  value="<? echo $result->Number; ?>" size="40"></td>
      </tr>
      <tr>
        <td align=left bgcolor="#CCFFCC">联系方式</td>
        <td><input type="text" name="telephone"  value="<? echo $result->Telephone; ?>" size="40"></td>
      </tr>
      <tr>
        <td align=left bgcolor="#CCFFCC">公寓</td>
        <td><input type="text" name="dorm" value="<? echo $result->Dorm; ?>" size="40"></td>
      </tr>
       <tr>
	    <td align=left bgcolor="#CCFFCC">电子邮箱</td>
        <td><input type="text" name="email" value="<? echo $result->Email; ?>" size="40"></td>
      </tr>
  </table> 
<p align="center"><input type="submit" value=" 提 交 " name="B2"></p>


</form>  
</body>
</html>




