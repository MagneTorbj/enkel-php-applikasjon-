<?php /* db-tilkobling */
/* programmet foretar tilkobling til database-server og valg av database */

$host="localhost";
$user="111096";
$password="ZeKK93Kx";
$database="111096"; 

$db=mysqli_connect($host,$user,$password,$database) or die("ikke kontakt med database-server"); /* tilkobling til database-server er utført */

?>