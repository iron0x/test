<?php

/* 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */
interface Handler
{
	function create(array $data);
	function delete(array $condition);
	function update(array $data, array $condition);
	function fetch(array $condition);
}

class SQLiteHandler implements Handler
{
	private $db = null;
	private $tableName = '';

	public function __construct($dbPath)
	{
		$this->db = new SQLite3($dbPath);
		$this->tableName = 'session';		
	}
	
	public function create(array $data = [])
	{
		if(!$data)
		{
			return false;
		}
		$cv = $this->createInsert($data);
		return $this->db->exec("INSERT INTO `{$this->tableName}`({$cv['columns']}) VALUES({$cv['values']})");
	}
	public function delete(array $condition)
	{
		$cv = $this->createSelect($condition);
		return $this->db->exec("DELETE FROM `{$this->tableName}` WHERE {$cv}");
	}
	public function update(array $data, array $condition)
	{
		$x = $this->createUpdata($data);
		$c = $this->createSelect($condition);
		return $this->db->exec("UPDATE `{$this->tableName}` SET {$x} WHERE {$c}");
	}
	public function fetch(array $condition)
	{
		$c = $this->createSelect($condition);
		$result = $this->db->query("SELECT * FROM `{$this->tableName}` WHERE {$c}");
		if(!$result)
		{
			return false;
		}
		$data = $result->fetchArray(SQLITE3_ASSOC);
		$result->finalize();
		return $data;
		#while($data[] = $result->fetchArray(SQLITE3_ASSOC))
	}
	public function __destruct()
	{
		$this->db->close();
	}
	private function createInsert(array $data)
	{
		$columns = '';
		$values  = '';
		foreach($data as $k => $v)
		{
			$columns .= "`{$k}`,";
			$values  .= "'{$v}',";
		}
		return array('columns' => rtrim($columns, ','), 'values' => rtrim($values,  ','));
	}

	private function createSelect(array $condition)
	{
		$_condition = '';
		foreach($condition as $k => $v)
		{
			$_condition .= "`{$k}`='{$v}' AND ";
		}
		return rtrim($_condition, ' AND ');
	}

	private function createUpdata(array $data)
	{
		$sql = '';
		foreach($data as $k => $v)
		{
			$sql .= "`{$k}`='{$v}',";
		}
		return rtrim($sql, ',');
	}
}
/*
	session	table

	sess_id varchar(64)
	sess_data text
	sess_last_time int
*/



#$db = new SQLite3(':memory:');
#$db = new SQLite3('./sess.db');

/*
$db->createCollation('translit_ascii', function ($a, $b) {
    $a = transliterator_transliterate('Any-Latin; Latin-ASCII; Lower()', $a);
    $b = transliterator_transliterate('Any-Latin; Latin-ASCII; Lower()', $b);
    return strcmp($a, $b);
});

$db->exec('
  CREATE TABLE people (name COLLATE translit_ascii);
  INSERT INTO people VALUES ("Émilie");
  INSERT INTO people VALUES ("Zebra");
  INSERT INTO people VALUES ("Emile");
  INSERT INTO people VALUES ("Arthur");
');

$stmt = $db->prepare('SELECT name FROM people ORDER BY name;');
$result = $stmt->execute();

while ($row = $result->fetchArray())
{
    echo $row['name'] . PHP_EOL;
}
 */
/*
$db->exec('
	CREATE TABLE IF NOT EXISTS `session` (
		`session_id` varchar(32) not null primary key,
		`session_data` text not null default \'\',
		`session_last_time` int not null default 0
	);
');
 */
class GZ_session implements SessionHandlerInterface
{
	private static $handler = null;
	public function __construct(Handler $handler)
	{
#		parent::__construct();
		if(!(self::$handler instanceof Handler))
		{
			self::$handler = null;
			self::$handler = $handler;
		}
	}

	public function destroy($sessionId)
	{
		echo __METHOD__.'<br />';
		return self::$handler->delete(['session_id' => $sessionId]);
	}
	public function read($sessionId)
	{
		echo __METHOD__.'<br />';
		$row = self::$handler->fetch(['session_id' => $sessionId]);
		if($row === false)
		{
			self::$handler->create(array('session_id' => $sessionId));
			$row = array('session_data' => '');
		}
		return $row['session_data'];
	}
	public function write($sessionId, $data)
	{
		echo __METHOD__.'<br />';
		return self::$handler->update(array('session_data' => $data, 'session_last_time' => time()), array('session_id' => $sessionId));
	}
	public function open($save_path, $session_name){return true;}
	public function gc($maxLifeTime){return true;}
	public function close(){return true;}
}
ini_set('session.handler', 'user');
session_set_save_handler(new GZ_session(new SQLiteHandler('./sess.db')));
session_register_shutdown();
session_start();

var_dump(session_id());
var_dump($_SESSION);
echo '<br />';
$_SESSION['num'] = '111';
$_SESSION['numa'] = 234;
$_SESSION['numds'] = ['sf'=>1233, 'dx'=>'mdsd'];
$_SESSION['numdsz'] = [1233, 'mdsd'];
$_SESSION['num2'] = 1.23;
$_SESSION['numd'] = new SQLite3('./qq.db');
#session_write_close(); 
#session_destroy();






