<?php

define('MYSQL_HOST','localhost');
define('MYSQL_USER','root');
define('MYSQL_PASSWORD','');
define('MYSQL_DATABASE','bethel');

$pdo_Options= array( PDO::ATTR_ERRMODE=> PDO :: ERRMODE_EXCEPTION,
PDO:: ATTR_EMULATE_PREPARES => false);

$pdo = new PDO ("mysql:host=" .MYSQL_HOST. ";dbname=" .MYSQL_DATABASE, MYSQL_USER, MYSQL_PASSWORD, $pdo_Options );

?>