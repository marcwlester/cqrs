<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 04/11/16
 * Time: 10:45 PM
 */

namespace Logo3\CRM\Domain\Model\Address\Event;


use Logo3\Common\Serializable;
use Logo3\CRM\Domain\Model\Address\AddressId;

class AddressWasCreated implements Serializable
{
    public $id;

    public function __construct(AddressId $id)
    {
        $this->id = $id;
    }

    public function serialize()
    {
        return array(
            'id' => $this->id->serialize()
        );
    }

    public static function deserialize(array $data)
    {
        return new static(
            AddressId::deserialize($data['id'])
        );
    }
}