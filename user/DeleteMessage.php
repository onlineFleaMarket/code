<?PHP include('isUser.php'); ?>
<html>
<head>
<link href=../style.css rel=STYLESHEET type=text/css>
</head>
<body>
<? 
  
  include('..\Class\Message.php');
  $mid=$_GET["mid"];
  $obj = new Message();
  $obj->delete($mid);
  print "ɾ���ɹ�!";
?>
</form>
</body>
<script language="javascript">
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>