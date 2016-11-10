<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 09/11/16
 * Time: 10:54 PM
 */

namespace Logo3\CRM\Domain\Model\ContactAddress;

use Logo3\Common\Domain\Model\EventRecorder;
use Logo3\CRM\Domain\Model\Address\AddressId;
use Logo3\CRM\Domain\Model\Contact\ContactId;
use Logo3\CRM\Domain\Model\ContactAddress\Event\ContactAddressTypeWasChanged;

class ContactAddress
{
    use EventRecorder;

    /**
     * @var ContactAddressId
     */
    protected $id;

    /**
     * @var ContactId
     */
    protected $contactId;

    /** @var  AddressId */
    protected $addressId;

    /** @var  Type */
    protected $type;

    /** @var  bool */
    protected $primary;

    public function setType(Type $type)
    {
        // don't change if its the same
        if ($this->type !== null && $this->type->equals($type)) {
            return;
        }

        $this->recordEvent(new ContactAddressTypeWasChanged($this->id, $this->type, $type));
    }

    public function applyContactAddressTypeWasChanged(ContactAddressTypeWasChanged $contactAddressTypeWasChanged)
    {
        $this->type = $contactAddressTypeWasChanged->newType;
    }
}