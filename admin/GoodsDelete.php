<html>
<head>
<link href=../style.css rel=STYLESHEET type=text/css>
</head>
<body>
<? 
  //�����ݿ�������ɾ����Ϣ
  //��ȡҪɾ���ı��
  include('..\Class\Goods.php');
  $gid=$_GET["gid"];
  $obj = new Goods();
  $obj->delete($gid);
  print "ɾ���ɹ�!";
?>
</form>
</body>
<script language="javascript">
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>