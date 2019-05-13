<?php
/**
 * using mysqli_connect for database connection
 */

$databaseHost = 'localhost';
$databaseName = 'PT_PULAU_SAMBU';
$databaseUsername = 'root';
$databasePassword = 'yangitulah';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

?>
