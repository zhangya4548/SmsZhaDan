<?php

return array(
	'type'=>'complex',
	'match'=> array(
		'url'=> 'https://www.wangfujing.com/webapp/wcs/stores/servlet/WFJURLUserRegistration',
		'data'=> 'catalogId=10101&langId=-7&storeId=10154',
		'ssl_verifypeer' => false,
		'attributes'=> array('_token'=>"#\<input.*?name\=\"_token\".*?value\=\"(.*?)\"#"),
		'log'=> false
	),
	'referer'=> 'https://www.wangfujing.com',
	'cookie'=> 'wangfujing.cookie',
	'list'=> array(
		array(
			'url'=>'https://www.wangfujing.com/webapp/wcs/stores/servlet/WFJSentSMSForPhoneRegistration',
			'data'=>'catalogId=10101&storeId=10154&errorViewName=WFJAjaxErrorView&_token={$_token}&phone={$mobile}',
			'ssl_verifypeer' => false
		),
	)
);
