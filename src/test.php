<?php
//phpunit --bootstrap ./vendor/autoload.php tests
require_once('Monetary2Extensive.php');

$monetary = new Monetary2Extensive();
$monetary->setValue(20);
echo $monetary->Value2String();
?>