<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 04/11/16
 * Time: 10:33 PM
 */

namespace Logo3\CRM\Domain\Model\Contact\Command\Handler;


use Logo3\CRM\Domain\Model\Contact\Command\CreateContact;
use Logo3\CRM\Domain\Model\Contact\Contact;

class CreateContactHandler extends ContactHandler
{
    public function handle(CreateContact $createContact)
    {
        $contact = Contact::create($createContact->id, $createContact->firstName, $createContact->lastName, $createContact->email);

        $this->getContactRepository()->save($contact);
    }
}