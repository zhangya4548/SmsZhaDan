<?php
/**
 * Ä¢¹½½Ö
 */
return array(
	'type'=>'complex',
	'referer'=> 'http://www.mogujie.com',
	'cookie'=> 'mogujie.cookie',
	'list'=> array(
		array(
			'url'=>'https://www.mogujie.com/registermg',
			'log'=> false,
			'data'=>''
		),
		array(
			'url'=>'https://www.mogujie.com/registermg/ajaxcheck',
			'data'=>'ulike=x_{$millisecond}',
			'post'=> true
		),
		array(
			'url'=>'https://www.mogujie.com/registermg/postform',
			'data'=>'register_ulike=x_{$millisecond}&register_password=a123456&register_respassword=a123456&register_agreement=on',
			'post' => true
		),
		array(
			'url'=>'https://www.mogujie.com/registermg/sendcode',
			'post' => true,
			'data'=>'mobile={$mobile}'
		),
	)
);