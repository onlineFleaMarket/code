<?PHP
//�������ڱ���Ա�GoodsType�����ݿ���ʲ���
//���ÿ���ֶζ�Ӧ���һ����Ա����
class GoodsType
{
  public $TypeId; // ��Ƭ���ͱ��
  public $TypeName; // ��Ƭ��������
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
  function GetGoodsTypeInfo($id)
  {
    //���ò�ѯ��SELECT���
    $sql="SELECT * FROM GoodsType WHERE TypeId=".$id;
    //�򿪼�¼��
    $results = $this->conn->query($sql);
    //��ȡ��������
    if($row = $results->fetch_row())
    {
      $this->TypeId=$id;
      $this->TypeName=$row[1];
    } 
    else
    {
      $TypeId="";
    }
  }

  //��ȡ���з�����Ϣ�����ؽ����
  function GetGoodsTypelist()
  {
    //���ò�ѯ��SELECT���
    $sql="SELECT * FROM GoodsType";
    //�򿪼�¼��
    $results = $this->conn->query($sql);
    return $results;
  } 

  // �ж�ָ����Ʒ�����Ƿ����
  function HaveGoodsType($name)
  {
	//���ò�ѯ��SELECT���
    $sql="SELECT * FROM GoodsType WHERE TypeName='" . $name . "'";
	//�򿪼�¼��
	$results = $this->conn->query($sql);
	if($row = $results->fetch_row()) 
  	  $exist = true;
	else
	  $exist = false;
	return $exist;
  } 

  //��ӷ�����Ϣ
  function insert()
  {
    $sql="INSERT INTO GoodsType (TypeName) VALUES ('".$this->TypeName."')"; 
    //ִ��SQL���
	$results = $this->conn->query($sql);
  } 

  //�޸ķ�����Ϣ
  function update($id)
  {
    $sql="UPDATE GoodsType SET TypeName='".$this->TypeName."' WHERE TypeId="
    .$id;
    //ִ��SQL���
	$results = $this->conn->query($sql);
  } 

  //ɾ��������Ϣ
  function delete($id)
  {
    $sql="DELETE FROM GoodsType WHERE TypeId IN (".$id.")";
    //ִ��SQL���
	$results = $this->conn->query($sql);
  } 
}
?>
