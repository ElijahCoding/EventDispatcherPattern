<?php

namespace App\Tests\Unit;

use TypeError;
use PHPUnit\Framework\TestCase;
use App\Tests\Stubs\EventStub;
use App\Tests\Stubs\ListenerStub;

class ListenerTest extends TestCase
{
  /** @test */
  public function handle_method_throws_error_if_invalid_event_given()
  {
    $this->expectException(TypeError::class);

    $listener = new ListenerStub();
    $listener->handle('not an event');
  }

  /** @test */
  public function handle_method_accepts_an_event()
  {
    $listener = new ListenerStub();
    $listener->handle(new EventStub());

    $this->addToAssertionCount(1);
  }
}
