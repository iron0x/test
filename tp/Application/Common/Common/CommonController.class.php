<?php
namespace Common\Common;
use Think\Controller;
class CommonController extends Controller {
	protected $actions = [];
	protected $actionsRules = [];
	
	public function _initialize()
	{
		








		$this->show(__DIR__.'<br />'.__LINE__.'<br />'.__CLASS__.'<br />'.__METHOD__.'<br />'.'<h1>'.date('H:i:s').'</h1>'.MODULE_NAME.'<br />'.CONTROLLER_NAME.'<br />'.ACTION_NAME.'<br />');
	}

	protected function accessRule()
	{
		if(isset($this->actionsRules[ACTION_NAME]) && $this->actionsRules[ACTION_NAME])
		{
			$this->out();
		}
	}









}
