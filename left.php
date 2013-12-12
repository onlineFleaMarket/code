<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>首页</title>
</head>
<body>
             
<? 
  include('Class\Users.php');
  //从Session变量中读取注册用户信息，并连接到数据库验证
  $objUser = new Users();
  $UserId=trim(@$_SESSION["user_id"]);
  $Pwd=trim(@$_SESSION["user_pwd"]);
  //连接数据库，进行身份验证
  $objUser->GetUsersInfo($UserId);
  $_SESSION["user_name"]=$objUser->Name;
  $flag=0;
  if($UserId!="" && $objUser->UserPwd==$Pwd)
  {
?>
       <tr>
       <td width="100%" bgcolor="#97DDFF" height="18" align="center">用户信息</td>
        </tr>
        <tr>
          <td width="100%" height="18" bgcolor="#E1F5FF">
            <table border="0" cellspacing="1" width="100%">
              <tr>
                <td width="100%" bgcolor="#E1F5FF">用户名:<? echo($objUser->UserId); ?><br>    
                E-mail：<?   echo($objUser->Email); ?><Br>联系方式：<?   echo($objUser->Telephone); ?>
				</td>         
              </tr> 
              <tr>
                <td width="100%" align="center" bgcolor="#E1F5FF">
                <a href='user\UserEdit.php?uid=<?   echo($objUser->UserId); ?>' target="_blank">修改资料</a>
                &nbsp;&nbsp;<a href='user\UserView.php?uid=<?   echo($objUser->UserId); ?>' target="_blank">我的商品</a>
                &nbsp;&nbsp;<a href='user\Messageview.php?uid=<?   echo($objUser->UserId); ?>' target="_blank">我的留言</a>
				&nbsp;&nbsp;<a href="LoginExit.php" onclick="return newswin(this.href)">退出登录</a>
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
          <td width="100%" bgcolor="#9700FF" height="24" align="center">用户登录</td>
        </tr>         
        <tr>         
          <td width="100%" height="18" bgcolor="#E1F5FF">         
            <table border="0" cellspacing="1" height="58">         
              <tr>         
                <td width="100%" bgcolor="#E1F5FF" height="35">         
                  <form method="POST" action="putSession.php">         
                    用户名: 
                    <input type="text" name="loginname" size="18" value="">         
                    <br>密&nbsp; 码: 
                    <input type="password" name="password" size="18" value="">                            
                    <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="确定" name="B1">
                    &nbsp;&nbsp;
                    <a href="user/UserAdd.php"  target=_blank>用户注册</a>                           
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
