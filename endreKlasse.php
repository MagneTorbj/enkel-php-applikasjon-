<?php /* endre-klasse */
/*
/* Programmet lager et skjema for kunne endre en klasse
/* Programmet endrer den valgte klassen
*/
 include("start.php");
?>
<script src="ajax-finn-klasse.js"></script>

<h3>Endre klasse</h3>
<form method="post" action="" id="endreKlasseSkjema" name="endreKlasseSkjema">
 Klassekode <select name="klassekode" id="klassekode" onChange="finn(this.value)">
 <?php print ("<option value=>velg klasse</option>"); 
 include("dynamiskeFunksjoner.php"); listeboksKlassekode(); ?>
 </select> </br> 
 Klassenavn (ny verdi)<input type="text" id="klassenavn" name="klassenavn" required /> <br/>
 Studiumkode (ny verdi)<input type="text" id="studiumkode" name="studiumkode" required /> <br/>
 <input type="submit" value="Endre klasse" name="endreKlasseKnapp" id="endreKlasseKnapp">
 <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>
<?php
 if (isset($_POST ["endreKlasseKnapp"]))
 {
 $klassekode=$_POST ["klassekode"];
 $klassenavn=$_POST ["klassenavn"];
 $studiumkode=$_POST ["studiumkode"];
 if (!$klassekode || !$klassenavn || !$studiumkode)
 {
 print ("Alle felt må fylles ut");
 }
 else
 {
 include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
 $sqlSetning="UPDATE klasse SET klassenavn='$klassenavn',studiumkode='$studiumkode' WHERE klassekode='$klassekode';";
 mysqli_query($db,$sqlSetning) or die ("ikke mulig å endre data i databasen");
 /* SQL-setning sendt til database-serveren */
 print ("klasse med klassekode $klassekode er nå endret<br />");
 }
 }
 include("slutt.php");
?>