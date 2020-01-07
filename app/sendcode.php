<?php
namespace App;
/**
 * 
 */
class sendcode
{
	public static function sendCode($phone){
		$code=rand(1111,9999);
		$nexmo=app('Nexmo\Client');
		$nexmo->message()->send([
			'to'=>'+91'.(int)$phone,
			'from'=>'dd',
			'text'=>'Verify Code:'.$code,
		]);;
		return $code;
	}
}