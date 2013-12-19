<?PHP
//本类用于保存对表Admin的数据库访问操作
//表的每个字段对应类的一个成员变量
class Admin 
{
    public $AdminId;		// 用户名
	public $AdminPwd;	// 密码
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

 // 判断指定用户名和密码是否存在
  function CheckAdmin()
  {
	//设置查询的SELECT语句
    $sql="SELECT * FROM Admin WHERE AdminId='".$this->AdminId."' AND AdminPwd='".$this->AdminPwd."'";
	//打开记录集
    $results = $this->conn->query($sql);
    if($row = $results->fetch_row()) 
      $exist=true;
    else
      $exist=false;
    return $exist;
  } 
  
  //获取个人信息
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

  //获取所有个人信息，返回结果集
  function GetUserslist()
  {
    //设置查询的SELECT语句
    $sql="SELECT * FROM Users";
    //打开记录集
    $results = $this->conn->query($sql);
    return $results;
  } 
//获取所有商品信息，返回结果集
  function GetGoodslist()
  {
    //设置查询的SELECT语句
    $sql="SELECT * FROM Goods";
    //打开记录集
    $results = $this->conn->query($sql);
    return $results;
  } 
 //获取所有留言信息，返回结果集
  function GetMessagelist()
  {
    //设置查询的SELECT语句
    $sql="SELECT * FROM Message";
    //打开记录集
    $results = $this->conn->query($sql);
    return $results;
  } 
}
?>
