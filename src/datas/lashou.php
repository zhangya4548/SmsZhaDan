<?php
return array(
	'type'=>'complex',
	'cookie'=> 'lashou.cookie',
	'referer'=> 'http://www.lashou.com/account/signmobile/',
	'list'=> array(
		array(
			'url'=>'http://www.lashou.com/ajax/signmobile.php',
			'data'=>'act=checkmobile&mobile={$mobile}',
		),
		array(
			'url'=>'http://www.lashou.com/ajax/signmobile.php',
			'data'=>'act=send_code&bind_mobile={$mobile}',
		),
	)
);