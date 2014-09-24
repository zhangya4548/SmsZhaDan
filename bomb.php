<?php
date_default_timezone_set('Asia/Shanghai');

if(function_exists('fastcgi_finish_request')) {
	exit('End');
}

define('DIR', __DIR__);
require DIR.'/src/Bomb.php';

$args = Helper::parseArgv($argv);

if(!isset($args['mobile'])) {
	echo "Usage: \nphp bomb.php --mobile=11111111111 \n";
	exit();
}

$bomb = new Bomb($args['mobile'], Data::getDatas());
$bomb->send();