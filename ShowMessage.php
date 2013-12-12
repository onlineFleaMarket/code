<html>
<head>
<title>查看留言信息</title>
<link href=style.css rel=STYLESHEET type=text/css>
</head>
<body>
<center>
<? 
  include('Class\Message.php');
  $mid=$_GET["mid"];
  $obj = new Message();
  $obj->GetMessageInfo($mid);  // 获取商品信息
  include('Class\Users.php');
  //读取卖家信息
  $objUser = new Users();
  $objUser->GetUsersInfo($obj->OwnerId);
  //读取商品类型
  include('Class\GoodsType.php');
  $objType = new GoodsType();
  $objType->GetGoodsTypeInfo($obj->TypeId);
?></center>
<table align=center cellpadding=0 cellspacing=0 width=90% border=1 bordercolorlight="#4DA6FF" bordercolordark="#ECF5FF">
<tr><td align=center width=100% colspan=3 bgcolor=#eeeeee height=28><font color=#0000ff>
	留言信息</font></td></tr>
<tr><td align=right width=25% bgcolor=#eeeeee>商品ID：</td><td align=left><? echo($obj->messageid); ?></td></tr>
<tr><td align=right bgcolor=#eeeeee>发件人：</td><td align=left><? echo($objUser->addresser); ?></td></tr>
<tr><td align=right bgcolor=#eeeeee>收件人：</td><td align=left>
<? echo($objType->addressee); ?>
</td></tr>
<tr><td align=right bgcolor=#eeeeee>时间：</td><td align=left>
	<? echo($obj->mtime); ?></td></tr>
<tr><td align=right bgcolor=#eeeeee>内容：</td><td align=left><? echo($obj->content); ?></td></tr>

</table>
</form>
</center>
</body>
</html>
