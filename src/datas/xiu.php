<?php
/**
 * 走秀网
 */

return array(
	'type'=>'complex',
	'match'=> array(
		'url'=> 'https://login.xiu.com/business/checkLoginNameCmd?langId=-7&storeId=10154&catalogId=10101&loginNameType=2&timeStamp={$millisecond}',
		'data'=> 'loginName={$mobile}',
		'attributes'=> array('authCode'=>"#\"authCode\"\:\s+\"(\w+)\"#"),
		'ssl_verifypeer'=> false,
		'post'=> true,
		'log'=> false
	),
	
	'referer'=> 'https://login.xiu.com/reg',
	'cookie'=> 'xiu.cookie',
	'list'=> array(
		array(
			'url'=>'https://login.xiu.com/business/sendSMSCmd?langId=-7&storeId=10154&catalogId=10101&timeStamp={$millisecond}',
			'data'=>'authCode={$authCode}&phoneNum={$mobile}',
			'ssl_verifypeer'=> false,
			'post'=> true
		),
	)
);