<?php

return array(
	'type'=>'complex',
	'cookie'=> 'sogou.cookie',
	'referer'=> 'https://account.sogou.com/web/reg/mobile',
	'match'=> array(
		'url'=>'https://account.sogou.com/web/reg/mobile',
		'data'=> '',
		'attributes'=> array('token'=>"#name\=\"token\"\s+value\=\"(\w+)\"#")
	),
	'list'=> array(
		array(
			'url'=>'https://account.sogou.com/web/sendsms',
			'data'=>'mobile={$mobile}&new_mobile={$mobile}&client_id=1120&captcha&token={$token}&t={$millisecond}',
			'post'=> true
		)
	)
);