<?php

return array(
	'type'=>'complex',
	'referer'=> 'http://www.yixin.im',
	'cookie'=> 'yixin.cookie',
	'list'=> array(
		array(
			'url'=>'http://www.yixin.im',
			'data'=>'',
			'log'=> false
		),
		array(
			'url'=>'http://yixin.im/api/dlfromsms',
			'data'=>'mobile={$mobile}',
			'post'=>true
		),
	)
);