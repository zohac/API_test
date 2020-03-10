<?php

namespace App\EntityBundle\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     collectionOperations={
 *          "post"={
 *              "method"="POST",
 *              "path"="/entity/make"
 *          }
 *     },
 *     itemOperations={"get"}
 * )
 */
class Entity
{
    private $namespace;

    /**
     * @ApiProperty(identifier=true)
     *
     * @Assert\NotBlank
     * @Assert\NotNull
     */
    private $name;

    /**
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
