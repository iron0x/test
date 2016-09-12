<?php
class Controller
{
    protected $actions = [];
    protected $actionsRules = [];

    public function getActionRule($actionName = '')
    {
        if ( isset($this->actions[$actionName]) && isset($this->actionsRules[$actionName]) )
        {
            return $this->actionsRule[$actionName];
        }
        return false;
    }
}
