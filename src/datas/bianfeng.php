<?php

return array(
	'type'=>'complex',
	'referer'=> 'http://register.bianfeng.com/gaea/phone_default.aspx?from=205&zone=web',
	'cookie'=> 'bianfeng.cookie',
	'list'=> array(
		array(
			'url'=>'http://register.bianfeng.com/gaea/phone_default.aspx?from=205&zone=web',
			'data'=>'',
			'log'=> false
		),
		array(
			'url'=>'http://authleqr.bianfeng.com/lars/check-account-types.jsonp',
			'data'=>'callback=jQuery16207952014426700123_{$millisecond}&userId={$mobile}&_={$millisecond}',
		),
		array(
			'url'=>'http://register.bianfeng.com/gaea/SendPhoneMsg.ashx?page=REG&mobile={$mobile}',
			'data'=>'page=REG&mobile={$mobile}',
			'post'=>true
		),
	)
);