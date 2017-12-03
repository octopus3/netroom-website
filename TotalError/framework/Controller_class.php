<?php
//基础控制器类
class Controller
{
	//构造方法来调用
	public function __construct()//实例化对象的时候就会执行它
	{
		$this->_initContentType();
	}
	//初始化Content-Type
	//init表示初始化
	public function _initContentType()
	{
        header('Content-type: text/html; charset=utf-8');
	}
}