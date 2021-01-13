<?php

namespace App\EventListener;

class TodoListener
{
    
    public function postPersist()
    {
        dump($var="hello from post persist event listener Todo");
    }

}

?>

