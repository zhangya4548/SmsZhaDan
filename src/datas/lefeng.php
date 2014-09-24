<?php

return array(
	'type'=>'complex',
	'cookie'=> 'lefeng.cookie',
	'referer'=> 'https://passport.lefeng.com/register.jsp',
	'list'=> array(
		array(
			'url'=>'https://passport.lefeng.com/register.jsp',
			'data'=>'',
			'log'=> false
		),
		array(
			'url'=>'https://passport.lefeng.com/ajax/passport/ajaxCheckLogin.jsp',
			'data'=>'callback=jQuery16407218918786384165_{$millisecond}&login={$mobile}&_={$millisecond}',
		),
		array(
			'url'=>'https://passport.lefeng.com/ajax/passport/ajaxSendMobileYzm.jsp',
			'data'=>'callback=jQuery16405365222985856235_{$millisecond}&mobile={$mobile}&_={$millisecond}'
		)
	)
);