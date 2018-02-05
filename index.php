<?php

use App\Models\User;
use App\Core\Events\Dispatcher;
use App\Listeners\User\SendSignInEmail;
use App\Listeners\User\UpdateLastSignInDate;
use App\Events\User\UserSignedIn;

require_once 'vendor/autoload.php';

$user = new User;
$user->id = 1;
$user->email = 'elijah@gmail.com';

$dispatcher = new Dispatcher;

$dispatcher->addListener('UserSignedIn', new SendSignInEmail());
$dispatcher->addListener('UserSignedIn', new UpdateLastSignInDate());

$dispatcher->dispatch(new UserSignedIn($user));
