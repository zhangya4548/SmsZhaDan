<?php
class Request{
	// 目标手机号码
	public static $mobile = '';
	
	/**
	 * 复合请求
	 */
	public static function complexRequest($data) {
		if(isset($data['match']))
			self::match($data);
		
		foreach($data['list'] as $item) {
			$item['referer'] = $data['referer'];
			$item['cookie'] = $data['cookie'];
			
			if(isset($item['match']))
				self::match($item);
			
			self::normalRequest($item);
		}
	}
	
	/**
	 * 根据正则，匹配内容，并替换
	 */
	public static function match(&$data) {
		$data['match']['cookie'] = $data['cookie'];
		$data['match']['referer'] = $data['referer'];
		$data['match']['url'] = Replacer::model()->replace($data['match']['url']);
		$data['match']['data'] = Replacer::model()->replace($data['match']['data']);
		
		$attributes = Helper::matchAttributes($data['match']);
		
		if(isset($data['list'])) {
			foreach($data['list'] as &$item) {
				$item['url'] = Replacer::model()->replaceAttributes($item['url'], $attributes);
				$item['data'] = Replacer::model()->replaceAttributes($item['data'], $attributes);
			}
		} else {
			$data['url'] = Replacer::model()->replaceAttributes($data['url'], $attributes);
			$data['data'] = Replacer::model()->replaceAttributes($data['data'], $attributes);
		}
	}
	
	/**
	 * 普通请求
	 */
	public static function normalRequest($data) {
		$requestData = Replacer::model()->replace($data['data']);
		$url = Replacer::model()->replace($data['url']);
		
		// 有需要处理的参数
		if(isset($data['process'])) {
			!empty($requestData) && $requestData .= '&';
			
			foreach($data['process'] as $key => $item) {
				$requestData .= sprintf('%s=%s&', $key, call_user_func_array($item[0], $item[1]));
			}
			$requestData = substr($requestData, 0, -1);
			unset($data['process']);
		}
		
		return self::sendRequest($url, $requestData, $data);
	}
	
	/**
	 * 发送请求
	 */
	public static function sendRequest($url, $data, $params = array()) {
		$params = array_merge(array(
			'post'=>false,
			'referer'=>'',
			'cookie'=>'',
			'log'=> true,
			'ssl_verifypeer'=>true,
			'timeout'=>10
		), $params);
		
		$params['post'] ? $params['data'] = $data : $url .= '?'.$data;
		
		// 从URL 自动匹配 referer
		if(empty($params['referer'])) {
			$urlData = parse_url($url);
			$params['referer'] = $urlData['scheme'].'://'.$urlData['host'];
		}
		
		// 自动匹配 https
		$params['https'] = preg_match("#^https#", $url);
		
		$curl = Curl::model();
		
		// 设置 cookie
		if(!empty($params['cookie'])) {
			$curl->cookie = $params['cookie'];
			$params['use_cookie'] = true;
		}
		$result = $curl->request($url, $params);
		
		if(!$params['log']) return $result;
		
		$resultArr = @ json_decode($result);
		$resultArr && $result = $resultArr;
		
		$log = sprintf("\n [time: %s] \n url: %s \n data: %s \n result: %s\n ----end---- \n",
			date('Y-m-d H:i:s'), $url, var_export($data, true), var_export($result, true));
		Helper::log($log);
	}
}