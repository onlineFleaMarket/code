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
<title>�û��б�</title>
</head>
<body background = "../images/����.jpg">
<center>
<table border="0" width="760" cellspacing="0" cellpadding="0">
 <tr><td height="80"><img src="../images/title.jpg" border="0" width="800" height="100"></a></td></tr> 
<? 
 
  session_start();
 
  include('..\Class\Users.php');
  $obj = new Users();
  $results = $obj->GetUserslist();
  
 
?>  
<tr><td width="16%" valign="top" align="left"  bgcolor="#E1F5FF">
<table border="1" width="100%" cellspacing="1" bordercolorlight="#63CFFF" bordercolordark="#FFFFFF"  bgcolor="#E1F5FF">
<tr>
<td valign="top" colspan=2 align="center">
<table border=1 width=100% cellspacing=0 bordercolorlight="#C0C0C0" bordercolordark="#FFFFFF">

<tr>
<td align=center width="20%" bgcolor="#E1F5FF">�û�ID</td>
<td align=center width="10%" bgcolor="#E1F5FF">����</td>
<td align=center width="20%" bgcolor="#E1F5FF">ѧ��</td>
<td align=center width="20%" bgcolor="#E1F5FF">�����ʼ�</td>
<td align=center width="30%" bgcolor="#E1F5FF">��ϵ��ʽ</td>

</tr>
<? 
  $m=0;
  while($row = $results->fetch_row())
  {
?>
   <td align=center bgcolor="#FFFFFF"><a href="../user/UserView.php?uid=<?   echo($row[0]); ?>" target=_blank><?   echo($row[0]); ?></a></td>
  <td align=center bgcolor="#FFFFFF"><?   echo($row[2]); ?></td>
  <td align=center bgcolor="#FFFFFF"><?   echo($row[4]); ?>&nbsp;</td>
  <td bgcolor="#FFFFFF" align="center"><?   echo($row[6]); ?></td>
  <td bgcolor="#FFFFFF" align="center"><?   echo($row[7]); ?></td>
  <td align=center bgcolor="#FFFFFF">
  
 
   </td>
  </tr>  
<?   $m=$m+1;
  if ($m==0)
  {
    echo("<tr><td bgcolor=#FFFFFF align=center colspan=6>�����û�</td></tr>");
  } 
 }
?>
</table>
</td>
</tr>
</table>
</body>
</html>
