<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?PHP include('isUser.php'); ?>
<?PHP
  session_start();
?>
<html>
<head>
<title>收藏商品</title>
</head>
<body>
<? 
  //得到动作参数
  $StrAction=$_GET["action"];
  // 定义Goods对象，保存商品数据
  include('..\Class\Favourite.php');
  $obj = new Favourite();

  $obj->GoodsId=intval($_GET["gid"]);
  $obj->UserId=$_SESSION["user_id"];
  $obj->insert();
 
  
  print "<h3> 收藏成功 ^_^ </h3>";
?>
</body>
<script language="javascript">
  // 刷新父级窗口，延迟此关闭
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>