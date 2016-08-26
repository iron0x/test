<?php


$db->exec('
	CREATE TABLE `session` (
		`session_id` varchar(32) not null primary key,
		`session_data` text not null default '',
		`session_last` int not null default 0
	);
');

class GZ_session extends SessionHandlerInterface
{
	private static $handler = null;
	public function __construct(Handler $handler)
	{
		parent::__construct();
		if(!(self::$handler instanceof Handler))
		{
			self::$handler = null;
			self::$handler = $handler;
		}
	}

	public function destroy($sessionId)
	{
		return self::$handler->delete($sessionId);
	}
	public function read($sessionId)
	{
		$data = self::$handler->fetch($sessionId);
		if()
	}
	public function write($sessionId, $data)
	{
	
	}

	public function open(){return true;}
	public function gc(){return true;}
	public function close(){return true;}
}
