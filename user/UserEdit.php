<html>
<head>
<link rel="stylesheet" href="../style.css">
<title>�޸���Ϣ</title>
</head>
<script Language="JavaScript">
function ChkFields() {
	
	if (document.myform.userid.value=='') {
		window.alert ("�������û�����")
		myform.userid.focus()
		return false
	}
	if (document.myform.userid.value.length<=2) {
		window.alert ("���û������ȱ������2��")
		myform.userid.focus()
		return false
	}
	if (document.myform.username.value=='') {		
		window.alert ("�������û�������")
		myform.username.focus()
		return false
	}
	if (document.myform.email.value=='') {		
		window.alert ("������������䣡")
		myform.email.focus()
		return false
	}
	if (document.myform.pwd.value.length<6) {		
		window.alert ("�����볤�ȴ��ڵ���6��")
		myform.pwd.focus()
		return false
	}
	if (document.myform.pwd.value=='') {		
		window.alert ("�����������룡")
		myform.pwd.focus()
		return false
	}
	if (document.myform.pwd1.value=='') {		
		window.alert ("��ȷ�������룡")
		myform.pwd1.focus()
		return false
	}
	if (document.myform.pwd.value!=document.myform.pwd1.value) {		
		window.alert ("��������������������ͬ��")
		return false
	}
	return true
}
</script>
<body>
<form method="POST" action="UserUpdate.php" name="myform" onSubmit="return ChkFields()">
<h3></h3>
<p align="center">������Ϣ</p>
<input type="hidden" name="isadd" value="new">
 <table align="center" border="1" cellpadding="1" cellspacing="1" width="100%" bordercolor="#008000" bordercolordark="#FFFFFF">
     <?		 $UserId = $_GET["uid"];
     		 include('..\Class\Users.php');
  			 $result = new Users(); //����User�������ڷ��ʸ�����Ϣ��
  			 $result->GetUsersInfo($UserId);
  			 
     ?>
      <tr>
		<td align=left bgcolor="#CCFFCC">�û�ID</td>
		<td><input type="text" readonly name="userid" value="<? echo $UserId; ?>" size="20"></td>
      </tr>
	  <tr>
		<td align=left bgcolor="#CCFFCC">�û�����</td>
		<td><input type="text" name="username" value="<? echo $result->Name; ?>" size="20"></td>
      </tr>
	  	  <tr>
	    <td align=left bgcolor="#CCFFCC">�û�����</td>
        <td><input type="password" name="pwd" value="<? echo $result->UserPwd; ?>" size="20"></td>
      </tr>
	  <tr>
	    <td align=left bgcolor="#CCFFCC">����ȷ��</td>
        <td><input type="password" name="pwd1" value="<? echo $result->UserPwd; ?>" size="20"></td>
      </tr>
      <tr>
	    <td align=left bgcolor="#CCFFCC">�Ա�</td>
        <td><select name="sex">
        <option value="0">��</option>
        <option value="1">Ů</option>
        </select></td>
      </tr>
     
      <tr>
        <td align=left bgcolor="#CCFFCC">ѧ��</td>
        <td><input name="number" type="text" id="postcode"  value="<? echo $result->Number; ?>" size="40"></td>
      </tr>
      <tr>
        <td align=left bgcolor="#CCFFCC">��ϵ��ʽ</td>
        <td><input type="text" name="telephone"  value="<? echo $result->Telephone; ?>" size="40"></td>
      </tr>
      <tr>
        <td align=left bgcolor="#CCFFCC">��Ԣ</td>
        <td><input type="text" name="dorm" value="<? echo $result->Dorm; ?>" size="40"></td>
      </tr>
       <tr>
	    <td align=left bgcolor="#CCFFCC">��������</td>
        <td><input type="text" name="email" value="<? echo $result->Email; ?>" size="40"></td>
      </tr>
  </table> 
<p align="center"><input type="submit" value=" �� �� " name="B2"></p>


</form>  
</body>
</html>




