<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 04/11/16
 * Time: 10:45 PM
 */

namespace Logo3\CRM\Domain\Model\Address\Event;


class AddressWasCreated
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}