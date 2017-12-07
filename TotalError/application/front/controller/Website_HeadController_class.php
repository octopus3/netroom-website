<?php
defined('DS') or define('DS',DIRECTORY_SEPARATOR);
class Website_HeadController extends Controller
{
	//官网首页动作
	public function OfficialWebsiteAction()
	{
		require CURRENT_VIEW_PATH.'front'.DS.'official_website_head.html';  
	}
}