<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��ҳ</title>
</head>
<body>
             
<? 
  include('Class\Users.php');
  //��Session�����ж�ȡע���û���Ϣ�������ӵ����ݿ���֤
  $objUser = new Users();
  $UserId=trim(@$_SESSION["user_id"]);
  $Pwd=trim(@$_SESSION["user_pwd"]);
  //�������ݿ⣬���������֤
  $objUser->GetUsersInfo($UserId);
  $_SESSION["user_name"]=$objUser->Name;
  $flag=0;
  if($UserId!="" && $objUser->UserPwd==$Pwd)
  {
?>
       <tr>
       <td width="100%" bgcolor="#97DDFF" height="18" align="center">�û���Ϣ</td>
        </tr>
        <tr>
          <td width="100%" height="18" bgcolor="#E1F5FF">
            <table border="0" cellspacing="1" width="100%">
              <tr>
                <td width="100%" bgcolor="#E1F5FF">�û���:<? echo($objUser->UserId); ?><br>    
                E-mail��<?   echo($objUser->Email); ?><Br>��ϵ��ʽ��<?   echo($objUser->Telephone); ?>
				</td>         
              </tr> 
              <tr>
                <td width="100%" align="center" bgcolor="#E1F5FF">
                <a href='user\UserEdit.php?uid=<?   echo($objUser->UserId); ?>' target="_blank">�޸�����</a>
                &nbsp;&nbsp;<a href='user\UserView.php?uid=<?   echo($objUser->UserId); ?>' target="_blank">�ҵ���Ʒ</a>
                &nbsp;&nbsp;<a href='user\Messageview.php?uid=<?   echo($objUser->UserId); ?>' target="_blank">�ҵ�����</a>
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
          <td width="100%" bgcolor="#9700FF" height="24" align="center">�û���¼</td>
        </tr>         
        <tr>         
          <td width="100%" height="18" bgcolor="#E1F5FF">         
            <table border="0" cellspacing="1" height="58">         
              <tr>         
                <td width="100%" bgcolor="#E1F5FF" height="35">         
                  <form method="POST" action="putSession.php">         
                    �û���: 
                    <input type="text" name="loginname" size="18" value="">         
                    <br>��&nbsp; ��: 
                    <input type="password" name="password" size="18" value="">                            
                    <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="ȷ��" name="B1">
                    &nbsp;&nbsp;
                    <a href="user/UserAdd.php"  target=_blank>�û�ע��</a>                           
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
