<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?PHP 
  include('isUser.php'); 
  session_start();
?>
<html>
<head>
<title>保存留言信息</title>
</head>
<body>
<? 
  //得到动作参数，如果为add则表示添加操作，如果为edit则表示更改操作
  $StrAction=$_GET["action"];
  // 定义Goods对象，保存商品数据
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
  print "<h3>留言成功保存</h3>";
?>
</body>
<script language="javascript">
  // 刷新父级窗口，延迟此关闭
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>

