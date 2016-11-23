<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 10/11/16
 * Time: 10:36 PM
 */

namespace Logo3\Common;


interface Serializable
{
    public function serialize();
    public static function deserialize(array $data);
}