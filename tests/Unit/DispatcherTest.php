<?php

namespace App\Tests\Unit;

use App\Core\Events\Dispatcher;
use App\Tests\Stubs\ListenerStub;
use PHPUnit\Framework\TestCase;

class DispatcherTest extends TestCase
{
  /** @test */
  public function it_holds_listeners_in_an_array()
  {
    $dispatcher = new Dispatcher();

    $this->assertEmpty($dispatcher->getListeners());
    $this->assertInternalType('array', $dispatcher->getListeners());
  }

  /** @test */
  public function it_can_add_listener()
  {
    $dispatcher = new Dispatcher();

    $dispatcher->addListener('UserSignedUp', new ListenerStub());

    // var_dump($dispatcher->getListeners());

    $this->assertCount(1, $dispatcher->getListeners()['UserSignedUp']);
  }

  /** @test */
  public function it_can_get_listeners_by_event_name()
  {
    $dispatcher = new Dispatcher();

    $dispatcher->addListener('UserSignedUp', new ListenerStub());

    $this->assertCount(1, $dispatcher->getListenersByEvent('UserSignedUp'));
  }

  /** @test */
  public function it_returns_empty_array_if_no_listeners_set_for_events()
  {
    $dispatcher = new Dispatcher();

    $this->assertCount(0, $dispatcher->getListenersByEvent('UserSignedUp'));
  }

  /** @test */
  public function it_can_check_if_has_listener_registered_for_event()
  {
    $dispatcher = new Dispatcher();

    $this->assertFalse($dispatcher->hasListeners('UserSignedUp'));
  }
}
