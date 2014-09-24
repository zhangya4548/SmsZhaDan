<?php
/**
 * Ë³·á
 */
return array(
	'type'=>'complex',
	'cookie'=> 'sf-express.cookie',
	'referer'=> 'https://i.sf-express.com/user/register/sc/register.html',
	'list'=> array(
		array(
			'url'=>'https://i.sf-express.com/user/register/sc/register.html',
			'data'=> '',
			'log'=> false
		),
		array(
			'url'=>'https://i.sf-express.com/service/user/mobilebind/mobile/mobileinses',
			'data'=> '_={$millisecond}',
			'post'=> true
		),
		/*
		array(
			'url'=>'https://i.sf-express.com/service/user/register/generalregister/mobile/same',
			'data'=>'phone={$mobile}',
			'post'=> true
		),
		*/
		array(
			'url'=>'https://i.sf-express.com/service/user/register/sendcode',
			'data'=>'phone={$mobile}',
			'post'=> true
		)
	)
);