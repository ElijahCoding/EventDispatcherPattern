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

  public function getListenersByEvent($name)
  {
    if (!$this->hasListeners($name)) {
      return [];
    }

    return $this->listeners[$name];
  }

  public function hasListeners($name)
  {
      return isset($this->listeners[$name]);
  }

  public function addListener($name, Listener $listener)
  {
    $this->listeners[$name][] = $listener;
  }

}
