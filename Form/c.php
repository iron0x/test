<?php

/*
list($group, $page) = explode('/', trim($_GET['r'], '/'));

require __DIR__.'/'.$group.'/'.$page.'.php';

$p = new $page;

$p->display();

$p = null;

unset($p);

class Page
{
	public $title = __CLASS__;
	public $header = <<<HEADER
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh" lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
    <link rel="stylesheet" type="text/css" href="" />
    <title>{$this->title}</title>
</head>
<body>
HEADER;


	$items = 	
	[
		['']		
	];



	public function __construct($formItem)
	{
		$this->form = $formItem;
	}

	public function createItems()
	{
		if( empty($this->items) )
		{
			throw new Exception('items empty');
			return 0;
		}
		$itemsObject = [];
		foreach( $this->items as $item )
		{


			if( !in_array() )
			{
				throw new Exception('');
			}

text
passwd
hidden
file
checkbox
radio
select
selectmul
button
textarea
label

			$itemsObject[] = $this->form->form_.$item[0]($item[1], $item[2], $item[3], $item[4]);
		}

	}


}




*/
