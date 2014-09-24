<?php
class Curl{
	private static $_model = null;
	
	// cookie 文件名称
	private $_cookieFile = null;
	
	// curl handle
	protected $ch = '';
	
	// curl 日志文件 句柄
	protected $fp = null;
	
	// curl 参数
	protected $defaultParams = array(
		'data'=> array(),
		'post'=> false,
		'use_cookie'=> false,
		'referer'=>'http://www.google.com',
		'https' => false,
		'ssl_verifypeer'=> true,
		'header'=> false,
		'transfer'=> true,
		'timeout'=> 10,
		'http_header'=> array(
			'Connection:keep-alive',
			'Accept-Language:zh-CN,zh;q=0.8,en-US;q=0.6,en;q=0.4',
			'X-Requested-With:XMLHttpRequest',
			'Content-Type:application/x-www-form-urlencoded; charset=UTF-8',
		)
	);
	
	protected $params = array();
	
	// 单例模式
	public static function model($className = __CLASS__) {
		null === self::$_model && self::$_model = new $className;
		
		return self::$_model;
	}
	
	public function __set($name, $value) {
		$setter = 'set'.ucfirst($name);
		if(method_exists($this, $setter)) return $this->$setter($value);
		
		return isset($this->defaultParams[$name]) ? $this->defaultParams[$name] = $value : '';
	}
	
	public function __get($name) {
		$getter = 'get'.ucfirst($name);
		if(method_exists($this, $getter)) return $this->$getter();
		
		return isset($this->defaultParams[$name]) ? $this->defaultParams[$name] : '';
	}
	
	// 请求
	public function request($url, $params = array()) {
		$this->mergeParams($params);
		
		$this->ch = curl_init($url);
		$this->setOption(CURLOPT_TIMEOUT, $this->params['timeout']);
		$this->setOption(CURLOPT_REFERER, $this->params['referer']);
		$this->setOption(CURLOPT_HEADER, $this->params['header']);
		$this->setOption(CURLOPT_RETURNTRANSFER, $this->params['transfer']);
		$this->setOption(CURLOPT_USERAGENT, $this->createAgent());
		
		$this->_setCurlLog();
		$this->_setHttpHeader();
		true == $this->params['use_cookie'] && $this->_setCurlCookie();
		true == $this->params['https'] && $this->_setHttpsRequest();
		
		$this->_setRequestType();

		$contents = curl_exec($this->ch);
		$this->close();
		
		return $contents;
	}
	
	/**
	 * 合并参数
	 */
	public function mergeParams($params) {
		if(isset($params['http_header'])) {
			$params['http_header'] = array_merge($this->defaultParams['http_header'], $params['http_header']);
		}
		$this->params = array_merge($this->defaultParams, $params);
	}
	
	/**
	 * 设置curl参数
	 */
	public function setOption($key, $value) {
		curl_setopt($this->ch, $key, $value);
	}
	
	/**
	 * 记录curl 请求日志
	 */
	protected function _setCurlLog() {
		$this->fp = fopen(DIR.'/logs/curl.log', 'a+');
		$this->setOption(CURLOPT_FOLLOWLOCATION, true);
		$this->setOption(CURLOPT_VERBOSE, true);
		$this->setOption(CURLOPT_STDERR, $this->fp);
	}
	
	/**
	 * 设置HTTP 请求头
	 */
	protected function _setHttpHeader() {
		$ip = $this->createIp();
		
		$this->setOption(CURLOPT_HTTPHEADER, 
			array_merge($this->params['http_header'], array('X-FORWARDED-FOR:'.$ip, 'CLIENT-IP:'.$ip)));
	}
	
	/**
	 * 记录cookie
	 */
	protected function _setCurlCookie() {
		null === $this->_cookieFile && $this->_cookieFile = tempnam($this->cookieDir, 'cookie');
		
		$this->setOption(CURLOPT_COOKIEFILE, $this->_cookieFile);
		$this->setOption(CURLOPT_COOKIEJAR, $this->_cookieFile);
	}
	
	/**
	 * 设置HTTPS 方式的请求
	 * 模拟证书地址： http://curl.haxx.se/ca/cacert.pem
	 */
	protected function _setHttpsRequest() {
		$this->setOption(CURLOPT_SSL_VERIFYPEER, $this->params['ssl_verifypeer']);
		$this->setOption(CURLOPT_SSL_VERIFYHOST, TRUE);
		$this->setOption(CURLOPT_CAINFO, DIR.'/source/cacert.pem');
	}
	
	/**
	 * 设置请求类型 post|get
	 */
	protected function _setRequestType() {
		if(true == $this->params['post']) {
			$data = is_array($this->params['data']) ? http_build_query($this->params['data']) : $this->params['data'];
			$this->setOption(CURLOPT_POST, TRUE);
			$this->setOption(CURLOPT_POSTFIELDS, $data);
		} else {
			$this->setOption(CURLOPT_HTTPGET, TRUE);
		}
	}
	
	/**
	 * 关闭资源链接
	 */
	protected function close() {
		curl_close($this->ch);
		fclose($this->fp);
	}
	
	/**
	 * 随机IP
	 */
	public function createIp() {
		return rand(10,255).'.'.rand(10,255).'.'.rand(10,255).'.'.rand(10,255);
	}
	
	/**
	 * 浏览器User-Agent
	 */
	public function createAgent() {
		return 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36';
	}
	
	/**
	 * 设置 cookie 文件
	 */
	public function setCookie($cookie) {
		$cookie = $this->cookieDir.'/'.$cookie;
		if(!file_exists($cookie)) file_put_contents($cookie, '');
		
		return $this->_cookieFile = $cookie;
	}
	
	/**
	 * 获取 Cookie 存放目录
	 */
	public function getCookieDir() {
		$dir = DIR.'/cookie';
		if(!file_exists($dir)) mkdir($dir, 0755, true);
		
		return $dir;
	}
}
