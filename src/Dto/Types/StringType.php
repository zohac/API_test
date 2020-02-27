<?php

namespace App\Dto\Types;

use App\Dto\TypeDto;
use Symfony\Component\Validator\Constraints as Assert;

class StringType extends TypeDto
{
    public const TYPE = 'string';

    /**
     * @Assert\Type("integer")
     * @Assert\Positive
     */
    public $fieldLength = 255;
}
