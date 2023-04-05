<?php

namespace Technodrive\Dispatcher;

use Technodrive\Mvc\Exception\ActionNotFoundException;
use Technodrive\Mvc\interface\ControllerInterface;
use Technodrive\Process\Process;

class Dispatcher
{
    protected Process $process;

    protected ControllerInterface $controller;

    public function __construct(Process $process, ControllerInterface $controller)
    {
        $this->process = $process;
        $this->process->setControllerModule(substr($controller::class, 0, strpos($controller::class, '\\')));
        $this->controller = $controller;
    }

    public function dispatch()
    {
        $action = strtolower($this->process->getRouteMatch()->getActionName() ) . 'Action';
        if(! method_exists($this->controller, $action)) {
            throw new ActionNotFoundException();
        }
        $this->process->getResponse()->setView($this->controller->$action());
    }
}