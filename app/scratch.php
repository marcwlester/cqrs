<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 05/11/16
 * Time: 10:36 PM
 */

set_time_limit(0);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/AppKernel.php';

use Logo3\CRM\Domain\Model\Contact\ContactId;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;

Dotenv::load(__DIR__ . '/../');

$input = new ArgvInput();

$env = $input->getParameterOption(array('--env', '-e'), getenv('SYMFONY_ENV') ?: 'dev');
$debug = getenv('SYMFONY_DEBUG') !== '0' && !$input->hasParameterOption(array('--no-debug', '')) && $env !== 'prod';

$kernel = new AppKernel($env, (bool)$debug);
$application = new Application($kernel);
//$application->run($input);

$id = ContactId::generate();

var_dump($id);