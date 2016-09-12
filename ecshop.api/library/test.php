<?php
class test extends Controller
{
    protected $actions = 
    [
        'testi' => 'testi'
    ];

    protected $actionsRules =
    [
        'testi' => false
    ];
}

class testi extends Action
{
    protected $paramsRules = 
    [
        'i' => ['get', 1, int, 0] 
    ];

    //     'name' => ['revice method', 'is must', 'type', 'default value', 'auth function']

    private function do($i)
    {
        return gettype($i).'>>'.$i;
    }
}