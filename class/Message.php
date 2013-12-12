<?PHP
//本类用于保存留言信息

class Message  
{
    public $messageid;		// 留言编号
	public $addresser;	// 发件人
	public $addressee;		// 收件人
	public $mtime;		// 时间
	public $content;	// 内容
	var $conn;

  function __construct() {
	// 连接数据库
	$this->conn = mysqli_connect("localhost", "root", "", "secondhand"); 
	mysqli_query($this->conn, "SET NAMES gbk");
  }
		
  function __destruct() {
	// 关闭连接
	mysqli_close($this->conn);
  }
		
//获取留言信息		
  function GetMessagelist($cond)  {
	// 设置查询的SELECT语句
	$sql = "SELECT * FROM Message" . $cond ;
	//打开记录集
	$results = $this->conn->query($sql);
	return $results;
  }

  
  
  //添加留言
  function insert()  {
    $sql = "INSERT INTO message (messageid, addresser, addressee, mtime, content) VALUES ('" . $this->messageid . "','" . $this->addresser . "','" . $this->addressee . "','" . $this->mtime . "','" . $this->content . "')";
	//执行SQL语句
	$this->conn->query($sql);
  }

  //删除留言
  function delete($mid)
  {
    $sql="DELETE FROM Message WHERE messageid='".$mid."'";
	$this->conn->query($sql);
  } 
}
?>