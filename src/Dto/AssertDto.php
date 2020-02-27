<?php

namespace App\Dto;

/**
 * Class AssertDto.
 */
class AssertDto
{
    const NotBlank = 'NotBlank';
    const Blank = 'Blank';
    const NotNull = 'NotNull';
    const IsNull = 'IsNull';
    const IsTrue = 'IsTrue';
    const IsFalse = 'IsFalse';
    const Type = 'Type';

    public $assertName;

    public $message;

    public $groups = [];
}
