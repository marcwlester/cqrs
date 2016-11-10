<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 04/11/16
 * Time: 10:09 PM
 */

namespace Logo3\CRM\Domain\Model\Contact;


use Logo3\Common\Domain\Model\EventRecorder;
use Logo3\CRM\Domain\Model\Contact\Event\ContactWasCreated;
use Logo3\CRM\Domain\Model\ContactAddress\Type;

class Contact
{
    use EventRecorder;

    /**
     * @var ContactId
     */
    protected $id;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var array
     */
    protected $addresses;

    protected function __construct()
    {

    }

    public static function create(ContactId $id, $firstName, $lastName, $email)
    {
        $instance = new static();
        $instance->recordEvent(new ContactWasCreated($id, $firstName, $lastName, $email));

        return $instance;
    }

    static public function instantiateForReconstitution()
    {
        return new static();
    }

    public function addAddress($address, Type $type, $isPrimary)
    {

    }

    protected function applyContactWasCreated(ContactWasCreated $contactWasCreated)
    {
        $this->id = $contactWasCreated->id;
        $this->firstName = $contactWasCreated->firstName;
        $this->lastName = $contactWasCreated->lastName;
        $this->email = $contactWasCreated->email;
    }
}