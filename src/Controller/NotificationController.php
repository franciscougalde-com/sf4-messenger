<?php

namespace App\Controller;

use App\Message\NotificationMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class NotificationController extends AbstractController
{
    /**
     * @Route("/send", name="notifications_send", methods={"GET"})
     * @param Request $request
     * @param MessageBusInterface $messageBus
     *
     * @return JsonResponse
     */
    public function sendNotifications(Request $request, MessageBusInterface $messageBus): JsonResponse
    {
        $users = [
            'user1@franciscougalde.com',
            'user2@franciscougalde.com',
            'user3@franciscougalde.com',
            'user4@franciscougalde.com',
        ];

        $messageBus->dispatch(new NotificationMessage($request->get('message'), $users));

        return JsonResponse::create('All messages have been sent');
    }
}
