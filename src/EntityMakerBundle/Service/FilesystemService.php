<?php

namespace App\EntityMakerBundle\Service;

use App\EntityBundle\Entity\Entity;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;

class FilesystemService
{
    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @var string
     */
    private $currentDir;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
        $this->currentDir = getcwd();
    }

    /**
     * @return Filesystem
     */
    public function getFilesystem(): Filesystem
    {
        return $this->filesystem;
    }

    public function makeNewDirectory()
    {
        try {
            $newDirPath = $this->currentDir.'/foo';

            if (!$this->filesystem->exists($newDirPath)) {
                $old = umask(0);
                $this->filesystem->mkdir($newDirPath, 0775);
//                $this->filesystem->chown($newDirPath, "www-data");
//                $this->filesystem->chgrp($newDirPath, "www-data");
                umask($old);
            }
        } catch (IOExceptionInterface $exception) {
            echo 'Error creating directory at'.$exception->getPath();
        }
    }

    public function createNewEntity(Entity $entity, string $content)
    {
        try {
            $entityPath = $this->currentDir.'/foo/'.ucfirst($entity->getClassName()).'.php';

            if (!$this->filesystem->exists($entityPath)) {
                $this->filesystem->touch($entityPath);
                $this->filesystem->chmod($entityPath, 0777);
                $this->filesystem->dumpFile($entityPath, $content);
//                $this->filesystem->appendToFile($entityPath, "This should be added to the end of the file.\n");
            }
        } catch (IOExceptionInterface $exception) {
            echo 'Error creating file at'.$exception->getPath();
        }
    }

//    public function est ce que l'entité existe()
//    {
//
//    }
}
