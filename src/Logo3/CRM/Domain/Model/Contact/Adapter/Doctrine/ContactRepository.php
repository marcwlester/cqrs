<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 08/11/16
 * Time: 11:06 PM
 */

namespace Logo3\CRM\Domain\Model\Contact\Adapter\Doctrine;

use Doctrine\ORM\EntityRepository;
use Logo3\CRM\Domain\Model\Contact\Contact;
use Logo3\CRM\Domain\Model\Contact\ContactRepository as ContactRepositoryInterface;


class ContactRepository extends EntityRepository implements ContactRepositoryInterface
{

    /**
     * @param $id
     * @return Contact
     */
    public function find($id)
    {
        // TODO: Implement find() method.
    }

    /**
     * @return Contact[]
     */
    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

    /**
     * @param Contact $contact
     */
    public function save(Contact $contact)
    {
        $this->getEntityManager()->persist($contact);
        $events = $contact->getRecordedEvents();

    }
}