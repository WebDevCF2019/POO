<?php
/*
 * Public
 */

$a = new theuser();

echo $a->getThelogin();
$a->setThepwd(" lulu");
echo "<br>{$a->getThepwd()}";