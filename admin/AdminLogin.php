<html>
<head>
<? session_start(); ?>
<link href=style.css rel=STYLESHEET type=text/css>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<body background = "images/背景.jpg">
<title>管理员</title>
</head>
<body>
             
<? 
  include('..\Class\Admin.php');
  //从Session变量中读取注册用户信息，并连接到数据库验证
  $obj = new Admin();
  $AdminId=trim(@$_SESSION["admin_id"]);
  $Pwd=trim(@$_SESSION["admin_pwd"]);
  //连接数据库，进行身份验证
  $obj->GetAdminInfo($AdminId);
  $flag=0;

  if($AdminId!="" && $obj->AdminPwd==$Pwd)
  {
?>
       <tr>
       <td width="100%" bgcolor="#97DDFF" height="18" align="center">管理员信息</td>
        </tr>
        <tr>
          <td width="100%" height="18" bgcolor="#E1F5FF">
            <table border="0" cellspacing="1" width="100%">
              <tr>
                <td width="100%" bgcolor="#E1F5FF">ID:<? echo($obj->AdminId); ?></td>         
              </tr> 
              <tr>
                <td width="100%" align="center" bgcolor="#E1F5FF">
                &nbsp;&nbsp;<a href="AdminUsers.php" target="_blank">所有用户</a>
                &nbsp;&nbsp;<a href="AdminGoods.php" target="_blank">所有商品</a>
                &nbsp;&nbsp;<a href='..\user\Messageview.php?uid=<?   echo($obj->AdminId); ?>' target="_blank">我的留言</a>
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
          <td width="100%" bgcolor="#9700FF" height="24" align="center">管理员登录</td>
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
                    <br>密码: 
                    <input type="password" name="password" size="18" value="">                            
                    <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="确定" name="B1">               
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