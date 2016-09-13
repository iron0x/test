<?php
class test extends Controller
{
    protected $actions = 
    [
        'testi' => 'test.testi',
        'ts' => 'test.ts'
    ];

    protected $actionsRules =
    [
        'testi' => false,
        'ts' => false
    ];
}
