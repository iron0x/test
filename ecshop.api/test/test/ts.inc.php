<?php
class ts extends Action
{
    protected $paramsRules = 
    [
        'pw' => ['get', 0, 'integer', 0, '_test']
    ];

    //     'name' => ['revice method', 'is must', 'type', 'default value', 'auth function']

    private function do($pw)
    {
        #return gettype($i).'>>'.$i;

    	$a=rand(1,1000);
    	echo $a.'<br />';
    	$l = $a%9;
    	echo $l.'<br />';
    	$pw = $a*10+$l;
    	echo $pw.'<br />';
    	echo '------------------<br />';
    	$last = $pw%10;
    	echo $pw.'<br />';
    	echo $last.'<br />';
        return $last === (($pw-$last)/10)%9;
    }
}

function _test($value)
{
	return true;
}