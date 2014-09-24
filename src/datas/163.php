<?php

return array(
	'type'=>'complex',
	'referer'=> 'http://reg.email.163.com/unireg/call.do?cmd=register.entrance&from=163navi&regPage=163',
	'cookie'=> '163.cookie',
	'list'=> array(
		array(
			'url'=>'http://reg.email.163.com/unireg/call.do?cmd=register.entrance&from=163navi&regPage=163',
			'data'=>'',
			'log'=> false
		),
		array(
			'url'=>'http://reg.email.163.com/unireg/call.do?cmd=added.mobilemail.checkBinding',
			'data'=>'mobile={$mobile}',
			'post'=>true
		),
		array(
			'url'=>'http://reg.email.163.com/unireg/call.do?cmd=added.mobileverify.sendAcode',
			'data'=>'mobile={$mobile}&uid={$mobile}@163.com&mark=mobile_start',
			'post'=>true
		),
	)
);