<?PHP
//�������ڱ���Ա�Favourite�����ݿ���ʲ���
//���ÿ���ֶζ�Ӧ���һ����Ա����
class Favourite 
{
    public $UserId;		// �û���
	public $GoodsId;	// ��¼���
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
// �����Ϣ
  function insert()  {
    $sql = "INSERT INTO Favourite (UserId, GoodsId) VALUES ('" . $this->UserId. "'," . $this->GoodsId . ")";
	//ִ��SQL���
	$this->conn->query($sql);
  }

  //��ȡ�ղ���Ϣ
  function GetFavouriteInfo($uid)
  {
    $sql="SELECT * FROM Favourite WHERE UserId='".$uid."'";
	$results = $this->conn->query($sql);
	return $results;
  } 
   // ����ɾ����Ϣ
  function delete($cond) {
	$sql = "DELETE FROM Favourite ".$cond;
	$this->conn->query($sql);
  }
  
}
?>
