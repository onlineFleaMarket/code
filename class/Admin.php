<?PHP
//�������ڱ���Ա�Admin�����ݿ���ʲ���
//���ÿ���ֶζ�Ӧ���һ����Ա����
class Admin 
{
    public $AdminId;		// �û���
	public $AdminPwd;	// ����
	var $conn;

  function __construct() {
	// �������ݿ�
	$this->conn = mysqli_connect("76.163.252.227:3306", "A929774_sec2hand", "Sec2hand", "A929774_secondhand"); 
	mysqli_query($this->conn, "SET NAMES gbk");
  }

  function __destruct() {
	// �ر�����
	mysqli_close($this->conn);
  }

 // �ж�ָ���û����������Ƿ����
  function CheckAdmin()
  {
	//���ò�ѯ��SELECT���
    $sql="SELECT * FROM Admin WHERE AdminId='".$this->AdminId."' AND AdminPwd='".$this->AdminPwd."'";
	//�򿪼�¼��
    $results = $this->conn->query($sql);
    if($row = $results->fetch_row()) 
      $exist=true;
    else
      $exist=false;
    return $exist;
  } 
  
  //��ȡ������Ϣ
  function GetAdminInfo($aid)
  {
    $sql="SELECT * FROM Admin WHERE AdminId='".$aid."'";
	$results = $this->conn->query($sql);
	if($row = $results->fetch_row())  {
      $this->AdminId=$aid;
      $this->AdminPwd=$row[1];
    }
	else
	  $this->UserId = "";
  } 

  //��ȡ���и�����Ϣ�����ؽ����
  function GetUserslist()
  {
    //���ò�ѯ��SELECT���
    $sql="SELECT * FROM Users";
    //�򿪼�¼��
    $results = $this->conn->query($sql);
    return $results;
  } 
//��ȡ������Ʒ��Ϣ�����ؽ����
  function GetGoodslist()
  {
    //���ò�ѯ��SELECT���
    $sql="SELECT * FROM Goods";
    //�򿪼�¼��
    $results = $this->conn->query($sql);
    return $results;
  } 
 //��ȡ����������Ϣ�����ؽ����
  function GetMessagelist()
  {
    //���ò�ѯ��SELECT���
    $sql="SELECT * FROM Message";
    //�򿪼�¼��
    $results = $this->conn->query($sql);
    return $results;
  } 
}
?>
