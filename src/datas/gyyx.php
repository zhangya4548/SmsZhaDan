<?php
/**
 * 光宇游戏
 */
return array(
	'type'=>'complex',
	'cookie'=> 'gyyx.cookie',
	'referer'=> 'https://account.sogou.com/web/reg/mobile',
	'list'=> array(
		array(
			'url'=>'http://account.gyyx.cn/Member/CheckAccountIsExist',
			'data'=>'username={$mobile}&r={$rand}',
		),
		array(
			'url'=>'http://account.gyyx.cn/Member/IsNeedValidCode',
			'data'=>'r={$rand}',
		),
		array(
			'url'=>'http://account.gyyx.cn/Member/SendRegisterSMS',
			'data'=>'r={$rand}',
			'post'=> true,
		),
	)
);