<html>
<head>
<title>查看商品信息</title>
<link href=style.css rel=STYLESHEET type=text/css>
</head>
<body>
<center>
<? 
  include('Class\Goods.php');
  $gid=$_GET["gid"];
  $obj = new Goods();
  $obj->Add_ClickTimes($gid);  // 增加点击次数
  $obj->GetGoodsInfo($gid);  // 获取商品信息
  include('Class\Users.php');
  //读取卖家信息
  $objUser = new Users();
  $objUser->GetUsersInfo($obj->OwnerId);
  //读取商品类型
  include('Class\GoodsType.php');
  $objType = new GoodsType();
  $objType->GetGoodsTypeInfo($obj->TypeId);
?>
<center><? if($obj->ImageURL=="")
{
?><img src="images/noImg.jpg" height=50 border=0>
<? }
  else
{
?><img src="user/images/<?   echo($obj->ImageURL); ?>" height=50 border=0>
<? } ?></center>
<table align=center cellpadding=0 cellspacing=0 width=90% border=1 bordercolorlight="#4DA6FF" bordercolordark="#ECF5FF">
<tr><td align=center width=100% colspan=3 bgcolor=#eeeeee height=28><font color=#0000ff>
	商品信息</font></td></tr>
<tr><td align=right width=25% bgcolor=#eeeeee>商品名称：</td><td align=left><? echo($obj->GoodsName); ?></td></tr>
<tr><td align=right bgcolor=#eeeeee>所 有 者：</td><td align=left><? echo($obj->OwnerId); ?></td></tr>
</td></tr>
<tr><td align=right bgcolor=#eeeeee>添加时间：</td><td align=left>
	<? echo($obj->StartTime); ?></td></tr>
<tr><td align=right bgcolor=#eeeeee>商品价格：</td><td align=left><? echo($obj->Price); ?></td></tr>
<tr><td align=right bgcolor=#eeeeee>新旧程度：</td><td align=left><? echo($obj->OldNew); ?>&nbsp;</tr>
<tr><td align=right bgcolor=#eeeeee>保　　修：</td><td align=left><? echo($obj->Repaired); ?>&nbsp;</td></tr>
<tr><td align=right bgcolor=#eeeeee>发　　票：</td><td align=left><? echo($obj->Invoice); ?>&nbsp;</td></tr>
<tr><td align=right bgcolor=#eeeeee>运　　费：</td><td align=left><? echo($obj->Carriage); ?>&nbsp;</tr>
<tr><td align=right bgcolor=#eeeeee>支付方式：</td><td align=left><? echo($obj->PayMode); ?>&nbsp;</td></tr>
<tr>
	<td align=right bgcolor=#eeeeee>送货方式：</td><td align=left><? echo($obj->DeliverMode); ?>&nbsp;</td>
</tr>
<tr><td align=right bgcolor=#eeeeee>商品描述：</td>
<td align=left><textarea rows="2" name="adetail" cols="40"><? echo($obj->GoodsDetail); ?></textarea></td></tr>
</table>
</form>
</center>
</body>
</html>
