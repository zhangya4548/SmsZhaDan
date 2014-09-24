<?php

return array(
	'type'=>'complex',
	'match'=> array(
		'url'=> 'http://my.maxthon.cn/mini/',
		'data'=> 'a=registerMobile&c=logined&t=unify',
		'attributes'=> array('formhash'=>"#\<input\s+type\=\"hidden\"\s+name\=\"formhash\"\s+value\=\"(\w+)\"#"),
		'log'=> false
	),
	'referer'=> 'http://my.maxthon.cn/mini/?a=registerMobile&c=logined&t=unify',
	'cookie'=> 'maxthon.cookie',
	'list'=> array(
		array(
			'url'=>'http://my.maxthon.cn/api/getRegMobileVcode',
			'data'=>'country=+86&formkey={$formhash}&mobile={$mobile}',
			'post'=>true,
		),
	)
);