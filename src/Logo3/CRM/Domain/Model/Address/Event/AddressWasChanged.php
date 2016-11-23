<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 04/11/16
 * Time: 10:53 PM
 */

namespace Logo3\CRM\Domain\Model\Address\Event;


use Logo3\Common\Serializable;
use Logo3\CRM\Domain\Model\Address\AddressId;

class AddressWasChanged implements Serializable
{

    public $id;

    public $address1;

    public $address2;

    public $address3;

    public $city;

    public $province;

    public $postal;

    public $country;

    /**
     * AddressWasChanged constructor.
     * @param AddressId $id
     * @param string $address1
     * @param string $address2
     * @param string $address3
     * @param string $city
     * @param string $province
     * @param string $postal
     * @param string $country
     */
    public function __construct(AddressId $id, $address1, $address2, $address3, $city, $province, $postal, $country)
    {
        $this->id = $id;
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->address3 = $address3;
        $this->city = $city;
        $this->province = $province;
        $this->postal = $postal;
        $this->country = $country;
    }

    public function serialize()
    {
        return array(
            'id' => $this->id->serialize(),
            'address1' => $this->address1,
            'address2' => $this->address2,
            'address3' => $this->address3,
            'city' => $this->city,
            'province' => $this->province,
            'postal' => $this->postal,
            'country' => $this->country
        );
    }

    public static function deserialize(array $data)
    {
        return new static(
            AddressId::deserialize($data['id']),
            $data['address1'],
            $data['address2'],
            $data['address3'],
            $data['city'],
            $data['province'],
            $data['postal'],
            $data['country']
        );
    }
}