<?php
/*
ini_set('implicit_flush', 1);

#ob_start();
for($i=0;$i<10;$i++)
{
	if (!ob_get_level()) ob_start();
	echo $i."\n";
	var_dump(ob_get_level());
	ob_end_flush();
#	flush();
#	ob_end_clean();
	sleep(1);
}
 */


$s = '123456';

$sl = strlen($s) - 1;#echo $sl;exit;
/*
$s{$sl--} = 1;
$s{$sl--} = 'a';
echo $sl;
var_dump($s);
*/
$i = 0;
$ns = '';
/*
$ns{$i++} = 1;
$ns{$i++} = 'a';
echo $i;
*/
while((string)$ns{$i++} = $s{$sl--}) {var_dump($ns);var_dump($s);}

echo $ns;


exit;





$a = [];

function test( $buffer )
{
	global $a;
	$a[] = $buffer;
#	return 0;
	return str_replace('s', 'i', $buffer);
}

ob_start('test');

echo 123456;
print('kssssssssssssssssssssssssssssss');

#$l = ob_get_length();
#$c = ob_get_contents();
#ob_end_clean();
#var_dump($l);
#var_dump($c);

#ob_end_clean();
#ob_end_flush();
file_put_contents('./ob', json_encode($a));
var_dump($a);


