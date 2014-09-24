<?php

return array(
	'type'=>'complex',
	'cookie'=> '91.cookie',
	'referer'=> 'https://reg.91.com/NDUser_Register_New.aspx',
	'list'=> array(
		array(
			'url'=>'https://reg.91.com/AjaxAction/AC_register.ashx',
			'data'=>'action=verifyusernameofmobile&txtUserNameOfMobile={$mobile}',
			'post'=> true
		),
		array(
			'url'=>'https://reg.91.com/AjaxAction/AC_register.ashx?url=http://aoe.91.com',
			'data'=>'action=createcodeofmobileregister&txtUserNameOfMobile={$mobile}',
			'post'=> true
		)
	)
);