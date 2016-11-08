<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 04/11/16
 * Time: 10:53 PM
 */

namespace Logo3\CRM\Domain\Model\Address\Event;


class AddressWasChanged
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
     * @param $id
     * @param $address1
     * @param $address2
     * @param $address3
     * @param $city
     * @param $province
     * @param $postal
     * @param $country
     */
    public function __construct($id, $address1, $address2, $address3, $city, $province, $postal, $country)
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
}