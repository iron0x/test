<?php

$content = file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'ecshop.sql');

#$content = str_replace(['unsigned', ], ['', ], $content);

$content = preg_replace
(
	['/mediumint\(\d+\)/', '/unsigned/', '/varchar\(\d+\)/', '/tinyint\(\d+\)/', '/AUTO_INCREMENT/'],
	['intger', '', 'text', 'intger', ''],
	$content
);

$m = [];

preg_match_all('/(CREATE TABLE.*?)\) ENGINE.*?;/s', $content, $m);

var_dump($m);

/*

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