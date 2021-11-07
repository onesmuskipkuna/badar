
<?php

/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */
$DB_HOST = "localhost";
$DB_USER ="root";
$DB_NAME= "fleet_system";
$DB_PASS =""; 
//include("constants.php");
$mysqli = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

?>
