<?PHP
//本类用于保存对表Favourite的数据库访问操作
//表的每个字段对应类的一个成员变量
class Favourite 
{
    public $UserId;		// 用户名
	public $GoodsId;	// 记录编号
	var $conn;

  function __construct() {
	// 连接数据库
	$this->conn = mysqli_connect("76.163.252.227:3306", "A929774_sec2hand", "Sec2hand", "A929774_secondhand"); 
	mysqli_query($this->conn, "SET NAMES gbk");
  }
		
  function __destruct() {
	// 关闭连接
	mysqli_close($this->conn);
  }
// 添加信息
  function insert()  {
    $sql = "INSERT INTO Favourite (UserId, GoodsId) VALUES ('" . $this->UserId. "'," . $this->GoodsId . ")";
	//执行SQL语句
	$this->conn->query($sql);
  }

  //获取收藏信息
  function GetFavouriteInfo($uid)
  {
    $sql="SELECT * FROM Favourite WHERE UserId='".$uid."'";
	$results = $this->conn->query($sql);
	return $results;
  } 
   // 批量删除信息
  function delete($cond) {
	$sql = "DELETE FROM Favourite ".$cond;
	$this->conn->query($sql);
  }
  
}
?>
