<?php

class Controller{
	public function run() {
		$mobile = $this->getMobile();
		if(!$mobile || !preg_match("#^1\d{10}$#", $mobile)) $this->finish(1, '手机号码错误! '.$mobile);
	
		$redis = new Redis;
		$redis->connect('127.0.0.1', 6379);
		
		$hash = md5($mobile);
		if(!$redis->get('mobile_'.$hash)) {
			$redis->setex('mobile_'.$hash, 86400, 1);
			$redis->rpush('bomb_mobile_list', $mobile);
		}
		
		$this->finish();
	}
	
	public function getMobile() {
		return isset($_POST['mobile']) ? trim($_POST['mobile']) : null;
	}
	
	public function finish($code = 0, $msg = 'success!') {
		$isAjax = isset($_GET['ajax']) || isset($_POST['ajax']);
		
		echo $isAjax ? json_encode(array('error'=> $code, 'msg'=> $msg)) : $msg;
		exit();
	}
}

$c = new Controller();
$c->run();