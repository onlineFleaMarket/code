<html>
<head>
<title>�����û���Ϣ</title>
</head>
<body>
<? 
  include('..\Class\Users.php');
  $objUser = new Users(); //����User�������ڷ��ʸ�����Ϣ��
  $uid=$_POST["userid"]; // �û���
  $objUser->UserId=$_POST["userid"]; // �û���
  $objUser->UserPwd=$_POST["pwd"]; // ����
  $objUser->Name=$_POST["username"]; // ����
  $objUser->Sex=intval($_POST["sex"]); // �Ա� 
  $objUser->Dorm=$_POST["dorm"]; // ��ַ
  $objUser->Number=$_POST["number"]; // ѧ��
  $objUser->Email=$_POST["email"]; // �����ʼ�
  $objUser->Telephone=$_POST["telephone"]; // �绰


	
  if ($_POST["isadd"]=="new")
  {
    //�жϴ��û��Ƿ����
    if($objUser->HaveUsers($uid))
    {
?>
			<script language="javascript">
				alert("�Ѿ����ڴ��û�����");
				history.go(-1);
			</script>
<? 
    }
    else
    {
      $objUser->UserType=0; // �û�����
      $objUser->insert();
    } 
  }
  else
  {
    //�����û���Ϣ
    $objUser->update($objUser->UserId);
  } 
  print "<h2>�û���Ϣ�ѳɹ����棡</h2>";
?>
</body>
<script language="javascript">
	opener.location.reload();
	setTimeout("window.close()",800);
</script>
</html>
