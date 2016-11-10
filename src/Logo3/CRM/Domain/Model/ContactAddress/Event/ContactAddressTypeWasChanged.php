<?php

/**
 * Created by PhpStorm.
 * User: marc
 * Date: 09/11/16
 * Time: 11:07 PM
 */

namespace Logo3\CRM\Domain\Model\ContactAddress\Event;

use Logo3\CRM\Domain\Model\ContactAddress\ContactAddressId;
use Logo3\CRM\Domain\Model\ContactAddress\Type;

class ContactAddressTypeWasChanged
{

    /** @var  ContactAddressId */
    public $id;

    /** @var  Type */
    public $oldType;

    /** @var  Type */
    public $newType;

    /**
     * ContactAddressTypeWasChanged constructor.
     * @param ContactAddressId $id
     * @param Type $oldType
     * @param Type $newType
     */
    public function __construct($id, Type $oldType, Type $newType)
    {
        $this->id = $id;
        $this->oldType = $oldType;
        $this->newType = $newType;
    }
}