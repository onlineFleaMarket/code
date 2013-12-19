<html>
<head>
<link href=../style.css rel=STYLESHEET type=text/css>
</head>
<body>
<? 
  //从数据库中批量删除信息
  //读取要删除的编号
  include('..\Class\Users.php');
  $uid=$_GET["uid"];
  $obj = new Users();
  $obj->delete($uid);
  print "删除成功!";
?>
</form>
</body>
<script language="javascript">
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>