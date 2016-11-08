<?php

/**
 * Created by PhpStorm.
 * User: marc
 * Date: 04/11/16
 * Time: 10:15 PM
 */

namespace Logo3\CRM\Domain\Model\Contact\Event;

class ContactWasCreated
{

    /** @var string */
    public $id;

    /** @var  string */
    public $firstName;

    /** @var  string */
    public $lastName;

    /** @var  string */
    public $email;

    /**
     * ContactWasCreated constructor.
     * @param $id
     * @param $firstName
     * @param $lastName
     * @param $email
     */
    public function __construct($id, $firstName, $lastName, $email)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }
}