<html>
<head>
<link href=../style.css rel=STYLESHEET type=text/css>
<script language="javascript">
function newwin(url) {
  var oth="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,left=200,top=100";
  oth = oth+",width=600,height=500";
  var newwin = window.open(url,"newwin",oth);
  newwin.focus();
  return false;
}
</script>
<title>��Ʒ�б�</title>
</head>
<body background = "../images/����.jpg">
<center>
<table border="0" width="760" cellspacing="0" cellpadding="0">
 <tr><td height="80"><img src="../images/title.jpg" border="0" width="800" height="100"></a></td></tr>
  <tr>
  <td bgcolor="#E1F5FF" height="19" valign="middle" align="left">
<? 
 
  session_start();
  
  //��ȡ����, flag��ʾת�û�������
 $flag=intval($_GET["flag"]);
 //echo $flag;
  //����ת�û��󹺵Ĳ�ѯ����
  if ($flag==0)
  {
    $cond=" WHERE SaleOrBuy=0";
  }
  else
  {
    $cond=" WHERE SaleOrBuy=1";
  } 
  //������Ʒ�����ѯ����
  if ($tid>0)
  {
    $cond=$cond." AND TypeId=".$tid;
  } 
  // ֻ�鿴δ��������Ʒ
  $uid=$_GET["uid"];
  //echo $uid;
  //echo $cond;
  // ��ȡ�û���Ϣ
 
  include('..\Class\Goods.php');
  $obj = new Goods();
  $results = $obj->GetGoodslist($cond);
  
  if ($flag==0)
  {
?>
   <B>ת����Ϣ</B>&nbsp;&nbsp;<a href="AdminGoods.php?flag=1">����Ϣ</a>
  <? }
  else
{
?>
   <a href="AdminGoods.php?flag=0">ת����Ϣ</a>&nbsp;&nbsp;<B>����Ϣ</B>
  <? } ?>   
  </td>  
  </tr>
<tr><td width="16%" valign="top" align="left"  bgcolor="#E1F5FF">
<table border="1" width="100%" cellspacing="1" bordercolorlight="#63CFFF" bordercolordark="#FFFFFF"  bgcolor="#E1F5FF">
<tr>
<td valign="top" colspan=2 align="center">
<table border=1 width=100% cellspacing=0 bordercolorlight="#C0C0C0" bordercolordark="#FFFFFF">

<tr>
<td align=center width="14%" bgcolor="#E1F5FF">��ƷͼƬ</td>
<td align=center width="20%" bgcolor="#E1F5FF">��Ʒ����</td>
<td align=center width="20%" bgcolor="#E1F5FF">ӵ����</td>
<td align=center width="10%" bgcolor="#E1F5FF">�۸�</td>
<td align=center width="12%" bgcolor="#E1F5FF">�¾ɳ̶�</td>
<td align=center width="10%" bgcolor="#E1F5FF">����ʱ��</td>
<td align=center width="12%" bgcolor="#E1F5FF">����</td>
</tr>
<? 
  $m=0;
  while($row = $results->fetch_row())
  {
?>
  <tr><td align=center bgcolor="#FFFFFF"><?   if ($row[5]=="")
  {
?><img src="../images/noImg.jpg" height=50 border=0>
<?   }
  else
  {
?><img src="../user/images/<?     echo($row[5]); ?>" height=50 border=0>
<?   } ?></td>
  <td align=center bgcolor="#FFFFFF"><a href="../GoodsView.php?gid=<?   echo($row[0]); ?>" target=_blank><?   echo($row[3]); ?></a></td>
   <td align=center bgcolor="#FFFFFF"><a href="../user/UserView.php?uid=<?   echo($row[15]); ?>" target=_blank><?   echo($row[15]); ?></a></td>
  <td align=center bgcolor="#FFFFFF"><?   echo($row[6]); ?></td>
  <td align=center bgcolor="#FFFFFF"><?   echo($row[8]); ?>&nbsp;</td>
  <td bgcolor="#FFFFFF" align="center"><?   echo($row[7]); ?></td>
  <td align=center bgcolor="#FFFFFF">
  
  <a href="GoodsDelete.php?gid=<? echo($row[0]); ?>" target=_blank>ɾ��</a>&nbsp;
 
   </td>
  </tr>  
<?   $m=$m+1;
  if ($m==0)
  {
    echo("<tr><td bgcolor=#FFFFFF align=center colspan=6>������Ʒ��Ϣ</td></tr>");
  } 
 }
?>
</table>
</td>
</tr>
</table>
</body>
</html>
