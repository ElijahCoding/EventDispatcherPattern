<?php

namespace App\Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Tests\Stubs\{UserSignedUp, EventStubNoName};

class EventTest extends TestCase
{
  /** @test */
  public function can_get_event_name()
  {
    $event = new UserSignedUp();

    $this->assertEquals('UserSignedUp', $event->getName());
  }

  /** @test */
  public function it_defaults_to_an_event_name_of_the_class_name()
  {
    $event = new EventStubNoName();

    $this->assertEquals('EventStubNoName', $event->getName());
  }
}
