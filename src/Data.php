<?php
/*
 * 数据配置
 */
class Data {
	private static $datas = array(
		array(
			'url'=>'https://reg.jd.com/notify/mobileCode',
			'data'=>'r={$rand}&mobile={$mobile}',
			'referer'=>'https://reg.jd.com/reg/person?ReturnUrl=http%3A%2F%2Fwww.jd.com'
		),
		
		array(
			'url'=>'https://register.shengpay.com/personal/sendRegisterSms.htm',
			'post'=> true,
			'data'=> 'mobile={$mobile}',
		),
		
		array(
			'url'=>'https://member.suning.com/emall/SendMobileCodeCmd',
			'post'=> true,
			'data'=>'scenario=mobileRegister&mobile={$mobile}'
		),
		
		array(
			'url'=>'https://passport.baidu.com/v2/',
			'data'=>'regphonesend&token=&tpl=mn&apiver=v3&tt={$time}&phone={$mobile}&callback=bd__cbs__7tzmph'
		),
		
		array(
			'url'=>'http://i.360.cn/smsApi/sendsmscode',
			'referer'=> 'http://i.360.cn/reg/?src=pcw_home&destUrl=http%3A%2F%2Fwww.360.cn%2F',
			'data'=> 'account={$mobile}&condition=2&r={$rand}&callback=QiUserJsonP{$millisecond}',
		),
		
		array(
			'url'=>'http://passport.iqiyi.com/apis/phone/send_cellphone_authcode.action?t={$millisecond}',
			'post'=> true,
			'data'=>'requestType=1&cellphoneNumber={$mobile}&serviceId=2'
		),
		
		array(
			'url'=>'https://login.dangdang.com/p/send_mobile_vcode.php',
			'post'=> true,
			'data'=>'custid=0&mobile_phone={$mobile}&verify_type=5'
		),
		
		array(
			'url'=>'https://passport.meituan.com/account/mobilelogincode',
			'post'=> true,
			'data'=>'mobile={$mobile}'
		),
		
		array(
			'url'=>'https://ssl.mall.cmbchina.com/Ajax/Customer/AjaxCellPhoneValidationRegister.aspx',
			'post'=> true,
			'data'=>'PhoneValidation={"CellPhone":"{$mobile}","ConfirmKey":"","Process":1}&ValidationType=1&IsRegister=1'
		),
		
		array(
			'url'=>'https://passport.58.com/sendregmobilecode',
			'data'=>'mobile={$mobile}&timesign={$millisecond}',
			'process'=> array(
				'p'=>array(array('ArgProcess', 'md5_58'), array('{$mobile}', '{$millisecond}')),
			)
		),
		
		array(
			'url'=>'http://t.dianping.com/ajaxcore/newregister',
			'post'=> true,
			'data'=>'action=sendVerify&phone={$mobile}'
		),
		
		array(
			'url'=>'http://account.autohome.com.cn/accountapi/createmobilecode',
			'post'=> true,
			'data'=>'phone={$mobile}&validcodetype=1'
		),
		
		array(
			'url'=>'http://i.hunantv.com/ajax/account/sendsms',
			'post'=> true,
			'data'=>'action=register&account={$mobile}&verify='
		),
		
		array(
			'url'=>'http://www.dcxj1314.com/config/sms/send_action.asp',
			'data'=>'mobile={$mobile}',
			'post'=> true
		),
		
		array(
			'url'=>'http://reg.jiayuan.com/libs/xajax/reguser.server.php?processSendOrUpdateMessage',
			'data'=>'xajax=processSendOrUpdateMessage&xajaxargs[]=<xjxquery><q>mobile={$mobile}</q></xjxquery>&xajaxargs[]=mobile&xajaxr={$millisecond}',
			'http_header'=> array('sid:64099a'),
			'post'=> true
		),
		
		array(
			'referer'=> 'http://i.qichetong.com/AuthenService/Register/default.html',
			'url'=>'http://i.qichetong.com/Ajax/Authenservice/MobileVerifyCode.ashx',
			'data'=>'popType=0&r={$rand}&LoginName={$mobile}',
			'post'=> true
		),
		
		array(
			'url'=>'https://passport.ceair.com/cesso/mobile!sendDynamicPassword.shtml?rand=9219',
			'data'=>'mobileNo={$mobile}',
			'post'=> true
		),
		
		array(
			'url'=>'http://b2c.csair.com/B2C40/data/account/getVcode.xsql',
			'data'=>'method=O&mobilestr={$mobile}&code=',
		),
		
		array(
			'url'=>'http://api.webapp.58.com/sendmsg/{$mobile}',
			'data'=> 'callback=jQuery110205391991536598653_1393310871798&token=&channelid=547&_={$millisecond}'
		),
		
		array(
			'url'=>'http://www.xinniangjie.com/public/AjaxCheckMobile',
			'post'=> true,
			'data'=>'Author[mobile]={$mobile}'
		),
		
		array(
			'url'=>'http://passport.cngold.org/account/mobileCode.htm',
			'data'=>'member.mobile={$mobile}&callback=jsonp{$millisecond}&member.fromUrl=http://passport.cngold.org/register/mobileAdd.htm&member.registerType=%E7%BD%91%E7%AB%99%E7%94%A8%E6%88%B7%E6%B3%A8%E5%86%8C',
		),
	);
	
	/**
	 * 获取元数据，self::datas 和 datas 目录下的php文件
	 */
	public static function getDatas() {
		$dir = DIR.'/src/datas/';
		
		if($dh = opendir($dir)) {
			while(($file = readdir($dh)) !== false) {
				$file = $dir.$file;
				
				if(is_file($file) && preg_match("#\.php$#", $file)) self::$datas[] = include $file;
			}
			closedir($dh);
		}
		
		return self::$datas;
	}
}