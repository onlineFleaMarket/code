<?PHP
//�������ڱ���������Ϣ

class Message  
{
    public $messageid;		// ���Ա��
	public $addresser;	// ������
	public $addressee;		// �ռ���
	public $mtime;		// ʱ��
	public $content;	// ����
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
		
//��ȡ������Ϣ		
  function GetMessagelist($cond)  {
	// ���ò�ѯ��SELECT���
	$sql = "SELECT * FROM Message" . $cond ;
	//�򿪼�¼��
	$results = $this->conn->query($sql);
	return $results;
  }

  
  
  //�������
  function insert()  {
    $sql = "INSERT INTO message (messageid, addresser, addressee, mtime, content) VALUES ('" . $this->messageid . "','" . $this->addresser . "','" . $this->addressee . "','" . $this->mtime . "','" . $this->content . "')";
	//ִ��SQL���
	$this->conn->query($sql);
  }

  //ɾ������
  function delete($mid)
  {
    $sql="DELETE FROM Message WHERE messageid='".$mid."'";
	$this->conn->query($sql);
  } 
}
?>