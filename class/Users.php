<?PHP
//�������ڱ���Ա�Users�����ݿ���ʲ���
//���ÿ���ֶζ�Ӧ���һ����Ա����
class Users  
{
        public $UserId;		// �û���
	public $UserPwd;	// ����
	public $Name;		// ����
	public $Sex;		// �Ա�
	public $Address;	// ��ַ
	public $Number;   // ѧ��
	public $Email;		// �����ʼ�
	public $Telephone;	// �绰
	public $Dorm;       //��Ԣ
	public $UserType;	// �û�����
	var $conn;

  function __construct() {
	// �������ݿ�
	$this->conn = mysqli_connect("localhost", "root", "", "secondhand"); 
	mysqli_query($this->conn, "SET NAMES gbk");
  }
		
  function __destruct() {
	// �ر�����
	mysqli_close($this->conn);
  }


  //��ȡ������Ϣ
  function GetUsersInfo($uid)
  {
    $sql="SELECT * FROM Users WHERE UserId='".$uid."'";
	$results = $this->conn->query($sql);
	if($row = $results->fetch_row())  {
      $this->UserId=$uid;
      $this->UserPwd=$row[1];
      $this->Name=$row[2];
      $this->Sex=$row[3];
      $this->Number=$row[4];
      $this->Dorm = $row[5];
      $this->Email=$row[6];
      $this->Telephone=$row[7];
      $this->UserType=$row[8];
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

  function GetTopnActiveUser($n)
  {
	//���ò�ѯ��SELECT���
	$sql="SELECT u.UserId, u.Name, Count(g.GoodsId) AS cc "
    ." FROM Users u INNER JOIN Goods g ON u.UserId=g.OwnerId "
    ." GROUP BY u.UserId, u.Name "
    ." ORDER BY Count(g.GoodsId) DESC LIMIT 0," . $n;
    //�򿪼�¼��
    $results = $this->conn->query($sql);
    return $results;
  } 

  // �ж�ָ���û����Ƿ����
  function HaveUsers($uid)
  {
	//���ò�ѯ��SELECT���
    $sql="SELECT * FROM Users WHERE UserId='".$uid."'";
    //�򿪼�¼��
    $results = $this->conn->query($sql);
    if($row = $results->fetch_row()) 
      $exist=true;
    else
      $exist=false;
    return $exist;
  } 

  // �ж�ָ���û����������Ƿ����
  function CheckUser()
  {
	//���ò�ѯ��SELECT���
    $sql="SELECT * FROM Users WHERE UserId='".$this->UserId."' AND UserPwd='".$this->UserPwd."'";
	//�򿪼�¼��
    $results = $this->conn->query($sql);
    if($row = $results->fetch_row()) 
      $exist=true;
    else
      $exist=false;
    return $exist;
  } 

  //��Ӹ�����Ϣ
  function insert()
  {
    $sql="INSERT INTO Users VALUES ('" . $this->UserId . "','" . $this->UserPwd
     . "','" . $this->Name . "'," . $this->Sex . ",'" . $this->Number . "','" . $this->Dorm . "','" . $this->Email . "','" . $this->Telephone . "'," . $this->UserType . ")";
	//ִ��SQL���
	$this->conn->query($sql);
  } 

  //�޸ĸ�����Ϣ
  function update($uid)
  {
    $sql="UPDATE Users SET UserPwd='" . $this->UserPwd . "', Name='" . $this->Name . "', Sex=" . $this->Sex . ", Number='" . $this->Number . "', Dorm='" . $this->Dorm . "', Email='" . $this->Email . "', Telephone='" . $this->Telephone . "' WHERE UserId='" . $uid . "'";
	//ִ��SQL���
	$this->conn->query($sql);
  } 

  function setpwd($uid)
  {
    $sql="UPDATE Users SET UserPwd='" . $this->UserPwd . "' WHERE UserId='" . $uid . "'";
	$this->conn->query($sql);
  } 

  //ɾ��������Ϣ
  function delete($uid)
  {
    $sql="DELETE FROM Users WHERE UserId='".$uid."'";
	$this->conn->query($sql);
  } 
}
?>
