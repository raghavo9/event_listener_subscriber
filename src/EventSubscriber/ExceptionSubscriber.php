<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;



class ExceptionSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
       
        return [
            KernelEvents::EXCEPTION => [
                ['showErrorMsg',20],
            ],
        ];
    }


    public function showErrorMsg()
    {
        dump($var="something wrong happened");
    }


   
}


?>