<?PHP include('isUser.php'); ?>
<?
  session_start();
  $UserId=trim($_SESSION["user_id"]); ?>
<html>
<head>
<title>�޸�����</title>
<link href="../style.css" rel="stylesheet">
</head>
<Script Language="JavaScript">
function ChkFields() {
  if (document.myform.OriPwd.value=='') {
    alert("������ԭʼ���룡")
    return false
  }
  if (document.myform.Pwd.value.length<6) {		
    alert("�����볤�ȴ��ڵ���6��")
    return false
  }
  if (document.myform.Pwd.value!=document.myform.Pwd1.value) {		
    alert("��������������������ͬ��")
    return false
  }
  return true
}
</Script>
<body>
<form method="POST" action="SavePwd.php?uid=<? echo($UserId); ?>" name="myform" onsubmit="return ChkFields()">
<p align="center">�޸�����</p>
<table align="center" border="1" cellpadding="1" cellspacing="1" width="263" bordercolor="#008000" bordercolordark="#FFFFFF" height="134">
      <tr>
        <td align=left width="86" height="18">�û���</td>
		<td width="161" height="18"><? echo $UserId; ?></td>
	  </tr>
	  <tr>
	    <td align=left width="86" height="23">ԭʼ����</td>
        <td width="161" height="23"><input type="password" name="OriPwd"></td>
      </tr>
	  <tr>
	    <td align=left width="86" height="23">������</td>
        <td width="161" height="23"><input type="password" name="Pwd"></td>
      </tr>
	  <tr>
	    <td align=left width="86" height="23">����ȷ��</td>
        <td width="161" height="23"><input type="password" name="Pwd1"></td>
      </tr>
  </table> 
<p align="center">
<input type="submit" value=" �� �� " name="B2"></p>
</form>  
</body>
</html>








