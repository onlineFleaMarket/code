<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?PHP 
  include('isUser.php'); 
  session_start();
?>
<html>
<head>
<title>������Ʒ��Ϣ</title>
</head>
<body>
<? 
  //�õ��������������Ϊadd���ʾ��Ӳ��������Ϊedit���ʾ���Ĳ���
  $StrAction=$_GET["action"];
  // ����Goods���󣬱�����Ʒ����
  include('..\Class\Goods.php');
  $obj = new Goods();
  $obj->GoodsName=$_POST["aname"];
  $obj->TypeId=$_POST["typeid"];
  $obj->SaleOrBuy=intval($_GET["flag"]);
  $obj->GoodsDetail=$_POST["adetail"];
  $obj->Price=$_POST["sprice"];
  $obj->StartTime=$_POST["stime"];
  $obj->OldNew=$_POST["oldnew"];
  $obj->Invoice=$_POST["invoice"];
  $obj->Repaired=$_POST["repaired"];
  $obj->Carriage=$_POST["carriage"];
  $obj->PayMode=$_POST["pmode"];
  $obj->DeliverMode=$_POST["dmode"];
  $obj->OwnerId=$_SESSION["user_id"];
  if ($StrAction=="edit")
  {
    $gid=$_GET["gid"];
    $obj->update($gid);
  }
  else
  {
    $obj->ImageUrl=$_POST["goodsimage"];
    $obj->insert();
  } 
  print "<h3>��Ʒ��Ϣ�ɹ�����</h3>";
?>
</body>
<script language="javascript">
  // ˢ�¸������ڣ��ӳٴ˹ر�
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>

