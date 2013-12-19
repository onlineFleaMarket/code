<html>
<head>
<link href=../style.css rel=STYLESHEET type=text/css>

<title>用户收藏列表</title>
</head>
<body background = "../images/背景.jpg">
<center>
<table border="0" width="760" cellspacing="0" cellpadding="0">
 <tr><td height="80"><img src="../images/title.jpg" border="0" width="800" height="100"></a></td></tr>

<? 
  session_start();
  $uid=$_GET["uid"];
  ?>
<tr><td width="16%" valign="top" align="left"  bgcolor="#E1F5FF">
<table border="1" width="100%" cellspacing="1" bordercolorlight="#63CFFF" bordercolordark="#FFFFFF"  bgcolor="#E1F5FF">
<tr>
<td valign="top" colspan=2 align="center">
<table border=1 width=100% cellspacing=0 bordercolorlight="#C0C0C0" bordercolordark="#FFFFFF">
<tr><td colspan=6 bgcolor="#FFFFFF">
	<p align="center"><font color=#3399FF><b>【<? echo($uid); ?>的收藏夹】
	</b></font></td></tr>

<tr>
<td align=center width="14%" bgcolor="#E1F5FF">商品图片</td>
<td align=center width="8%" bgcolor="#E1F5FF">商品名称</td>
<td align=center width="8%" bgcolor="#E1F5FF">卖家</td>
<td align=center width="8%" bgcolor="#E1F5FF">价格</td>
<td align=center width="6%" bgcolor="#E1F5FF">类型</td>
<td align=center width="12%" bgcolor="#E1F5FF">新旧程度</td>
<td align=center width="10%" bgcolor="#E1F5FF">发布时间</td>
<td align=center width="12%" bgcolor="#E1F5FF">操作</td>
</tr>
<? 
  
  include('..\Class\Favourite.php');
  $obj = new Favourite();
  $results = $obj->GetFavouriteInfo($uid);
  include('..\Class\Goods.php');
  
  $m=0;
  while($row1 = $results->fetch_row())
  {
  	 $favgoods = new Goods();
  	 $gid = $row1[1]; 
 	 $cond = " WHERE GoodsId ='".$gid."'";
  	 $res = $favgoods->GetGoodslist($cond);
  	 $row = $res->fetch_row();
?>
  <tr><td align=center bgcolor="#FFFFFF"><?   if ($row[5]=="")
  {
?><img src="../images/noImg.jpg" height=50 border=0>
<?   }
  else
  {
?><img src="images/<?     echo($row[5]); ?>" height=50 border=0>
<?   } ?></td>
  <td align=center bgcolor="#FFFFFF"><a href="../GoodsView.php?gid=<?   echo($row[0]); ?>" target=_blank><?   echo($row[3]); ?></a></td>
  <td align=center bgcolor="#FFFFFF"><a href="UserView.php?uid=<?   echo($row[15]); ?>" target=_blank><?   echo($row[15]); ?></a></td>
  <td align=center bgcolor="#FFFFFF"><?   echo($row[6]); ?></td>
  <?
  	if($row[3]==1)	
  	{?>
  		 <td align=center bgcolor="#FFFFFF"><?   echo(转让); ?>&nbsp;</td>
 <? }
 	else	
 	{
 		?>
 		<td align=center bgcolor="#FFFFFF"><?   echo(求购); ?>&nbsp;</td>
 		<?
 	} ?>
  <td align=center bgcolor="#FFFFFF"><?   echo($row[8]); ?>&nbsp;</td>
  <td bgcolor="#FFFFFF" align="center"><?   echo($row[7]); ?></td>
  <td align=center bgcolor="#FFFFFF">
  
  
  <a href="FavouriteDelete.php?uid=<?echo($uid);?>&gid=<? echo($gid); ?>" target=_blank>删除</a>&nbsp;

  
<?   $m=$m+1;
  } 
  if ($m==0)
  {
    echo("<tr><td bgcolor=#FFFFFF align=center colspan=6>暂无商品信息</td></tr>");
  } 
?>
</table>
</td>
</tr>
</table>
</body>
</html>
