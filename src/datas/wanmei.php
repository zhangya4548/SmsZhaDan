<?php

/**
 * 完美 wanmei.com
 */

return array(
	'type'=>'complex',
	'cookie'=> 'wanmei.cookie',
	'referer'=> 'http://passport.wanmei.com/register/phonet.jsp',
	'list'=> array(
		array(
			'url'=>'http://passport.wanmei.com/register/phonet.jsp',
			'data'=>'',
			'log'=> false
		),
		array(
			'url'=>'http://passport.wanmei.com/NoteAction.do?method=sendRegSms',
			'data'=>'mobile={$mobile}',
			'post'=> true,
		),
	)
);
