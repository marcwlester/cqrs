<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 07/11/16
 * Time: 10:57 PM
 */

require __DIR__ . "/../vendor/autoload.php";
Dotenv::load(__DIR__);
if (file_exists(dirname(__DIR__) . '/.env')) {
    Dotenv::load(dirname(__DIR__));
} else {
    Dotenv::load(dirname(__DIR__), '.env.dist');
}
