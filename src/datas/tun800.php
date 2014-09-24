<?php
return array(
	'type'=>'complex',
	'match'=> array(
		'url'=> 'http://passport.tuan800.com/users/signup',
		'data'=> 'regtype=mobile&return_to=',
		'attributes'=> array('token'=>"#\<meta\s+content=\"(.*?)\"\s+name=\"csrf-token\"\>#")
	),
	'referer'=> 'http://www.tuan800.com',
	'cookie'=> '',
	'list'=> array(
		array(
			'url'=>'http://passport.tuan800.com/phone_confirmations',
			'data'=>'timestamp={$millisecond}&authenticity_token={$token}&phone_number={$mobile}',
			'ssl_verifypeer' => false
		),
	)
);