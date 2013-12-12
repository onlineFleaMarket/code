<html>
<head>
<? session_start(); ?>
<link href=style.css rel=STYLESHEET type=text/css>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"><title>旧物交易</title></head>
<body background = "images/背景.jpg">

<center>
<table border="0" width="760" cellspacing="0" cellpadding="0">
 <tr><td colspan="3" height="80"><img src="images/title.jpg" width="800" height="100" border="0"></td>
 </tr>
  <tr>
  <td colspan="2" bgcolor="#FFDDCC" height="19" valign="middle" align="left">

<?PHP
  //从表GoodsType中读取商品类别数据
  
  include('Class\GoodsType.php');
  $gtype = new GoodsType();
  $results = $gtype->GetGoodsTypelist();
  
  //使用循环语句,依次显示分类信息
  while($row = $results->fetch_row())
  {  
?>	   
      <font color="#FF9933""></font>&nbsp;<a href="List.php?tid=<? echo($row[0]); ?>" target="_blank"><? echo($row[1]); ?></a>&nbsp;
<? 
  } 
?>
  </td>  
  <td bgcolor="#E12222" height="19" valign="middle" align="right">
  </td></tr>
<tr><td width="25%" valign="top" align="left"><?PHP include("left.php"); ?></td>
<td width="75%" valign="top" align="center">
<table border="1" width="100%" cellspacing="0" cellpadding="0" bordercolorlight="#63CFFF" bordercolordark="#FFFFFF">
<tr><td width="50%" bgcolor="#63CFFF" height="18">最新加入商品</td></tr>
<tr><td width="100%" valign="top" align="left" height="1">
<table border="1" width="100%"  cellspacing="1" bordercolorlight="#63CFFF" bordercolordark="#FFFFFF">
<tr>
<? 
  include('Class\Goods.php');
  $objGoods = new Goods();
  $results = $objGoods->GetTopnNewGoods(12);
  //如果没有找到商品，则显示提示信息
  $i=0;
  //否则使用循环语句，依次显示商品信息
  while($row = $results->fetch_row())
  {
?>        
    <td valign="top" width="33.33%" align="left" bgcolor="#FFFFFF">
    <p align="center">
<? 
//显示商品图片
  if (!isset($row[5]) || trim($row[5])=="")
  {
?>
      <img border="0" src="images/noImg.jpg" height="110">
<? 
  }
  else
  {
?>
      <a href="GoodsView.php?gid=<?     echo($row[0]); ?>" target=_blank>
      <img border="0" src="user/images/<?  echo($row[5]); ?>" width="100" height="110"></a>
<? 
  } 
?>
</center>
    <br>商品名称：<a href="GoodsView.PHP?gid=<?   echo($row[0]); ?>" target=_blank><?    echo($row[3]); ?></a>
	<br>交易类型：
	<?   if($row[2]==1)
  {
?>
       转让
	<?   }
    else
    {
?>
	   求购
	<?   } ?>
    <br>所有者：<?    echo($row[15]); ?>
    <br>价格：<?   echo($row[6]); ?>元
    <br>发布时间：<?   echo($row[7]); ?>
</td>
<center>
<? 
  if ($i%3==2)
  {
?>
	  </tr><tr>
<?   } 

  $i++;
} 
  if ($i==0)
  {
?>
   <td width="100%" valign="top" align="left" bgcolor="#FFFFFF">暂且没有商品</td>
<? 
} 
?>
</tr></table></center></table></td>    
  </tr>
</table>
</body>
</html>
