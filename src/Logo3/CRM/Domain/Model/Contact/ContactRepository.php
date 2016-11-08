<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 04/11/16
 * Time: 10:36 PM
 */

namespace Logo3\CRM\Domain\Model\Contact;


interface ContactRepository
{
    /**
     * @param $id
     * @return Contact
     */
    public function find($id);

    /**
     * @return Contact[]
     */
    public function findAll();

    /**
     * @param Contact $contact
     */
    public function save(Contact $contact);
}