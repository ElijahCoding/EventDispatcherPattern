<?php

namespace App\Core\Events;

use App\Core\Events\Listener;

class Dispatcher
{
  protected $listeners = [];

  public function getListeners()
  {
    return $this->listeners;
  }

  public function addListener($name, Listener $listener)
  {
    $this->listeners[$name][] = $listener;
  }
}
