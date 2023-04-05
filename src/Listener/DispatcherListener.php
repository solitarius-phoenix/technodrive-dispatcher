<?php

namespace Technodrive\Dispatcher\Listener;

use Technodrive\Core\Interface\ListenerInterface;
use Technodrive\Dispatcher\Dispatcher;

class DispatcherListener implements ListenerInterface
{
    protected Dispatcher $dispatcher;
    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function call()
    {
        $this->dispatcher->dispatch();;
    }
}