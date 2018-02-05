<?php

namespace App\Events\User;

use App\Models\User;
use App\Core\Events\Event;

class UserSignedIn extends Event
{
  public $user;

  public function __construct(User $user)
  {
    $this->user = $user;
  }

  
}
