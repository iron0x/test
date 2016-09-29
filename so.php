<?php
#$wsdlURL = "http://gboss.id5.cn/services/QueryValidatorServices?wsdl";

#$soap = new SoapClient ( $wsdlURL );var_dump($soap);exit;

class one
{

	const SS = 'sdddsfmdskfvd';
#	define('SS', 'asdd');

	public function __construct()
	{
		define('ONE', 'ddddddddddddd');

		echo self::SS;
	}
}

$a = new one;

echo ONE;

echo one::SS;

#echo SS;
