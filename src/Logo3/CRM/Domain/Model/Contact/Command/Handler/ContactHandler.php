<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 04/11/16
 * Time: 10:35 PM
 */

namespace Logo3\CRM\Domain\Model\Contact\Command\Handler;


use Logo3\CRM\Domain\Model\Contact\ContactRepository;

class ContactHandler
{
    protected $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function getContactRepository()
    {
        return $this->contactRepository;
    }
}