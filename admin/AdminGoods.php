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
<title>商品列表</title>
</head>
<body background = "../images/背景.jpg">
<center>
<table border="0" width="760" cellspacing="0" cellpadding="0">
 <tr><td height="80"><img src="../images/title.jpg" border="0" width="800" height="100"></a></td></tr>
  <tr>
  <td bgcolor="#E1F5FF" height="19" valign="middle" align="left">
<? 
 
  session_start();
  
  //读取参数, flag表示转让或求购类型
 $flag=intval($_GET["flag"]);
 //echo $flag;
  //设置转让或求购的查询条件
  if ($flag==0)
  {
    $cond=" WHERE SaleOrBuy=0";
  }
  else
  {
    $cond=" WHERE SaleOrBuy=1";
  } 
  //设置商品分类查询条件
  if ($tid>0)
  {
    $cond=$cond." AND TypeId=".$tid;
  } 
  // 只查看未结束的商品
  $uid=$_GET["uid"];
  //echo $uid;
  //echo $cond;
  // 获取用户信息
 
  include('..\Class\Goods.php');
  $obj = new Goods();
  $results = $obj->GetGoodslist($cond);
  
  if ($flag==0)
  {
?>
   <B>转让信息</B>&nbsp;&nbsp;<a href="AdminGoods.php?flag=1">求购信息</a>
  <? }
  else
{
?>
   <a href="AdminGoods.php?flag=0">转让信息</a>&nbsp;&nbsp;<B>求购信息</B>
  <? } ?>   
  </td>  
  </tr>
<tr><td width="16%" valign="top" align="left"  bgcolor="#E1F5FF">
<table border="1" width="100%" cellspacing="1" bordercolorlight="#63CFFF" bordercolordark="#FFFFFF"  bgcolor="#E1F5FF">
<tr>
<td valign="top" colspan=2 align="center">
<table border=1 width=100% cellspacing=0 bordercolorlight="#C0C0C0" bordercolordark="#FFFFFF">

<tr>
<td align=center width="14%" bgcolor="#E1F5FF">商品图片</td>
<td align=center width="20%" bgcolor="#E1F5FF">商品名称</td>
<td align=center width="20%" bgcolor="#E1F5FF">拥有者</td>
<td align=center width="10%" bgcolor="#E1F5FF">价格</td>
<td align=center width="12%" bgcolor="#E1F5FF">新旧程度</td>
<td align=center width="10%" bgcolor="#E1F5FF">发布时间</td>
<td align=center width="12%" bgcolor="#E1F5FF">操作</td>
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
  
  <a href="GoodsDelete.php?gid=<? echo($row[0]); ?>" target=_blank>删除</a>&nbsp;
 
   </td>
  </tr>  
<?   $m=$m+1;
  if ($m==0)
  {
    echo("<tr><td bgcolor=#FFFFFF align=center colspan=6>暂无商品信息</td></tr>");
  } 
 }
?>
</table>
</td>
</tr>
</table>
</body>
</html>
