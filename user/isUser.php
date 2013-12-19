<?
  session_start();
?>
<? 
  //从Session变量中读取注册用户信息，并连接到数据库验证
  include('..\Class\Users.php');
  $UserName=trim($_SESSION["user_id"]);
  $Pwd=trim($_SESSION["user_pwd"]);
  include('..\Class\Admin.php');
  $AdminName=trim($_SESSION["admin_id"]);
  $Pwd2=trim($_SESSION["admin_pwd"]);
    
  //如果用户名为空，则显示提示信息
  if($UserName==""&&$AdminName=="")
  {
    exit("请登录后再使用！");
  }
  else
  {
    //连接数据库，进行身份验证
    $flag1 = 0;
    $flag2 = 0;
    $obj = new Users();
    $obj->UserId=trim($_SESSION["user_id"]);
    $obj->UserPwd=trim($_SESSION["user_pwd"]);
    if (!$obj->CheckUser())
    {
       $flag1=1;
    } 
    
    $obj2 = new Admin();
    $obj2->AdminId=trim($_SESSION["admin_id"]);
    $obj2->AdminPwd=trim($_SESSION["admin_pwd"]);
    if (!$obj2->CheckAdmin())
    {
       $flag2=1;
    } 
    if($flag1=0&&$flag2=0)
    	exit("请登录后使用本系统！");
  } 
?>

