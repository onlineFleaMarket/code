<html>
<head>
<title>�鿴������Ϣ</title>
<link href=style.css rel=STYLESHEET type=text/css>
</head>
<body>
<center>
<? 
  include('Class\Message.php');
  $mid=$_GET["mid"];
  $obj = new Message();
  $obj->GetMessageInfo($mid);  // ��ȡ��Ʒ��Ϣ
  include('Class\Users.php');
  //��ȡ������Ϣ
  $objUser = new Users();
  $objUser->GetUsersInfo($obj->OwnerId);
  //��ȡ��Ʒ����
  include('Class\GoodsType.php');
  $objType = new GoodsType();
  $objType->GetGoodsTypeInfo($obj->TypeId);
?></center>
<table align=center cellpadding=0 cellspacing=0 width=90% border=1 bordercolorlight="#4DA6FF" bordercolordark="#ECF5FF">
<tr><td align=center width=100% colspan=3 bgcolor=#eeeeee height=28><font color=#0000ff>
	������Ϣ</font></td></tr>
<tr><td align=right width=25% bgcolor=#eeeeee>��ƷID��</td><td align=left><? echo($obj->messageid); ?></td></tr>
<tr><td align=right bgcolor=#eeeeee>�����ˣ�</td><td align=left><? echo($objUser->addresser); ?></td></tr>
<tr><td align=right bgcolor=#eeeeee>�ռ��ˣ�</td><td align=left>
<? echo($objType->addressee); ?>
</td></tr>
<tr><td align=right bgcolor=#eeeeee>ʱ�䣺</td><td align=left>
	<? echo($obj->mtime); ?></td></tr>
<tr><td align=right bgcolor=#eeeeee>���ݣ�</td><td align=left><? echo($obj->content); ?></td></tr>

</table>
</form>
</center>
</body>
</html>
