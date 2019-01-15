<?php

namespace AppBundle\EventListener;

use AppBundle\Event\RoundingEvent;

class IncreaseRoundedNumberListener
{
    public function onAppRound(RoundingEvent $event)
    {
        $number = $event->getNumber();
        $event->setNumber($number + 0.22);
    }
}
