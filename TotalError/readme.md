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
> [入口文件](./index.php)
> **变量解释**
> **DS变量**
> DIRECTORY_SEPARATOR 该变量相当于文件分隔符
> ## **入口文件相关函数**
>  ### 自动加载类文件函数
> ```php
> function userAutoload($class_name)
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
> ```




