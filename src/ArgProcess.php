<?php
/**
 * 参数处理类， 用户某些请求的参数计算等
 */

class ArgProcess{
	
	public static function md5_58($mobile, $timestamp) {
		$mobile = Replacer::model()->replace($mobile);
		$timestamp = Replacer::model()->replace($timestamp);
		
		return md5(md5($mobile).substr($timestamp, 5, 6));
	}
	
	public static function md5_the9($mobile, $data) {
		$mobile = Replacer::model()->replace($mobile);
	
		$contents = Request::sendRequest(
			'http://passport.the9.com/mobile/bind',
			'',
			array(
				'referer'=> 'http://passport.the9.com',
				'cookie'=> 'the9.cookie',
				'log'=> false
			)
		);
		
		$match = preg_match("#\<span\s+id=\"data_sign\"\s+style=\"display\:none\;\"\>(.*?)\<#", $contents, $matchs);
		if(!$match) return '';
		
		return md5($mobile."|".$matchs[1]);
	}
	
}