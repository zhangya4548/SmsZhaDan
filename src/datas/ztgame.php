<?php
/**
 * 巨人网络
 */
 
return array(
	'type'=>'complex',
	'cookie'=> 'ztgame.cookie',
	'referer'=> 'http://reg.ztgame.com',
	'list'=> array(
		array(
			'url'=>'http://reg.ztgame.com/registe/mobilePhoneRegister',
			'data'=>'type=isBindPhoneNum&phoneNum={$mobile}',
			'post'=> true,
		),
		array(
			'url'=>'http://reg.ztgame.com/registe/sendMobileCode',
			'data'=>'phoneNum={$mobile}',
			'post'=> true,
		),
	)
);