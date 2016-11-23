<?php

/**
 * Created by PhpStorm.
 * User: marc
 * Date: 04/11/16
 * Time: 10:15 PM
 */

namespace Logo3\CRM\Domain\Model\Contact\Event;

use Logo3\Common\Serializable;
use Logo3\CRM\Domain\Model\Contact\ContactId;

class ContactWasCreated implements Serializable
{

    /** @var ContactId */
    public $id;

    /** @var  string */
    public $firstName;

    /** @var  string */
    public $lastName;

    /** @var  string */
    public $email;

    /**
     * ContactWasCreated constructor.
     * @param ContactId $id
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     */
    public function __construct(ContactId $id, $firstName, $lastName, $email)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    public function serialize()
    {
        return array(
            'id' => $this->id->serialize(),
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email
        );
    }

    public static function deserialize(array $data)
    {
        return new static(
            ContactId::deserialize($data['id']),
            $data['firstName'],
            $data['lastName'],
            $data['email']
        );
    }
}