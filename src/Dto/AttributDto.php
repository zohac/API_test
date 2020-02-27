<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class AttributDto.
 */
class AttributDto
{
    /**
     * @Assert\NotBlank
     * @Assert\NotNull
     */
    public $name;

    /**
     * @var TypeDto
     */
    public $type;

    /**
     * @var AssertDto[]
     */
    public $asserts;

    /**
     * @Assert\IsTrue()
     */
    public function isTypeValid(): bool
    {
        return in_array($this->type, TypeDto::getValideTypes());
    }
}
