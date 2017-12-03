<?php
//基础模型类
class Model
{
	protected $_dao;//存储DAO对象的属性，可以在子类方法中被访问，使用DAO对象
    //初始化DAO
    //初始化mysqldb
    protected function _initDAO()
    {
    	 $config = array
     (
     'host'=>'localhost',
     'port'=>'3306',
     'username'=>'root',
     'password'=>'',
     'charset'=>'utf8',
     'dbname'=>'project1',
     );
     //include_once __DIR__.DS.'mysqldb_class.php';
     //$dao,Database Access Object 数据库操作对象（dao层，mysqldb）
     $this->_dao = MySQLDB::getInstance($config);
    }

    //构造方法
    public function __construct()
    {
    	//DAO
    	$this->_initDAO();
    }
}