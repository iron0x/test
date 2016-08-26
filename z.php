<?php
/*
class MYDB extends Sqlite3{}

#$a = new stdClass();
$a = new MYDB('./a.db');

var_dump($a instanceof stdClass);
#var_dump($a instanceof Sqlite3);
#*/

/*

SQLite3 {

#设置一个繁忙的处理程序，将休眠，直到该数据库没有锁定或达到超时。
public bool busyTimeout ( int $msecs )

#由最近的SQL语句返回已更改（或插入或删除）数据库中的行数	
	public int changes ( void )

public bool close ( void )
public __construct ( string $filename [, int $flags = SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE [, string $encryption_key = null ]] )
public bool createAggregate ( string $name , mixed $step_callback , mixed $final_callback [, int $argument_count = -1 ] )
public bool createCollation ( string $name , callable $callback )
public bool createFunction ( string $name , mixed $callback [, int $argument_count = -1 ] )
bool enableExceptions ([ bool $enableExceptions = false ] )
public static string escapeString ( string $value )
public bool exec ( string $query )
public int lastErrorCode ( void )
public string lastErrorMsg ( void )
public int lastInsertRowID ( void )
public bool loadExtension ( string $shared_library )
public void open ( string $filename [, int $flags = SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE [, string $encryption_key = null ]] )
public resource open ( string $table , string $column , int $rowid [, string $dbname = "main" ] )
public SQLite3Stmt prepare ( string $query )
public SQLite3Result query ( string $query )
public mixed querySingle ( string $query [, bool $entire_row = false ] )
public static array version ( void )
}

integer PRIMARY KEY autoincrement, 

SQLite3Result {

public string columnName ( int $column_number )
public int columnType ( int $column_number )
public array fetchArray ([ int $mode = SQLITE3_BOTH ] )
public bool finalize ( void )
public int numColumns ( void )
public bool reset ( void )
}

*/

$s = new SQLite3('./s.db');

$s->enableExceptions(true);

$b = $s->exec(<<<_SQL
	CREATE TABLE IF NOT EXISTS `sess`(
		`id` integer primary key autoincrement,
		`name` varchar(32) not null default '',
		`age` int not null default 0
	);
_SQL
);

var_dump($b);
var_dump($s->lastErrorCode());
var_dump($s->lastErrorMsg());

#$c = $s->exec('insert into `sess`(`name`, `age`) values(\'one\', 10),(\'two\', 103),(\'three\', 104)');
#
#var_dump($c);
#var_dump($s->lastErrorCode());
#var_dump($s->lastErrorMsg());
#var_dump($s->changes());
#var_dump($s->lastInsertRowID());

$d = $s->query('select * from `sess` limit 3');

var_dump($d);
var_dump($s->lastErrorCode());
var_dump($s->lastErrorMsg());


var_dump($d->columnName(0).'-->'.$d->columnType(0));

var_dump($d->columnName(1).'-->'.$d->columnType(1));

var_dump($d->columnName(2).'-->'.$d->columnType(2));

var_dump($d->numColumns());

while($row = $d->fetchArray(SQLITE3_ASSOC))
{
	var_dump($row);
}

$d->finalize();

#$s->close();

$d = $s->querySingle('select COUNT(`id`) from `sess`');

var_dump($d);


var_dump($s->version());


if($stmt = $s->prepare('SELECT id,name FROM `sess`'))
{
         $result = $stmt->execute();
         $names=array();
         while($arr=$result->fetchArray(SQLITE3_ASSOC))
         {
          $names[$arr['id']]=$arr['name'];
		 }
		 var_dump($names);
}
