<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 04/11/16
 * Time: 10:22 PM
 */

namespace Logo3\CRM\Domain\Model\Address;


use Logo3\Common\Domain\Model\EventRecorder;
use Logo3\CRM\Domain\Model\Address\Event\AddressWasChanged;
use Logo3\CRM\Domain\Model\Address\Event\AddressWasCreated;

class Address
{
    use EventRecorder;

    /** @var  AddressId */
    protected $id;

    protected $address1;

    protected $address2;

    protected $address3;

    protected $city;

    protected $province;

    protected $postal;

    protected $country;

    protected function __construct()
    {

    }

    public static function create(AddressId $id)
    {
        $instance = new static();
        $instance->recordEvent(new AddressWasCreated($id));

        return $instance;
    }

    static public function instantiateForReconstitution()
    {
        return new static();
    }

    public function applyAddressWasCreated(AddressWasCreated $addressWasCreated)
    {
        $this->id = $addressWasCreated->id;
    }

    public function changeAddress($address1, $address2, $address3, $city, $province, $postal, $country)
    {
        // don't do anything if it really isn't changed
        if ($address1 === $this->address1
            && $address2 === $this->address2
            && $address3 === $this->address3
            && $city === $this->city
            && $province === $this->province
            && $postal === $this->postal
            && $country === $this->country
        ) {
            return;
        }

        $this->recordEvent(new AddressWasChanged($this->id, $address1, $address2, $address3, $city, $province, $postal, $country));
    }

    public function applyAddressWasChanged(AddressWasChanged $addressWasChanged)
    {
        $this->address1 = $addressWasChanged->address1;
        $this->address2 = $addressWasChanged->address2;
        $this->address3 = $addressWasChanged->address3;
        $this->city = $addressWasChanged->city;
        $this->province = $addressWasChanged->province;
        $this->postal = $addressWasChanged->postal;
        $this->country = $addressWasChanged->country;

    }
}