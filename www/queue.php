<?php

class Queue{
	private $_redis;

	public function __construct() {
		$this->_redis = new Redis;
		$this->_redis->connect("127.0.0.1", 6379);
	}
	
	public function run() {
		$bomb = __DIR__.'/../bomb.php';
		
		while(1) {
			$data = $this->_redis->blpop("bomb_mobile_list", 10);
			if(empty($data) || !preg_match("#^1\d{10}$#", $data[1])) continue;
			
			$command = "/usr/bin/php $bomb --mobile={$data[1]}";
			system($command);
			
			echo $command."\n";
			sleep(1);
		}
	}
}

if(function_exists('fastcgi_finish_request')) {
	exit('End');
}

$queue = new Queue();
$queue->run();