<?PHP include('isUser.php'); ?>
<?PHP
  //session_start();
?>
<html>
<head>
<title>����Ϣ</title>
<link href=../style.css rel=STYLESHEET type=text/css>

</head>
<body>
<form action="MessageSave.php?>" method=post name=form1 onsubmit="return CheckFlds()">
<center>
<table align=center cellpadding=0 cellspacing=0 width=90% border=1 bordercolorlight="#4DA6FF" bordercolordark="#ECF5FF">
<tr><td align=center width=100% colspan=3 bgcolor=#eeeeee height=28><font color=#0000ff>
	�༭����</font></td></tr>


<?
  include('..\Class\Message.php');
  
  	date_default_timezone_set('Asia/Chongqing'); //ϵͳʱ���8Сʱ����
	$now = getdate(time()); 
	$cur_wday=$now['wday'];
	$date = date("Y-m-d H:i:s $cweekday[$cur_wday]"); 
	//echo $date;
   
  $addressee=$_GET["addressee"];
  $addresser=$_GET["addresser"];
  $results = new Message();
  ?>  

</td></tr>
<tr><td align=right bgcolor=#eeeeee>���ʱ�䣺</td><td>��</td><td align=left>
	<input type=text name=mtime value="<? echo $date; ?>" readonly size="24"></td></tr>
<tr><td align=right bgcolor=#eeeeee>�����ˣ�</td><td>��</td><td align=left>
<input type=text name=addresser value="<? echo $addresser; ?>" readonly size="24"></td></tr>
<tr><td align=right bgcolor=#eeeeee>�����ˣ�</td><td>��</td><td align=left>
<input type=text name=addressee value="<? echo $addressee; ?>" readonly size="24"></td></tr>
<tr><td align=right bgcolor=#eeeeee>���ݣ�</td><td>��</td>
<td align=left><textarea rows="2" name="adetail" cols="40"></textarea></td></tr>
<tr><td align=center colspan=3 bgcolor=#eeeeee height=30><input name=submit type=submit value=" ȷ �� "></td></tr>
<tr><td align=center colspan=3 bgcolor=#eeeeee>

</td></tr>
</table>
</form>
</center>
</body>
</html>
