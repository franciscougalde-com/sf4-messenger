<?php

namespace App\MessageHandler;

use App\Message\NotificationMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class NotificationHandler implements MessageHandlerInterface
{
    /**
     * @param NotificationMessage $message
     */
    public function __invoke(NotificationMessage $message)
    {
        foreach ($message->getUsers() as $user) {
            echo $message->getMessage().': '.$user.PHP_EOL;
        }
    }
}
