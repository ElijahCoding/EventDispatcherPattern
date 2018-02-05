<?php

namespace App\Tests\Integration;

use App\Tests\Stubs\EventStub;
use App\Core\Events\Dispatcher;
use PHPUnit\Framework\TestCase;
use App\Tests\Stubs\ListenerStub;

class EventsTest extends TestCase
{
  /** @test */
  public function it_can_dispatch_an_event()
  {
    $dispatcher = new Dispatcher();

    $event = new EventStub();
    $mockedListener = $this->createMock(ListenerStub::class);

    $mockedListener->expects($this->once())->method('handle')->with($event);

    $dispatcher->addListener('UserSignedUp', $mockedListener);

    $dispatcher->dispatch($event);

  }

  /** @test */
  public function it_can_dispatch_an_event_with_multiple_listeners()
  {
    $dispatcher = new Dispatcher();

    $event = new EventStub();
    $mockedListener = $this->createMock(ListenerStub::class);
    $anotherMockedListener = $this->createMock(ListenerStub::class);

    $mockedListener->expects($this->once())->method('handle')->with($event);
    $anotherMockedListener->expects($this->once())->method('handle')->with($event);

    $dispatcher->addListener('UserSignedUp', $mockedListener);
    $dispatcher->addListener('UserSignedUp', $anotherMockedListener);

    $dispatcher->dispatch($event);

  }
}
