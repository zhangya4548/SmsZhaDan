<?php
/**
 * 字符串替换器
 */

class Replacer{
	private static $_model = null;
	
	private $_attrs = array();
	
	// 单例模式
	public static function model($className = __CLASS__) {
		if(null === self::$_model) {
			self::$_model = new $className;
			self::$_model->_attrs['keys'] = array('{$rand}', '{$mobile}', '{$millisecond}', '{$time}');
			self::$_model->_attrs['values'] = array(Helper::randNum(), Request::$mobile, Helper::millisecond(), time());
		}
		
		return self::$_model;
	}
	
	/**
	 * 变量替换
	 * @param String $string 需要替换的字符串
	 * @param Array $attributes key=>value, 字符串中的 {$key}替换成 value （可选）
	 * @return String
	 */
	public function replace($string, $attributes = array()) {
		$attributes = $this->parseAttributes($attributes);
		
		return str_replace(
			array_merge($this->_attrs['keys'], $attributes[0]),
			array_merge($this->_attrs['values'], $attributes[1]), 
			$string
		);
	}
	
	/**
	 * 根据传入的参数做变量替换
	 * @param String $string 需要替换的字符串
	 * @param Array $attributes key=>value, 字符串中的 {$key}替换成 value
	 * @return String
	 */
	public function replaceAttributes($string, $attributes) {
		$attributes = $this->parseAttributes($attributes);
		
		return str_replace($attributes[0], $attributes[1], $string);
	}
	
	/**
	 * 添加需要替换的字段
	 * @param $attributes Array key=>values
	 * return Array
	 */
	public function parseAttributes($attributes) {
		$keys = $values = array();
		
		if(!empty($attributes) && is_array($attributes)) {
			$keys = array_keys($attributes);
			$values = array_values($attributes);
			
			$keys = array_map(function($item) {
				return '{$'.$item.'}';
			}, $keys);
		}
		
		return array($keys, $values);
	}
}