<?php

namespace AppBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class RoundingEvent extends Event
{
    public const NAME = 'app.round';

    private $number;

    public function __construct(float $number)
    {
        $this->number = $number;
    }

    /**
     * @return float
     */
    public function getNumber(): float
    {
        return $this->number;
    }

    /**
     * @param float $number
     */
    public function setNumber(float $number): void
    {
        $this->number = $number;
    }
}
