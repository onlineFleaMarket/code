<?
  session_start();
?>
<? 
  //��Session�����ж�ȡע���û���Ϣ�������ӵ����ݿ���֤
  include('..\Class\Users.php');
  $UserName=trim($_SESSION["user_id"]);
  $Pwd=trim($_SESSION["user_pwd"]);
  include('..\Class\Admin.php');
  $AdminName=trim($_SESSION["admin_id"]);
  $Pwd2=trim($_SESSION["admin_pwd"]);
    
  //����û���Ϊ�գ�����ʾ��ʾ��Ϣ
  if($UserName==""&&$AdminName=="")
  {
    exit("���¼����ʹ�ã�");
  }
  else
  {
    //�������ݿ⣬���������֤
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
    	exit("���¼��ʹ�ñ�ϵͳ��");
  } 
?>

