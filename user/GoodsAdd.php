<?PHP include('isUser.php'); ?>
<?PHP
  //session_start();
?>
<html>
<head>
<title>�����Ʒ</title>
<link href=../style.css rel=STYLESHEET type=text/css>
<Script Language="JavaScript">
//��У��
function CheckFlds(){
  if (document.form1.aname.value==""){
   alert("��������Ʒ���ƣ�");
   form1.aname.focus;
   return false;
  }
  var a,b;
  a = document.form1.atype.selectedIndex;
  if(document.form1.atype.value ==0){
    if (form1.anum.value!=1 ){
      alert("����������������������Ϊ1��");
      form1.anum.value = 1;
      return false;
    }
  }
  return true;
}
</Script>
</head>
<body>
<form action="GoodsSave.php?flag=<? echo($_GET["flag"]);; ?>" method=post name=form1 onsubmit="return CheckFlds()">
<center>
<table align=center cellpadding=0 cellspacing=0 width=90% border=1 bordercolorlight="#4DA6FF" bordercolordark="#ECF5FF">
<tr><td align=center width=100% colspan=3 bgcolor=#eeeeee height=28><font color=#0000ff>
	�����Ʒ��Ϣ</font></td></tr>
<tr><td align=right width=25% bgcolor=#eeeeee>��Ʒ���ƣ�</td><td>��</td><td align=left><input type=text name=aname></td></tr>
<tr><td align=right bgcolor=#eeeeee>�� �� �ߣ�</td><td>��</td><td align=left><input type=text readonly name=ownerid value=<? echo($_SESSION["user_name"]); ?>></td></tr>
<tr><td align=right bgcolor=#eeeeee>�������ࣺ</td><td>��</td><td align=left>
<select size="1" name="typeid">
<?
  include('..\Class\GoodsType.php');
  
  	date_default_timezone_set('Asia/Chongqing'); //ϵͳʱ���8Сʱ����
	$now = getdate(time()); 
	$cur_wday=$now['wday'];
	$date = date("Y-m-d H:i:s $cweekday[$cur_wday]"); 
	//echo $date;
   
  $tid=intval($_GET["tid"]);
  $obj = new GoodsType();
  $results = $obj->GetGoodsTypelist();
  while($row = $results->fetch_row())
  {
?><option value="<?   echo($row[0]); ?>" <?   if ($row[0]==$tid)
  {
?> selected <?   } ?>><?   echo($row[1]); ?></option>  
  <?   } ?>  
</select>
</td></tr>
<tr><td align=right bgcolor=#eeeeee>���ʱ�䣺</td><td>��</td><td align=left>
	<input type=text name=stime value="<? echo $date; ?>" readonly size="24"></td></tr>
<tr><td align=right bgcolor=#eeeeee>��Ʒ�۸�</td><td>��</td><td align=left><input type=text name=sprice></td></tr>
<tr><td align=right bgcolor=#eeeeee>�¾ɳ̶ȣ�</td><td>��</td><td align=left><input type=text name=oldnew></td></tr>
<tr><td align=right bgcolor=#eeeeee>�������ޣ�</td><td>��</td><td align=left><input type=text name=repaired> </td></tr>
<tr><td align=right bgcolor=#eeeeee>������Ʊ��</td><td>��</td><td align=left><input type=text name=invoice> </td></tr>
<tr><td align=right bgcolor=#eeeeee>�ˡ����ѣ�</td><td>��</td><td align=left><input type=text name=carriage></td></tr>
<tr><td align=right bgcolor=#eeeeee>֧����ʽ��</td><td>��</td><td align=left><input type=text name=pmode></td></tr>
<tr>
	<td align=right bgcolor=#eeeeee>�ͻ���ʽ��</td><td>��</td><td align=left><input type=text name=dmode></td>
</tr>
<tr><td align=right bgcolor=#eeeeee>ͼƬ�ļ���</td><td>��</td><td align=left>
	<input type=text name=goodsimage></td></tr>
<tr><td align=right bgcolor=#eeeeee>��Ʒ������</td><td>��</td>
<td align=left><textarea rows="2" name="adetail" cols="40"></textarea></td></tr>
<tr><td align=center colspan=3 bgcolor=#eeeeee height=30><input name=submit type=submit value=" ȷ �� "></td></tr>
<tr><td align=center colspan=3 bgcolor=#eeeeee>
<iframe frameborder="0" height="40" width="100%" scrolling="no" src="upload.php" ></iframe>
<input type="hidden" name="upimage">
</td></tr>
</table>
</form>
</center>
</body>
</html>
