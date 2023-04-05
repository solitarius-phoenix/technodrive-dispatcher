<?php

namespace Technodrive\Dispatcher\Factory;

use Technodrive\Core\Interface\ContainerInterface;
use Technodrive\Core\Interface\FactoryInterface;
use Technodrive\Dispatcher\Dispatcher;
use Technodrive\Process\Process;
use Technodrive\Process\ProcessManager;

class DispatcherFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container)
    {
        $process = $container->get(ProcessManager::class)->getProcess();
        $controllerClass = $process->getRouteMatch()->getControllerName();
        $controller = $container->get($controllerClass);
        return new Dispatcher($process, $controller);
    }

}