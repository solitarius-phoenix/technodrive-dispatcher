<?php

namespace Technodrive\Dispatcher\Listener\Factory;

use Technodrive\Core\Interface\ContainerInterface;
use Technodrive\Core\Interface\FactoryInterface;
use Technodrive\Dispatcher\Dispatcher;
use Technodrive\Dispatcher\Listener\DispatcherListener;

class DispatcherListenerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container)
    {
        $dispatcher = $container->get(Dispatcher::class);
        return new DispatcherListener($dispatcher);
    }
}