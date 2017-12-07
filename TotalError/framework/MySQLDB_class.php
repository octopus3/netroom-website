<?php
//类名，也习惯上（推荐）使用跟文件名 相似的名字
//定义一个类，该类可以连接mysql数据库
//并实现单利模式
//该类功能还能够完成如下基本sql操作
//执行普通的增删改非返回结果集的语句
//执行select语句并可以返回三种类型的数据
//多行结果（二维数组），单行结果（一维数组）
//单行单列（单个数据）
//并返回连接后的资源（或失败就要终止）
//mysql_connect("localhost:8088","root",'1234abcd');
//mysql_query("set names utf8");
//mysql_query("use XXX");
class MySQLDB
{
    public $host;
    public $port;
    public $username;
    public $password;
    public $charset;
    public $dbname;

    //连接结果（资源）
    private static $link;

    private $resourc;

    public static function getInstance($config)
    {
        if(!isset(self::$link))
        {
            self::$link = new self($config );// 相当于new mysqlDB($config)
        }
        return self::$link;
    }
    //new self 可以理解为执行__construct

    //构造函数:进制new
    //构造函数不需要返回值，它要赋值给self::link
    private function __construct($config)
    {
    	//初始化数据
    	$this->host = isset($config['host']) ? $config['host']:'localhost';
    	$this->port = isset($config['port']) ? $config['port']:'3306';
    	$this->username = isset($config['username']) ? $config['username']:'root';
    	$this->password = isset($config['password']) ? $config['password']:'';
    	$this->charset = isset($config['charset']) ? $config['charset']:'utf8';
    	$this->dbname = isset($config['dbname']) ? $config['dbname']:'';
        //连接数据库
    	self::$link = $this->connect();
    	//设定连接编码
    	$this->setCharset($this->charset);
    	//选定数据库
    	$this->selectDb($this->dbname);
    }
    //禁止克隆
    private function __clone()
    {

    }
    //这里进行连接
    public function connect()
    {
    	$this->resourc = mysqli_connect("$this->host:$this->port","$this->username","$this->password") or die("failed to connect database!");
    }
    public function setCharset($charset)
    {
    	//mysqli_set_charset($this->resourc,$charset);
        $this->query("set names $charset;");
         

    }
    public function selectDb($dbname)
    {
    	//mysqli_select_db($this->resourc,$dbname);
        $this->query("use $dbname;") or die('数据库选择失败！');
    }
    /*功能：执行最基本（任何）sql语句
    返回：如果失败直接结束，如果成功，返回执行结果
    */
    public function query($sql)
    {
       if(!$result = mysqli_query($this->resourc,$sql))
       {
         echo "<br/>执行失败！";
         echo "<br/>失败的sql语句为：" . $sql;
         echo "<br/>出错信息为：".mysql_error();
         echo "<br/>错误代号为：".mysql_errno();
        die();
       } 
       return $result; 
    }
    /*功能：执行select语句，返回二维数组
    参数：$sql字符串类型 select语句*/
    public function getAll($sql)
    {
        $result = $this->query($sql);
        $arr = array();//空数组
        while($rec = mysqli_fetch_assoc($result))
        {
            $arr[]=$rec;
        }
        return $arr;
    }
    //返回一行数据（作为一维数组）
    public function getRow($sql)
    {
         $result = $this->query($sql);
        //$arr = array();//空数组
        if($rec2 = mysqli_fetch_assoc($result))//返回下标为字段名的数组
        {
            //如果fetch出来有数据（也就是取得了一行数据），结果自然是数组
            return $rec2;
        }
        return false;
    }
    //返回一个数据（select语句的第一行第一列）
    //比如常见的：select count(*) as c from XXX where ...
    public function getOne($sql)
    {
        $result = $this->query($sql);
        $rec = mysqli_fetch_row($result);//返回下标为数字的数组，且下标一定是0,1,2,3 .... 
        //如果没有数据，返回false
        if ($result == false) 
        {
            return false;
        }
        return $rec[0];//该数组的第一项
    }

}
