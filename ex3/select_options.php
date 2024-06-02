<?php

require_once __DIR__ . '/app/config/config.php';
require_once __DIR__ . '/app/classes/Select.php';

$workBrowser = new Select('WorkAccessBrowser');
$workBrowser->setValues($browsers);
echo $workBrowser->makeSelect();


$workSpeed = new Select('WorkSpeed');
$workSpeed->setValues($speeds);
echo $workSpeed->makeSelect();


$workOS = new Select('WorkOS');
$workOS->setValues($operatingSystems);
echo $workOS->makeSelect();

