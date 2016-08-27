<?php
/*
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
 */




class GZ_session implements SessionHandlerInterface
{
	public function destroy($sessionId)
	{
		echo __METHOD__.'<br />';return true;
	}
	public function read($sessionId)
	{
		echo $sessionId.'<br />';
		echo __METHOD__.'<br />';return file_get_contents(__DIR__.'/sess_'.$sessionId);
	}
	public function write($sessionId, $data)
	{
		file_put_contents(__DIR__.'/sess_'.$sessionId, $data);
		echo $sessionId.'<br />';
		echo $data.'<br />';
		echo __METHOD__.'<br />';return true;
	}

	public function open($savePath, $sessionName)
	{
		echo $savePath.'<br />';
		echo $sessionName.'<br />';
		echo __METHOD__.'<br />';
		return true;
	}

	public function gc($maxlifetime = 10000)
	{
		echo __METHOD__.'<br />';
		return true;
	}
	public function close()
	{
		echo __METHOD__.'<br />';
		return true;
	}
}

session_save_path(__DIR__);
session_set_save_handler(new GZ_session);
session_register_shutdown();
session_start();

#var_dump(session_id());
#var_dump($_SESSION);
echo '<br />';
#$_SESSION['num'] = '111';
#$_SESSION['numa'] = 234;
#$_SESSION['numds'] = ['sf'=>1233, 'dx'=>'mdsd'];
#$_SESSION['numdsz'] = [1233, 'mdsd'];
#$_SESSION['num2'] = 1.23;
#$_SESSION['numd'] = new SQLite3('./qq.db');
#session_write_close(); 
#session_destroy();









