<?php

return array(
	'type'=>'complex',
	'referer'=> 'http://e.mail.163.com/mobilemail/home.do?from=163mail',
	'cookie'=> 'e163.cookie',
	'list'=> array(
		array(
			'url'=>'http://e.mail.163.com/mobilemail/home.do?from=163mail',
			'data'=>'',
			'log'=> false
		),
		array(
			'url'=>'http://e.mail.163.com/mobilemail/checkMobileBinded.do',
			'data'=>'mobile={$mobile}&rnd={$rand}',
		),
		array(
			'url'=>'http://e.mail.163.com/mobilemail/getVerifyCode.do',
			'data'=>'rnd={$rand}',
		),
	)
);