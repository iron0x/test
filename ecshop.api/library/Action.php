<?php
class Action
{
    protected $paramsRules = [];
    protected $params = [];
    protected $paramsEmpty = 1;

    // $params = 
    // [
    //     'name' => ['revice method', 'is must', 'type', 'default value', 'auth function']
    // ];

    public function __construct()
    {
        if ( !empty($this->paramsRules) ) {
            $this->getParams();
            $this->paramsEmpty = 0;
        }
    }

    public function run()
    {
        if (!method_exists($this,'do')) {
            throw new Exception("Error class", 002);
        }
        if ($this->paramsEmpty) {
            $res = call_user_func(array($this, 'do'));
        }
        else
        {
            $res = call_user_func_array(array($this, 'do'), $this->params);
        }
        return $res;
    }

    protected function getParams()
    {
        foreach ($params as $name => $value) {
            $tmp = $this->getValue($value[0], $name, $value[2]);

            if ($tmp === null) {
                if ($value[1] === 1) {
                    throw new Exception("Parameter '{$name}' must Transfer", 101);
                }
                if (isset($value[3])) {
                    $tmp = $value[3];
                }
            }

            if (isset($value[4])) {
                if (!$value[4]($tmp)) {
                    throw new Exception("This is not the normal way of using the parameter '{$name}'", 102);
                }
            }

            $this->params[] = $tmp;
        }
    }

    protected function getValue($receiveMethod, $name, $type)
    {
        $tempValue = null;
        switch($receiveMethod)
        {
            case 'post':
                // $tempValue = isset($_POST[$name]) ? ($type)$_POST[$name] : null;
                $tempValue = isset($_POST[$name]) ? $_POST[$name] : null;
                break;
            case 'get':
                // $tempValue = isset($_GET[$name]) ? ($type)$_GET[$name] : null;
                $tempValue = isset($_GET[$name]) ? $_GET[$name] : null;
                break;
            default :
                $tempValue = null;
                break;
        }
        return $tempValue;
    }
}