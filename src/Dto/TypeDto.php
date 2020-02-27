<?php

namespace App\Dto;

use App\Dto\Types\BigintType;
use App\Dto\Types\BooleanType;
use App\Dto\Types\FloatType;
use App\Dto\Types\IntegerType;
use App\Dto\Types\SmallintType;
use App\Dto\Types\StringType;
use App\Dto\Types\TextType;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class TypeDto.
 */
class TypeDto
{
    /**
     * @var array
     */
    public const TYPES = [
        StringType::TYPE,
        TextType::TYPE,
        BooleanType::TYPE,
        IntegerType::TYPE,
        SmallintType::TYPE,
        BigintType::TYPE,
        FloatType::TYPE,
        'array',
        'simple_array',
        'json',
        'object',
        'binary',
        'blob',
        'datetime',
        'datetime_immutable',
        'datetimetz',
        'datetimetz_immutable',
        'date',
        'date_immutable',
        'time',
        'time_immutable',
        'dateinterval',
        'decimal',
        'guid',
    ];

    /**
     * @Assert\Type("boolean")
     *
     * @var bool
     */
    public $nullable = false;

    /**
     * @return array
     */
    public static function getValideTypes(): array
    {
        return array_merge(self::TYPES, RelationTypeDto::RELATION_TYPE);
    }
}
