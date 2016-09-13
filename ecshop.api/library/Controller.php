<?php
class Controller
{
    protected $actions = [];
    protected $actionsRules = [];

    public function getActionRule($actionName = '')
    {
        if ( isset($this->actions[$actionName]) && isset($this->actionsRules[$actionName]) )
        {
            return $this->actionsRules[$actionName];
        }
        return false;
    }

    public function getAction($actionName)
    {
        $action = null;
        if (isset($this->actions[$actionName])) {
            require APP_PATH.str_replace('.', DS, $this->actions[$actionName]).'.inc.php';
            $action = new $actionName;
        }
        else
        {
            throw new Exception("This action is not exists", 003);
        }
        return $action;
    }
}