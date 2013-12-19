<?PHP include('isUser.php'); ?>
<html>
<head>
<link href=../style.css rel=STYLESHEET type=text/css>
</head>
<body>
<? 
  
  include('..\Class\Favourite.php');
  $gid=$_GET["gid"];
  $uid=$_GET["uid"];
  $cond = "WHERE UserId ='".$uid."'";
  $cond = $cond."AND GoodsId ='".$gid."'";
  
  $obj = new Favourite();
  $obj->delete($cond);
  print "É¾³ý³É¹¦!";
?>
</form>
</body>
<script language="javascript">
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>