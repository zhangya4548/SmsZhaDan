<?php
return array(
	'type'=>'complex',
	'referer'=> 'https://login.sina.com.cn/signup/signup?entry=blog&srcuid=1606934341&src=blogicp',
	'cookie'=> false,
	'list'=> array(
		array(
			'url'=>'https://login.sina.com.cn/signup/check_user.php',
			'data'=>'name={$mobile}&format=json&from=mobile',
			'post'=> true
		),
		array(
			'url'=>'https://login.sina.com.cn/signup/message',
			'data'=>'mobile={$mobile}',
			'post'=>true
		),
	)
);