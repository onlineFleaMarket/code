<html>
<head>
<? session_start(); ?>
<link href=style.css rel=STYLESHEET type=text/css>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<body background = "images/����.jpg">
<title>����Ա</title>
</head>
<body>
             
<? 
  include('..\Class\Admin.php');
  //��Session�����ж�ȡע���û���Ϣ�������ӵ����ݿ���֤
  $obj = new Admin();
  $AdminId=trim(@$_SESSION["admin_id"]);
  $Pwd=trim(@$_SESSION["admin_pwd"]);
  //�������ݿ⣬���������֤
  $obj->GetAdminInfo($AdminId);
  $flag=0;

  if($AdminId!="" && $obj->AdminPwd==$Pwd)
  {
?>
       <tr>
       <td width="100%" bgcolor="#97DDFF" height="18" align="center">����Ա��Ϣ</td>
        </tr>
        <tr>
          <td width="100%" height="18" bgcolor="#E1F5FF">
            <table border="0" cellspacing="1" width="100%">
              <tr>
                <td width="100%" bgcolor="#E1F5FF">ID:<? echo($obj->AdminId); ?></td>         
              </tr> 
              <tr>
                <td width="100%" align="center" bgcolor="#E1F5FF">
                &nbsp;&nbsp;<a href="AdminUsers.php" target="_blank">�����û�</a>
                &nbsp;&nbsp;<a href="AdminGoods.php" target="_blank">������Ʒ</a>
                &nbsp;&nbsp;<a href='..\user\Messageview.php?uid=<?   echo($obj->AdminId); ?>' target="_blank">�ҵ�����</a>
				&nbsp;&nbsp;<a href="LoginExit.php" onclick="return newswin(this.href)">�˳���¼</a>
                </td>         
              </tr>     
            </table>         
          </td>         
        </tr> 
     <? }
  else
{
?>
        <tr>         
          <td width="100%" bgcolor="#9700FF" height="24" align="center">����Ա��¼</td>
        </tr>         
        <tr>         
        <?echo($AdminId);
  		echo($Pwd);?> 
          <td width="100%" height="18" bgcolor="#E1F5FF">         
            <table border="0" cellspacing="1" height="58">         
              <tr>         
                <td width="100%" bgcolor="#E1F5FF" height="35">         
                  <form method="POST" action="putSession.php">         
                   I&nbsp; D: 
                    <input type="text" name="loginname" size="18" value="">         
                    <br>����: 
                    <input type="password" name="password" size="18" value="">                            
                    <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="ȷ��" name="B1">               
                  </form>         
                </td>         
              </tr>         
            </table>         
          </td>         
        </tr>         
      <? } ?>  
      </table>
	   

	  </body>
</html>