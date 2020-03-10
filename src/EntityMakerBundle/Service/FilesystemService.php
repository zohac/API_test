<?php

namespace App\EntityMakerBundle\Service;

use Symfony\Component\Filesystem\Filesystem;

class FilesystemService
{
    /**
     * @var Filesystem
     */
    private $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * @return Filesystem
     */
    public function getFilesystem(): Filesystem
    {
        return $this->filesystem;
    }
}
