<html>
<head>
<title>编辑商品</title>
<link href=../style.css rel=STYLESHEET type=text/css>
<Script Language="JavaScript">
//域校验
function CheckFlds(){
  if (document.form1.aname.value==""){
   alert("请输入拍卖品名称！");
   form1.aname.focus;
   return false;
  }
  var a,b;
  a = document.form1.atype.selectedIndex;
  if(document.form1.atype.value ==0){
    if (form1.anum.value!=1 ){
      alert("竞价拍卖的拍卖数量必须为1！");
      form1.anum.value = 1;
      return false;
    }
  }
  return true;
}
</Script>
</head>
<body>
<? 
  include('..\Class\Goods.php');
  $gid=intval($_GET["gid"]);
  $obj = new Goods();
  $obj->GetGoodsInfo($gid);
  //读取卖家信息
  include('..\Class\Users.php');
  $objUser = new Users();
  $objUser->GetUsersInfo($obj->OwnerId);
  //读取商品类型
  include('..\Class\GoodsType.php');
  $objType = new GoodsType();
  $objType->GetGoodsTypeInfo($obj->TypeId);
?>

<form action="GoodsSave.php?flag=<? echo($obj->SaleOrBuy-1); ?>&action=edit&gid=<? echo($gid); ?>" method=post name=form1 onsubmit="return CheckFlds()">
<center>
<table align=center cellpadding=0 cellspacing=0 width=90% border=1 bordercolorlight="#4DA6FF" bordercolordark="#ECF5FF">
<tr><td align=center width=100% colspan=3 bgcolor=#eeeeee height=28><font color=#0000ff>
	编辑商品信息</font></td></tr>
<tr><td align=right width=25% bgcolor=#eeeeee>商品名称：</td><td>　</td><td align=left><input type=text name=aname value=<? echo($obj->GoodsName); ?>></td></tr>
<tr><td align=right bgcolor=#eeeeee>所 有 者：</td><td>　</td><td align=left><input type=text name=ownerid value=<? echo($objUser->Name); ?> readonly></td></tr>
<tr><td align=right bgcolor=#eeeeee>所属分类：</td><td>　</td><td align=left>
<select size="1" name="typeid">
<? 
  $tid=intval($_POST["tid"]);
  $objType1 = new GoodsType();
  $results = $objType1->GetGoodsTypelist();
  while($row = $results->fetch_row())
  {
?><option value="<?   echo($row[0]); ?>" <?   if($row[0]==$objGoods->TypeId)
  {
?> selected <?   } ?>><?   echo($row[1]); ?></option>  
 <?  } ?>  
</select>
</td></tr>
<tr><td align=right bgcolor=#eeeeee>添加时间：</td><td>　</td><td align=left>
	<input type=text name=stime value="<? echo($obj->StartTime); ?>" readonly size="24"></td></tr>
<tr><td align=right bgcolor=#eeeeee>商品价格：</td><td>　</td><td align=left><input type=text name=sprice value="<? echo($obj->Price); ?>"></td></tr>
<tr><td align=right bgcolor=#eeeeee>新旧程度：</td><td>　</td><td align=left><input type=text name=oldnew value="<? echo($obj->OldNew); ?>"></td></tr>
<tr><td align=right bgcolor=#eeeeee>保　　修：</td><td>　</td><td align=left><input type=text name=repaired value="<? echo($obj->Repaired); ?>"> </td></tr>
<tr><td align=right bgcolor=#eeeeee>发　　票：</td><td>　</td><td align=left><input type=text name=invoice value="<? echo($obj->Invoice); ?>"> </td></tr>
<tr><td align=right bgcolor=#eeeeee>运　　费：</td><td>　</td><td align=left><input type=text name=carriage value="<? echo($obj->Carriage); ?>"></td></tr>
<tr><td align=right bgcolor=#eeeeee>支付方式：</td><td>　</td><td align=left><input type=text name=pmode value="<? echo($obj->PayMode); ?>"></td></tr>
<tr>
	<td align=right bgcolor=#eeeeee>送货方式：</td><td>　</td><td align=left><input type=text name=dmode value="<? echo($obj->DeliverMode); ?>"></td>
</tr>
<tr><td align=right bgcolor=#eeeeee>商品描述：</td><td>　</td>
<td align=left><textarea rows="2" name="adetail" cols="40"><? echo($obj->GoodsDetail); ?></textarea></td></tr>
<tr><td align=center colspan=3 bgcolor=#eeeeee height=30><input name=submit type=submit value=" 确 定 "></td></tr>
</table>
</form>
</center>
</body>
</html>
