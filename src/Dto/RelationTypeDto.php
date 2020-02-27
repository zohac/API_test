<?php

namespace App\Dto;

class RelationTypeDto extends TypeDto
{
    public const RELATION_TYPE = [
        'ManyToOne',
        'OneToMany',
        'ManyToMany',
        'OneToOne',
    ];

    public $relatedEntity;

    /**
     * @Assert\Type("boolean")
     */
    public $newPropertyToRelatedEntity = true;

    /**
     * @Assert\Type("boolean")
     */
    public $newFieldInsideRelatedEntity = false;

    /**
     * @Assert\IsTrue()
     */
    public function isRelatedEntityExist()
    {
        if (!$this->relatedEntity) {
            return true;
        }

        return class_exists($this->relatedEntity);
    }
}
