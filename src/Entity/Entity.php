<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *      collectionOperations={
 *          "post"={
 *              "method"="POST"
 *          }
 *      },
 *     itemOperations={}
 * )
 */
class Entity
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $namespace;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @ApiProperty(identifier=true)
     *
     * @Assert\NotBlank
     * @Assert\NotNull
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     *
     * @Assert\Type("boolean")
     */
    private $apiResource = false;

    public function getNamespace(): ?string
    {
        return $this->namespace;
    }

    public function setNamespace(?string $namespace): self
    {
        $this->namespace = $namespace;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getApiResource(): ?bool
    {
        return $this->apiResource;
    }

    public function setApiResource(bool $apiResource): self
    {
        $this->apiResource = $apiResource;

        return $this;
    }
}
