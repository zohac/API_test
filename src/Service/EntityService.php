<?php

namespace App\Service;

use Symfony\Component\Filesystem\Filesystem;

class EntityService
{
    /**
     * @var Filesystem
     */
    private $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }
}
