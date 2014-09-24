<?php
/**
 * 九城，先注册 后发验证码，
 * 此处不会直接用手机号码注册，是用 毫秒+123@qq.com 作为邮箱去注册
 */

return array(
	'type'=>'complex',
	'cookie'=> 'the9.cookie',
	'referer'=> 'https://passport.the9.com',
	'list'=> array(
		array(
			'url'=>'http://passport.the9.com/api/chk_loginname',
			'data'=>'loginname={$millisecond}123@qq.com&accounttype=reg_email',
		),
		array(
			'url'=>'https://passport.the9.com/register/submit',
			'data'=>'loginname={$millisecond}123@qq.com&pwd=aa111111&email=&realname=&cert_id=&site_id=0000&site_cd=&channel=p9&redurl=&active=&target=top&callback=jQuery17209455646860878915_{$millisecond}&_={$millisecond}',
		),
		array(
			'url'=>'http://passport.the9.com/api/get_mobile_code',
			'process'=> array(
				'sign'=>array(array('ArgProcess', 'md5_the9'), array('{$mobile}', '{$millisecond}')),
			),
			'data'=>'mobile={$mobile}&chk_unique=1&sign={$sign}',
		),
	)
);
 