<?php

$a=12;
$i=0;
while ($i < 1000000) {
    $i++;
    sett("1.678767", 'int');
}

echo 'done';


exit;

function sett($var, $type)
{
    return settype($var, $type);
}

function setts($var, $type)
{
    $tmp = null;
            switch ($type) {
                case 'integer':
                    $tmp = (int)$var;
                    break;
                case 'float':
                    $tmp = (float)$var;
                    break;
                case 'string':
                    $tmp = (string)$var;
                    break;
            }
    return $tmp;
}