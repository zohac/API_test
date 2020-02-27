<?php

namespace App\Dto;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class EntityDto.
 *
 * @ApiResource()
 */
final class EntityDto
{
    public $namespace;

    /**
     * @Assert\NotBlank
     * @Assert\NotNull
     */
    public $name;

    /**
     * @Assert\Type("boolean")
     *
     * @var bool
     */
    public $apiResource = false;

    /**
     * @var AttributDto[]
     */
    public $attributs = [];
}
