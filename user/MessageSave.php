<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?PHP 
  include('isUser.php'); 
  session_start();
?>
<html>
<head>
<title>����������Ϣ</title>
</head>
<body>
<? 
  //�õ��������������Ϊadd���ʾ��Ӳ��������Ϊedit���ʾ���Ĳ���
  $StrAction=$_GET["action"];
  // ����Goods���󣬱�����Ʒ����
  include('..\Class\Message.php');
  $obj = new Message();
  $obj->addresser=$_POST["addresser"];
  $obj->addressee=$_POST["addressee"];
  $obj->mtime=$_POST["mtime"];
  $obj->messageid=$obj->mtime.$obj->addresser.$obj->addressee;
  $obj->content=$_POST["adetail"];
 
  $obj->insert();
  ?>
  
  <?
  print "<h3>���Գɹ�����</h3>";
?>
</body>
<script language="javascript">
  // ˢ�¸������ڣ��ӳٴ˹ر�
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>

