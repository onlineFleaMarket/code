<html>
<head>
<link href=../style.css rel=STYLESHEET type=text/css>
</head>
<body>
<? 
  //�����ݿ�������ɾ����Ϣ
  //��ȡҪɾ���ı��
  include('..\Class\Users.php');
  $uid=$_GET["uid"];
  $obj = new Users();
  $obj->delete($uid);
  print "ɾ���ɹ�!";
?>
</form>
</body>
<script language="javascript">
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>