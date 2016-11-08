<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 05/11/16
 * Time: 9:57 PM
 */

namespace Logo3\Common\Domain\Model;


use Ramsey\Uuid\Uuid;

class Guid
{
    /**
     * @var string
     */
    protected $id;

    /**
     * Guid constructor.
     * @param string $id
     */
    protected function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return string uuid v4
     */
    public static function generate()
    {
        return new static(Uuid::uuid4()->toString());
    }

    public function __toString()
    {
        return $this->getValue();
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->id;
    }
}