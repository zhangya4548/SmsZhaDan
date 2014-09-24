<?php

return array(
	'type'=>'complex',
	'referer'=> 'http://www.baidu.com/',
	'cookie'=> 'baidu.cookie',
	'match'=> array(
		'url'=>'https://passport.baidu.com/v2/api/',
		'data'=> 'getapi&tpl=mn&apiver=v3&tt={$millisecond}&class=login&logintype=dialogLogin&callback=bd__cbs__83rsce',
		'attributes'=> array('bdstoken'=>"#\"token\"\s+\:\s+\"(\w+)\"#")
	),
	'list'=> array(
		array(
			'url'=>'https://passport.baidu.com/v2/',
			'data'=>'login&tpl=mn&u=http%3A%2F%2Fwww.baidu.com%2F',
			'log'=> false
		),
		array(
			'url'=>'http://passport.baidu.com/v2/api/senddpass',
			'data'=>'username={$mobile}&bdstoken={$bdstoken}&tpl=mn&apiver=v3&tt={$millisecond}&callback=bd__cbs__isvmxl',
		),
	)
);