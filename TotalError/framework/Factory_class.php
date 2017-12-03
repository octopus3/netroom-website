<?php

//项目中的工厂类
class Factory
{
	/*
	生成模型的单例对象

	@param $model_name string
	@return obect
	*/
	public static function M($model_name)
	{
		static $model_list = array();
		//存储已经实例化好的模型对象的列表，下标模型名，值模型对象
		//判断当前模型是否已经实例化
		if(!isset($model_list[$model_name]))
		{
			//没有实例化过
			//require dirname(__DIR__).DS.'application'.DS.PLATFORM.DS.'model'.DS.$model_name.'_class.php';
			$model_list[$model_name] = new $model_name;//可变标识符，可变类
		}
		return $model_list[$model_name];
	}
}
?>