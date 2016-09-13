<?php
class testi extends Action
{
    protected $paramsRules = 
    [
        'i' => ['get', 0, 'integer', 0]
    ];

    //     'name' => ['revice method', 'is must', 'type', 'default value', 'auth function']

    private function do($i)
    {
        return gettype($i).'>>'.$i;
    }
}