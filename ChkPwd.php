<?
  session_start();
  //�����δ����Passed�������䶨��ΪFalse����ʾû��ͨ�������֤
  if(empty($_SESSION["Passed"])
  {
    $_SESSION["Passed"]=false;
  } 
  //���UserName�ǿգ���ת��login.htm
  if($_SESSION["Passed"]==false)
  {
    //��ȡ�ӱ����ݹ������������
    $UserName=$_POST["UserName"];
    $UserPwd=$_POST["UserPwd"];
    if($UserName=="")
    {
      $Errmsg="�������û���������";
    }
    else
    {
      //============�ӱ�Users�ж�ȡ�û�����==============
$ActiveConnection    echo $Conn;
//�����α�����
    $rs.$CursorType=3;
//�򿪼�¼��
    $rs.$Open"SELECT * FROM Users WHERE UserName='".trim($UserName)."'";
//=============�����֤===========================
    if ($rs$EOF)
    {

      $Errmsg="�û�������";
    }
      else
    {

      if ($UserPwd!=$rs$Fields["UserPwd"])
      {

        $Errmsg="���벻��ȷ";
      }
        else
      {
//��¼�ɹ�	      
        $Errmsg="";
        $Passed_session=true;
        $UserName_session=$rs.$Fields["UserName"];
        $UserPwd_session=$rs.$Fields["UserPwd"];
//	      Response.Write("��¼�ɹ��������<a href=index.asp>��ҳ</a>")	      
      } 

    } 

  } 

} 


if (!$Passed_session)
{

?>
<HTML>
<HEAD><TITLE>�������û���������</TITLE><link rel="stylesheet" href="style.css">
</HEAD>
<BODY>

<script Language="JavaScript">
function ChkFields() {
if (document.MyForm.UserName.value=='') {
window.alert ("�������û�����")
return false
}
return true
}
</script>

<p align="center"><font color="#0000FF" size="5" face="����">�� �� �� ֤</font></p> 

<p align="center"><font color="#800000">��<?   echo $Errmsg; ?></font></p>
<form method="POST" action="<?   echo ${"PATH_INFO"}; ?>" name="MyForm" onsubmit ="return ChkFields()">
  <p align="center">�û�����&nbsp; <input type="text" name="UserName" size="20"></p>
  <p align="center">��&nbsp; �룺&nbsp; <input type="password" name="UserPwd" size="20"></p>
  <p align="center"><input type="submit" value="�ύ" name="B1">&nbsp;&nbsp;<input type="reset" value="ȫ����д" name="B2"></p>
</form>
<p align="center">��</p>

</BODY>
</HTML>
<? 
  exit();

} 

?>
