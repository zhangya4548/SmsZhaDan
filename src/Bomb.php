<?php
class Bomb {
	public $datas = array();
	
	public function __construct($mobile, $datas) {
		Request::$mobile = $mobile;
		$this->datas = $datas;
	}
	
	// 发送短信
	public function send() {
		foreach($this->datas as $key => $item) {
			if(empty($item)) continue;

			$type = isset($item['type']) ? $item['type'] : 'normal';
			
			printf("Send `%s` Request: %d \n", $type, $key+1);
			
			$method = $type.'Request';
			Request::$method($item);
		}
		
		Helper::clear();
	}
}

class AutoLoad {
	public static function load($className) {
		$filename = DIR.'/src/'.$className.'.php';
		
		if(is_file($filename)) {
			include($filename);
			return true;
		}
		
		return false;
	}
}

spl_autoload_register(array('AutoLoad','load'));
