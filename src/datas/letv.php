<?php

return array(
	'type'=>'complex',
	'match'=> array(
		'url'=> 'http://sso.letv.com/user/mobilereg',
		'data'=> 'ver=2.0&next_action=http%3A%2F%2Fwww.letv.com%2F',
		'attributes'=> array('mobilecodeletvid'=>"#\<input.*?name\=(?:\"|')mobilecodeletvid(?:\"|').*?value\=(?:\"|')(.*?)(?:\"|')#")
	),
	'referer'=> 'http://sso.letv.com/user/mobilereg?ver=2.0&next_action=http%3A%2F%2Fwww.letv.com%2F',
	'cookie'=> 'letv.cookie',
	'list'=> array(
		array(
			'url'=>'http://sso.letv.com/user/mobileRegCode/mobile/{$mobile}/mobilecodeletvid/{$mobilecodeletvid}',
			'data'=>'',
		),
	)
);