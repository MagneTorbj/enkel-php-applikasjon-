<?php /* db-tilkobling */
/* programmet foretar tilkobling til database-server og valg av database */

$host="";
$user="";
$password="";
$database=""; 

$db=mysqli_connect($host,$user,$password,$database) or die("ikke kontakt med database-server"); /* tilkobling til database-server er utført */

?>
