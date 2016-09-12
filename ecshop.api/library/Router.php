<?php
class Router
{
	public function resolve()
	{
		return explode('/', $_GET['url']);
	}
}