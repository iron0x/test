<?php
// define('DS', DIRECTORY_SEPARATOR);
// define('ROOT', __DIR__.DS);

// ini_set('session.auto_start', 0);
// ini_set('session.save_path', ROOT.'sess');

// ini_set('session.gc_probability', 0);
// ini_set('session.gc_divisor', 1);
// ini_set('session.gc_maxlifetime', 0);

// #var_dump(ini_get_all());

// session_start();
// echo session_id();

// $_SESSION['name'] = 'xiaoming';
// $_SESSION['age']  = 12;


#error
#debug
// error_reporting
// display_errors
// log_errors boolean
// error_log string
error_reporting(E_ALL);
ini_set('display_errors','off');
ini_set('log_errors', 1);
ini_set('error_log','my_file.log');
foreach(1 as $i);

#ini_set('error_log',''); #sys log
#foreach(1 as $i);

#ini_set('error_log','/dev/null'); #linux error msg gone
#foreach(1 as $i);