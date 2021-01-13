<?php

namespace App\EventListener;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
class KernelException
{

    public function onKernelException()
    {
        die("I am a listener");
    }
}





?>