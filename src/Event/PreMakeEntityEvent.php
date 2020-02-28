<?php

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;

class PreMakeEntityEvent extends Event
{
    /**
     * @var string
     */
    private $data;

    public const NAME = 'pre.make.entity';

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param string $data
     */
    public function setData(string $data): void
    {
        $this->data = $data;
    }
}
