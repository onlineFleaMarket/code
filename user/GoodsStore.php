<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?PHP include('isUser.php'); ?>
<?PHP
  session_start();
?>
<html>
<head>
<title>�ղ���Ʒ</title>
</head>
<body>
<? 
  //�õ���������
  $StrAction=$_GET["action"];
  // ����Goods���󣬱�����Ʒ����
  include('..\Class\Favourite.php');
  $obj = new Favourite();

  $obj->GoodsId=intval($_GET["gid"]);
  $obj->UserId=$_SESSION["user_id"];
  $obj->insert();
 
  
  print "<h3> �ղسɹ� ^_^ </h3>";
?>
</body>
<script language="javascript">
  // ˢ�¸������ڣ��ӳٴ˹ر�
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>