<?php

namespace App\Listeners\User;

use App\Core\Events\Event;
use App\Core\Events\Listener;

class SendSignInEmail extends Listener
{
  public function handle(Event $event)
  {
    echo 'send sign in email to ' . $event->user->email;
  }
}
