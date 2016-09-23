<?php
$wsdlURL = "http://gboss.id5.cn/services/QueryValidatorServices?wsdl";

$soap = new SoapClient ( $wsdlURL );var_dump($soap);exit;
