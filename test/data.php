<?php
$datas = array();

// 秀美论坛，提示短信不够
$datas[] = array(
	'type'=>'matchComplex',
	'cookie'=> 'xiumei.cookie',
	'match'=> array(
		'url'=> 'http://bbs.xiumei.com/member.php',
		'data'=> 'mod=register.php',
		'attributes'=> array('formhash'=>"#\<input.*?name\=\"formhash\".*?value\=\"(.*?)\"#")
	),
	'referer'=> 'http://bbs.xiumei.com',
	'list'=> array(
		array(
			'url'=>'http://bbs.xiumei.com/plugin.php',
			'data'=>'id=smstong:verifycode&idhash=Sx74q6t0&formhash={$formhash}&seccodeverify=&inajax=yes&infloat=register&handlekey=register&ajaxmenu=1&action=checkmobile&mobile={$mobile}&{$rand}',
		),
		array(
			'url'=>'http://bbs.xiumei.com/plugin.php',
			'data'=>'id=smstong:verifycode&idhash=Sx74q6t0&formhash={$formhash}&seccodeverify=&inajax=yes&infloat=register&handlekey=register&ajaxmenu=1&action=getregverifycode&mobile={$mobile}&{$rand}'
		),
	)
);


// 百姓网 模拟未成功，有httponly cookie
$datas[] = array(
	'type'=>'complex',
	'cookie'=> 'baixing.cookie',

		array(
			'url'=>'http://beijing.baixing.com',
			'data'=>'',
			'log'=> false
		),
		array(
			'url'=>'http://beijing.baixing.com/oz/verify/x/reg',
			'data'=>'',
			'log'=> false
		),
		array(
			'url'=>'http://beijing.baixing.com/oz/verify/x/reg',
			'data'=>'mobile={$mobile}',
		),
	)
);

// 19楼
$datas[] = array(
	'type'=>'matchComplex',
	'match'=> array(
		'url'=> 'http://www.19lou.com/register',
		'data'=> '',
		'attributes'=> array('token'=>"#\<input.*?name\=\"([a-f\d]+)\".*?value\=\"([a-f\d]+)\"#")
	),
	'referer'=> 'http://www.19lou.com',
	'cookie'=> '19lou.cookie',
	'list'=> array(
		array(
			'url'=>'http://www.19lou.com/register/checkname',
			'data'=>'name={$millisecond}_x&{$millisecond}'
		),
		array(
			'url'=>'http://www.19lou.com/register',
			'data'=>'regType=mobile&{$_keyname_token}={$token}&lifeStage=1&name={$millisecond}_x&pwd=aa111111&rePwd=aa111111&isAgree=1&refererUrl=aHR0cDovL3d3dy4xOWxvdS5jb20v',
			'post' => true
		),
		array(
			'url'=>'http://www.19lou.com/util/capture/mobile',
			'data'=>'phone={$mobile}&optype=active&smsType=0'
		),
	)
);

/**
 * 暂时不可用
 */
array(
	'url'=>'http://user.rayli.com.cn/forum.php',
	'data'=>'mod=ajax&infloat=register&handlekey=register&action=sendsmscode&ajaxmenu=1&stype=register&mobile={$mobile}&inajax=1&ajaxtarget=smscode_tip'
),


/**
 * 需要验证码
 */
array(
	'url'=>'http://secure.yintai.com/member/RegisterVerificationCode',
	'post'=> true,
	'data'=>'mobile={$mobile}'
),

/**
 * 需要验证码
 */
array(
	'url'=>'http://passport.youzu.com/site/sendSMSCode',
	'data'=>'phoneNumber={$mobile}'
),

/** 
 * 需要验证码
 */
array(
	'url'=>'http://et.hnair.com/huet/bc10getsmsverifyajax.do',
	'data'=> 'ajaxtimestamp={$millisecond}&mobilephone={$mobile}&verifytype=1&operationtype=register'
),

/**
 * 暂时无法使用
 */
array(
	'url'=>'http://user.anjuke.com/register',
	'data'=>'chktype=verifyformat&r={$rand}&phone={$mobile}&referer=aHR0cDovL3VzZXIuYW5qdWtlLmNvbQ%3D%3D&callback=global.loginPage.sendVerifyCodeTel'
),

/** 
 * 需要验证码
 */
array(
	'url'=>'https://account.meilishuo.com/user/reg/send_sm_captcha',
	'post'=> true,
	'data'=>'mobile={$mobile}'
),

/** 
 * 需要验证码
 */
array(
	'url'=> 'http://www.17ugo.com/activeuser/verifyphone.php?act=send_messages_reg',
	'post'=> true,
	'data'=> 'username={$mobile}'
),

/**
 * 停用了
 */
array(
			'url'=> 'http://www.okbuy.com/ajax/tel/nologin_send_verify_code',
			'post'=> true,
			'data'=> 'tel={$mobile}'
		),

/** 
 * 需要验证码
 */
array(
			'url'=> 'https://passport.yhd.com/passport/sendCheckCodeForRegister.do',
			'data'=> 'user.cellphone={$mobile}',
			'post'=> true,
		),
		
	array(
			'url'=> 'https://account.xiaomi.com/pass/sendPhoneTicket',
			'data'=> 'phone={$mobile}',
			'post'=> true,
		),
		
		array(
			'url'=>'http://passport.zhenpin.com/reg/AjaxGetSmsCode',
			'data'=>'mobile={$mobile}',
		),
		
/**
 * 应该是 cookie原因，有待研究
 */
array(
			'url'=>'https://g.gome.com.cn/ec/homeus/global/gome/sendAndVeryMobileActive.jsp',
			'post'=> true,
			'data'=> 'mobileNumber={$mobile}&requestType=send&verifyCode=',
			'ssl_verifypeer'=> false
		),
/*
有短信功能，提示 too fast much send
http://www.hongniang.com/?mod=register

新网站，待实现

*/
