<?php
/**
 * 久游网 9you.com, 需要验证码--！
 */

return false; 

return array(
	'type'=>'complex',
	'cookie'=> '9you.cookie',
	'referer'=> 'https://passport.9you.com/check_user.php',
	'list'=> array(
		array(
			'url'=>'https://passport.9you.com/check_user.php',
			'data'=>'username={$mobile}',
			'post'=> true
		),
		array(
			'url'=>'https://passport.9you.com/sendmobilecode.php',
			'data'=>'mobile={$mobile}&dataType=json&type=regist',
			'post'=> true
		)
	)
);