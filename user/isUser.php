<?
  session_start();
?>
<? 
  //��Session�����ж�ȡע���û���Ϣ�������ӵ����ݿ���֤
  include('..\Class\Users.php');
  $UserName=trim($_SESSION["user_id"]);
  $Pwd=trim($_SESSION["user_pwd"]);
  //����û���Ϊ�գ�����ʾ��ʾ��Ϣ
  if($UserName=="")
  {
    exit("���¼����ʹ�ã�");
  }
  else
  {
    //�������ݿ⣬���������֤
    $obj = new Users();
    $obj->UserId=trim($_SESSION["user_id"]);
    $obj->UserPwd=trim($_SESSION["user_pwd"]);
    if (!$obj->CheckUser())
    {
      exit("���¼��ʹ�ñ�ϵͳ��");
    } 
  } 
?>

