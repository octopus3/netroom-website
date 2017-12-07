<?php
defined('DS') or define('DS',DIRECTORY_SEPARATOR);
//后台管理员相关操作（登录、退出、找回密码、管理员增删改查，权限控制）控制器类
class UserloginController extends Controller
{
	//登录表单动作
	public function UserloginAction()
	{
		require CURRENT_VIEW_PATH.'front'.DS.'forum_head.html';  
	}
}
	/*
	//验证管理员是否合法
	public function checkAction()
	{
		//获得表单数据
		$admin_name = $_POST['username'];
		$admin_pass = $_POST['password'];

		//从数据库中验证管理员信息是否存在合法
		$m_admin = Factory::M('AdminModel');
		if ($m_admin->check($admin_name,$admin_pass)) 
		{
			//验证通过，合法
			echo '合法，直接跳转到后台首页';
		}
		else 
	    {
	    	//非法
	    	echo "非法，提示，跳转到后台登录页面index.php?p=back&c=Admin&a=login";
	    }
	}
}*/
