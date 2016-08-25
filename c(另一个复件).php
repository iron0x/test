<?php

$content = file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'ecshop.sql');

# replace unsigned ''
# replace ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ''
# replace \r\n \n
# CHARACTER SET utf8 COLLATE utf8_bin
$content = preg_replace(['/\).*?;/', '/unsigned /', '/\\r\\n/', '/CHARACTER SET utf8 COLLATE utf8_bin /'], [');', '', "\n", ''],$content);

$m = [];
$str = '';

preg_match_all('/CREATE TABLE.*?\);/s', $content, $m);

foreach ($m[0] as $k => $v) {
  # get tableName
  preg_match_all('/TABLE.*?(`\w+`)/', $v, $tableNameA);
  $tableName = $tableNameA[1][0];
  # get sql
  # replace
  $str .= preg_replace(['/`(\w+)`.*?AUTO_INCREMENT.*?,/', '/,\s+PRIMARY KEY.*?\);/s'], ['`\1` INTEGER PRIMARY KEY AUTOINCREMENT,', "\n);\n"], $v);
  # get index
  preg_match_all('/,\s+KEY\s+(`\w+`)\s+\((`\w+`)\)/s', $v, $indexs);
  foreach ($indexs[0] as $ik => $iv) {
    $indexName = rtrim($indexs[1][$ik], '`').'_'.ltrim($tableName, '`');
    $indexCol  = $indexs[2][$ik];
    $str .= "CREATE INDEX {$indexName} ON {$tableName} ({$indexCol});\n";
  }
}

file_put_contents(__DIR__.DIRECTORY_SEPARATOR.'ecshop.sqlite', $str);exit;

echo $str;exit;

#var_dump($m[0][1]);



#preg_match_all('/,\s+KEY\s+`(\w+)`\s+\(`(\w+)`\)/s', $m[0][1], $s);

#CREATE INDEX $s[2][0] 
#ON $s[1][0] ($s[3][0]);

var_dump($s);

exit;
$str = '';



#$str = explode("\n", $m[0][0]);

var_dump($str);

/*

CREATE TABLE IF NOT EXISTS `ecs_account_log` (
  `log_id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `user_id` mediumint(8) NOT NULL,
  `user_money` decimal(10,2) NOT NULL,
  `frozen_money` decimal(10,2) NOT NULL,
  `rank_points` mediumint(9) NOT NULL,
  `pay_points` mediumint(9) NOT NULL,
  `change_time` int(10) NOT NULL,
  `change_desc` varchar(255) NOT NULL,
  `change_type` tinyint(3) NOT NULL,
  PRIMARY KEY (`log_id`)
);



CREATE TABLE IF NOT EXISTS `ecs_wholesale` (
  `act_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` mediumint(8) unsigned NOT NULL,
  `goods_name` varchar(255) NOT NULL,
  `rank_ids` varchar(255) NOT NULL,
  `prices` text NOT NULL,
  `enabled` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`act_id`),
  KEY `goods_id` (`goods_id`)
*/

/*
CREATE TABLE IF NOT EXISTS `ecs_account_log` (
  `log_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `user_money` decimal(10,2) NOT NULL,
  `frozen_money` decimal(10,2) NOT NULL,
  `rank_points` mediumint(9) NOT NULL,
  `pay_points` mediumint(9) NOT NULL,
  `change_time` int(10) unsigned NOT NULL,
  `change_desc` varchar(255) NOT NULL,
  `change_type` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=418 ;
*/

/*
CREATE TABLE IF NOT EXISTS `ecs_account_log` (
  `log_id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) NOT NULL,
  `user_money` decimal(10,2) NOT NULL,
  `frozen_money` decimal(10,2) NOT NULL,
  `rank_points` mediumint(9) NOT NULL,
  `pay_points` mediumint(9) NOT NULL,
  `change_time` int(10) NOT NULL,
  `change_desc` varchar(255) NOT NULL,
  `change_type` tinyint(3) NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=418 ;
*/

#AUTOINCREMENT

/*
CREATE TABLE IF NOT EXISTS `ecs_account_log` (
  `log_id` mediumint(8) NOT NULL AUTOINCREMENT,
  `user_id` mediumint(8) NOT NULL,
  `user_money` decimal(10,2) NOT NULL,
  `frozen_money` decimal(10,2) NOT NULL,
  `rank_points` mediumint(9) NOT NULL,
  `pay_points` mediumint(9) NOT NULL,
  `change_time` int(10) NOT NULL,
  `change_desc` varchar(255) NOT NULL,
  `change_type` tinyint(3) NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTOINCREMENT=418 ;
*/

#INTEGER

/*
CREATE TABLE IF NOT EXISTS `ecs_account_log` (
  `log_id` INTEGER NOT NULL AUTOINCREMENT,
  `user_id` mediumint(8) NOT NULL,
  `user_money` decimal(10,2) NOT NULL,
  `frozen_money` decimal(10,2) NOT NULL,
  `rank_points` mediumint(9) NOT NULL,
  `pay_points` mediumint(9) NOT NULL,
  `change_time` int(10) NOT NULL,
  `change_desc` varchar(255) NOT NULL,
  `change_type` tinyint(3) NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTOINCREMENT=418 ;
*/

/*
CREATE TABLE IF NOT EXISTS `ecs_account_log` (
  `log_id` INTEGER AUTOINCREMENT,
  `user_id` mediumint(8) NOT NULL,
  `user_money` decimal(10,2) NOT NULL,
  `frozen_money` decimal(10,2) NOT NULL,
  `rank_points` mediumint(9) NOT NULL,
  `pay_points` mediumint(9) NOT NULL,
  `change_time` int(10) NOT NULL,
  `change_desc` varchar(255) NOT NULL,
  `change_type` tinyint(3) NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTOINCREMENT=418 ;
*/

/*
CREATE TABLE IF NOT EXISTS `ecs_account_log` (
  `log_id` INTEGER AUTOINCREMENT,
  `user_id` mediumint(8) NOT NULL,
  `user_money` decimal(10,2) NOT NULL,
  `frozen_money` decimal(10,2) NOT NULL,
  `rank_points` mediumint(9) NOT NULL,
  `pay_points` mediumint(9) NOT NULL,
  `change_time` int(10) NOT NULL,
  `change_desc` varchar(255) NOT NULL,
  `change_type` tinyint(3) NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `user_id` (`user_id`)
);
*/

/*
CREATE TABLE IF NOT EXISTS `ecs_account_log` (
  `log_id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  `user_id` mediumint(8) NOT NULL
);
*/

#preg_match_all('//', $content, $m);