<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 09/11/16
 * Time: 10:57 PM
 */

namespace Logo3\CRM\Domain\Model\ContactAddress;


use Logo3\Common\Serializable;

class Type implements Serializable
{
    protected $value;

    public function __construct()
    {
    }

    public function __toString()
    {
        return $this->toString();
    }

    public function toString()
    {
        return (string)$this->value;
    }

    public function equals(Type $type)
    {
        return $this->getValue() === $type->getValue();
    }

    public function getValue()
    {
        return $this->value;
    }


    public function serialize()
    {
        return array(
            'value' => $this->value
        );
    }

    public static function deserialize(array $data)
    {
        return new static($data['value']);
    }
}