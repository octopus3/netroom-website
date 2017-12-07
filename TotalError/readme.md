# 项目架构
> # 1.application
>
>> ## 1.1 后台：back  
>>  目前暂时没有
>> ## 1.2 前端：front
>>
>>> ### 1.2.1 m: model(暂时没有模型类文件)
>>> ### 1.2.2 v: view   
>>>（放置视图，html代码）
>>> ### 1.2.3 c: controller
>>>（页面请求，传递数据到数据库)
>>> ### 1.2.4 js 
>（放置JS代码）
> # 1.3测试：test
> # 2.framework：
>
# 框架
放置一些工厂类，基础控制器类，基础模型类，数据库类。<br>
> # 3.web
>  
> ## 3.1 
>   后台：back 目前暂时没有
> ##3.2 
>前端：front
>> ### 3.2.1 images  
>>放置图片
>> ### 3.2.2 
>>styles 放置css文件
> # 4.index.php 
> 入口文件
> ``` php
><?php
>//header('Content-type: text/html; charset=utf-8');
>defined('DS') or define('DS',DIRECTORY_SEPARATOR);
>
>/*
> *自动加载类文件函数
>*/
>function userAutoload($class_name)
>{
>	//var_dump($class_name);
>    //先处理确定的（框架中的核心类）
>    //类名与类文件映射数组
>    $framework_class_list = array
>    (
>    	//核心类，直接在数组中将其加载 
>       //'类名' =>'类文件地址'
>       'Controller' =>FRAMEWORK_PATH.'Controller_class.php',
>       'Factory'    =>FRAMEWORK_PATH.'Factory_class.php',
>       'Model'      =>FRAMEWORK_PATH.'Model_class.php',
>       'MySQLDB'    =>FRAMEWORK_PATH.'MySQLDB_class.php',                   
>    );
>    //判断判断是否为核心类
>    if (isset($framework_class_list[$class_name]))
>    {
>    	//是核心类
>    	require $framework_class_list[$class_name];
>    }
>    //判断是否为可增加（控制器类，模型类）
>    //控制器类，截取后十个字符，匹配Controller，以此类推
>    elseif (substr($class_name, -10) == 'Controller') 
>    {
>    	//控制器类，当前平台下controller目录
>    	require CURRENT_CONTROLLER_PATH.$class_name.'_class.php';
>    }
>    elseif (substr($class_name, -5) == 'Model') 
>    {
>    	//模型类，当前平台下model目录
>    	require CURRENT_MODEL_PATH.$class_name.'_class.php';
>    }
>
>}
>//注册这个函数
>spl_autoload_register('userAutoload');
>/*
>函数getCWD()可以用来获得当前工作目录。Current Working Directory
>当写相对路径不能确定的时候，可以用这个函数看看。
>*/
>
>//目录常量的定义
>define('ROOT_PATH', getcwd().DS);
>define('APPLICTION_PATH', ROOT_PATH.'application'.DS);
>define('FRAMEWORK_PATH', ROOT_PATH.'framework'.DS);
>//确定分发参数
>/*
>想做到真正的单入口，就是一个入口可以载入任意平台下边的任意控制器的任意动作。
>就是分发参数p的使用
>分发参数p确定当前平台
>*/
>//平台
>$default_platform = 'front';
>define('PLATFORM', isset($_GET['p']) ? $_GET['p'] : $default_platform);
>//控制器类
>$default_controller = 'Website_Head';
>define('CONTROLLER', isset($_GET['c']) ? $_GET['c'] : $default_controller);
>//动作
>$default_action = 'OfficialWebsite'; 
>define('ACTION', isset($_GET['a']) ? $_GET['a'] : $default_action);
>
>//当前平台相关的路径常量
>define('CURRENT_CONTROLLER_PATH',APPLICTION_PATH.PLATFORM.DS.'controller'.DS);
>define('CURRENT_MODEL_PATH',APPLICTION_PATH.PLATFORM.DS.'model'.DS);
>define('CURRENT_VIEW_PATH',APPLICTION_PATH.PLATFORM.DS.'view'.DS);
>
>$controller_name = CONTROLLER.'Controller';
>/*
>想做到真正的单入口，就是一个入口可以载入任意平台下边的任意控制器的任意动作。
>就是分发参数p的使用
>分发参数p确定当前平台
>*/
>//实例化控制类
>//require __DIR__.DS.'application'.DS.PLATFORM.DS.'controller'.DS.$controller_name.'_class.php';
>//实例化
>//require __DIR__.DS.'MatchController_class.php';
>$controller = new $controller_name();//可变类
>//调用方法（action动作）
>//拼凑当前的方法动作名字字符串
>$action_name = ACTION . 'Action';
>//$controller = new MatchController();
>//$action_name = $a.'Action';
>$controller->$action_name(); 
>?>
> ```






