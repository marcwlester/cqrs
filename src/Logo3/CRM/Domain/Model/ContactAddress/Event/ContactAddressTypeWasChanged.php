<?php

/**
 * Created by PhpStorm.
 * User: marc
 * Date: 09/11/16
 * Time: 11:07 PM
 */

namespace Logo3\CRM\Domain\Model\ContactAddress\Event;

use Logo3\Common\Serializable;
use Logo3\CRM\Domain\Model\ContactAddress\ContactAddressId;
use Logo3\CRM\Domain\Model\ContactAddress\Type;

class ContactAddressTypeWasChanged implements Serializable
{

    /** @var  ContactAddressId */
    public $id;

    /** @var  Type */
    public $oldType;

    /** @var  Type */
    public $newType;

    /**
     * ContactAddressTypeWasChanged constructor.
     * @param ContactAddressId $id
     * @param Type $oldType
     * @param Type $newType
     */
    public function __construct($id, Type $oldType, Type $newType)
    {
        $this->id = $id;
        $this->oldType = $oldType;
        $this->newType = $newType;
    }

    public function serialize()
    {
        return array(
            'id' => $this->id->serialize(),
            'oldType' => $this->oldType !== null ? $this->oldType->serialize() : null,
            'newType' => $this->newType->serialize(),
        );
    }

    public static function deserialize(array $data)
    {
        return new static(
            ContactAddressId::deserialize($data['id']),
            $data['oldType'] !== null ? Type::deserialize($data['oldType']) : null,
            Type::deserialize($data['newType'])
        );
    }
}