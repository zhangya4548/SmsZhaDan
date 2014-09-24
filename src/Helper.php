<?php

class Helper{
	private static $fp = null;
	
	/**
	 * 记录日志
	 */
	public static function log($log) {
		if(null === self::$fp) {
			$logFile = sprintf('%s/logs/sms.%s.log', DIR, date('Ymd'));
			$isFile = is_file($logFile);
			self::$fp = fopen($logFile, 'a');
			
			if(!$isFile) fwrite(self::$fp, "\\xEF\\xBB\\xBF ");
		}
		
		if(mb_detect_encoding($log, 'UTF-8') !== 'UTF-8') $log = mb_convert_encoding($log, 'UTF-8', 'GBK');
		
		fwrite(self::$fp, $log);
		echo $log;
	}
	
	/**
	 * 随机串 模拟 js rand
	 */
	public static function randNum() {
		return '0.'.rand(10000001, 90000009).rand(10000001, 90000009);
	}
	
	/**
	 * 清理
	 */
	public static function clear() {
		self::$fp && fclose(self::$fp);
	}
	
	/**
	 * 解析 外部输入
	 */
	public static function parseArgv($argv) {
		$args = array();
		
		if(!empty($argv) && is_array($argv)) {
			foreach($argv as $item) {
				if(preg_match("#^--(\w+)\=(.*?)$#", $item, $arr)) {
					$args[$arr[1]] = $arr[2];
				}
			}
		}
		
		!empty($_GET) && $args = array_merge($args, $_GET);
		return $args;
	}
	
	/**
	 * 获取毫秒时间
	 */
	public static function millisecond() {
		return floor(microtime(true)*1000);
	}
	
	/**
	 * 根据 参赛匹配指定内容
	 */
	public static function matchAttributes($data) {
		$contents = Request::sendRequest(
			$data['url'],
			@ $data['data'],
			array(
				'referer'=> $data['referer'],
				'cookie'=> $data['cookie'],
				'ssl_verifypeer'=> isset($data['ssl_verifypeer']) ? $data['ssl_verifypeer'] : true,
				'log'=> @ $data['log'],
				'post'=> @ $data['post'],
			)
		);
		
		$attributes = array();
		foreach($data['attributes'] as $attr => $regExp) {
			preg_match_all($regExp, $contents, $matchs);
			if(empty($matchs)) continue;
			
			if(count($matchs) == 2)
				$attributes[$attr] = @ $matchs[1][0];
			else {
				$attributes[$attr] = @ $matchs[2][0];
				$attributes['_keyname_'.$attr] = @ $matchs[1][0];
			}
		}
		
		return $attributes;
	}
}