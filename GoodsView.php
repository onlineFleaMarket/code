<html>
<head>
<title>�鿴��Ʒ��Ϣ</title>
<link href=style.css rel=STYLESHEET type=text/css>
</head>
<body>
<center>
<? 
  include('Class\Goods.php');
  $gid=$_GET["gid"];
  $obj = new Goods();
  $obj->Add_ClickTimes($gid);  // ���ӵ������
  $obj->GetGoodsInfo($gid);  // ��ȡ��Ʒ��Ϣ
  include('Class\Users.php');
  //��ȡ������Ϣ
  $objUser = new Users();
  $objUser->GetUsersInfo($obj->OwnerId);
  //��ȡ��Ʒ����
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
	��Ʒ��Ϣ</font></td></tr>
<tr><td align=right width=25% bgcolor=#eeeeee>��Ʒ���ƣ�</td><td align=left><? echo($obj->GoodsName); ?></td></tr>
<tr><td align=right bgcolor=#eeeeee>�� �� �ߣ�</td><td align=left><? echo($obj->OwnerId); ?></td></tr>
</td></tr>
<tr><td align=right bgcolor=#eeeeee>���ʱ�䣺</td><td align=left>
	<? echo($obj->StartTime); ?></td></tr>
<tr><td align=right bgcolor=#eeeeee>��Ʒ�۸�</td><td align=left><? echo($obj->Price); ?></td></tr>
<tr><td align=right bgcolor=#eeeeee>�¾ɳ̶ȣ�</td><td align=left><? echo($obj->OldNew); ?>&nbsp;</tr>
<tr><td align=right bgcolor=#eeeeee>�������ޣ�</td><td align=left><? echo($obj->Repaired); ?>&nbsp;</td></tr>
<tr><td align=right bgcolor=#eeeeee>������Ʊ��</td><td align=left><? echo($obj->Invoice); ?>&nbsp;</td></tr>
<tr><td align=right bgcolor=#eeeeee>�ˡ����ѣ�</td><td align=left><? echo($obj->Carriage); ?>&nbsp;</tr>
<tr><td align=right bgcolor=#eeeeee>֧����ʽ��</td><td align=left><? echo($obj->PayMode); ?>&nbsp;</td></tr>
<tr>
	<td align=right bgcolor=#eeeeee>�ͻ���ʽ��</td><td align=left><? echo($obj->DeliverMode); ?>&nbsp;</td>
</tr>
<tr><td align=right bgcolor=#eeeeee>��Ʒ������</td>
<td align=left><textarea rows="2" name="adetail" cols="40"><? echo($obj->GoodsDetail); ?></textarea></td></tr>
</table>
</form>
</center>
</body>
</html>
