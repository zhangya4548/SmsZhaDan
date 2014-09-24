<?php
/**
 * 0019 相亲
 */

return array(
	'type'=>'complex',
	'cookie'=> '0019.cookie',
	'referer'=> 'http://www.0019.com/site/reg.html',
	'list'=> array(
		array(
			'url'=>'http://www.0019.com/site/reg.html',
			'data'=>'',
			'log'=> false
		),
		array(
			'url'=>'http://www.0019.com/site/reg',
			'post'=> true,
			'log'=> false,
			'data'=>'email={$millisecond}12@qq.com&telphone={$mobile}&sex=0&year=1987&month=6&day=8&workprovincereg=10102000&workcity=10102001&checkbox=1&sitereg=2&submit=submit'
		),
		array(
			'url'=>'http://www.0019.com/index.php/resetpassword/MobileverifyAjax',
			'post'=> true,
			'data'=> 'mobile={$mobile}&plat=1',
		),
	)
);