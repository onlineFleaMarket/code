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
<title>留言列表</title>
</head>
<body background = "../images/背景.jpg">
<center>
<table border="0" width="760" cellspacing="0" cellpadding="0">
 <tr><td height="80"><img src="../images/title.jpg" border="0" width="800" height="100"></a></td></tr>
  <tr>
  <td bgcolor="#E1F5FF" height="19" valign="middle" align="left">
<? 
 
  session_start();
 ?>
  
  
   <tr>
  <td bgcolor="#E1F5FF" height="19" valign="middle" align="left">
<? 
  //读取参数, tid表示商品类型编号，flag表示转让或求购类型
  $uid=$_GET["uid"];
  $flag=intval($_GET["flag"]);
  if($flag==0)
  {
?>
   <B>To me</B>&nbsp;&nbsp;<a href="Messageview.php?flag=1&uid=<? echo($uid); ?>">From me</a>
  <? }
  else
{
?>
   <a href="Messageview.php?flag=0&uid=<?   echo($uid); ?>">To me</a>&nbsp;&nbsp;<B>From me</B>
  <? } ?>   
  </td>  
  </tr>
 
  <?
  // 获取用户信息
  include('..\Class\Users.php');
  $objUser = new Users();
  $objUser->GetUsersInfo($uid);
  ?>   
  </td>  
  </tr>
<tr><td width="16%" valign="top" align="left"  bgcolor="#E1F5FF">
<table border="1" width="100%" cellspacing="1" bordercolorlight="#63CFFF" bordercolordark="#FFFFFF"  bgcolor="#E1F5FF">
<tr>
<td valign="top" colspan=2 align="center">
<table border=1 width=100% cellspacing=0 bordercolorlight="#C0C0C0" bordercolordark="#FFFFFF">
<tr><td colspan=6 bgcolor="#FFFFFF">
	<p align="center"><font color=#3399FF><b>【<? echo($uid); ?>的留言板】</b></font></td></tr>


<? 
if($flag==0)
{
	
  include('..\Class\Message.php');
  $obj = new Message();
  $cond=$cond." WHERE Addressee='".$uid."' ORDER BY mtime DESC ";
  $results = $obj->GetMessagelist($cond);
  $n=0;
  while($row = $results->fetch_row())
  {
?>
	  <table align=center cellpadding=0 cellspacing=0 width=90% border=1 bordercolorlight="#4DA6FF" bordercolordark="#ECF5FF">
<tr><td align=center width=100% colspan=3 bgcolor=#eeeeee height=28><font color=#0000ff>
	留言信息	
			<a href="SendMessage.php?addresser=<? echo($row[2]);?>&addressee=<? echo($row[1]); ?>" target=_blank>【回复】</a>
			<a href="DeleteMessage.php?mid=<? echo($row[0]); ?>" target=_blank>【删除】</a>	</font></td></tr>

<tr><td align=right bgcolor=#eeeeee>发件人：</td><td align=left><? echo($row[1]); ?></td></tr>
<tr><td align=right bgcolor=#eeeeee>时间：</td><td align=left><? echo($row[3]); ?></td></tr>
<tr><td align=right bgcolor=#eeeeee>内容：</td><td align=left><? echo($row[4]); ?></td></tr>
 
</table>
 
</p>
 <? $n++;
 }
 if ($n==0)
  {
    echo("<tr><td bgcolor=#FFFFFF align=center colspan=6>暂无留言信息</td></tr>");
  } 
}

else
{?>
	<?
	include('..\Class\Message.php');
  $obj = new Message();
  $cond=$cond." WHERE Addresser='".$uid."' ORDER BY mtime DESC ";
  $results = $obj->GetMessagelist($cond);
  $m=0;
  while($row = $results->fetch_row())
  {
?>
	  <table align=center cellpadding=0 cellspacing=0 width=90% border=1 bordercolorlight="#4DA6FF" bordercolordark="#ECF5FF">
<tr><td align=center width=100% colspan=3 bgcolor=#eeeeee height=28><font color=#0000ff>
	留言信息	<a href="SendMessage.php?addresser=<? echo($row[2]);?>&addressee=<? echo($row[1]); ?>" target=_blank>【回复】</a>
			<a href="DeleteMessage.php?mid=<? echo($row[0]); ?>" target=_blank>【删除】</a>	</font></td></tr>

<tr><td align=right bgcolor=#eeeeee>收件人：</td><td align=left><? echo($row[2]); ?></td></tr>
<tr><td align=right bgcolor=#eeeeee>时间：</td><td align=left><? echo($row[3]); ?></td></tr>
<tr><td align=right bgcolor=#eeeeee>内容：</td><td align=left><? echo($row[4]); ?></td></tr>
 	
</table>
</p>
 <?
 	$m++;
 }
  if ($m==0)
  {
    echo("<tr><td bgcolor=#FFFFFF align=center colspan=6>暂无留言信息</td></tr>");
  } 
}?>
</table> 
</table>
</td>
</tr>
</table>
</body>
</html>
