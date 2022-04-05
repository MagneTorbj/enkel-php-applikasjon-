<?php /* endre-student */
/*
/* Programmet lager et skjema for kunne endre en student
/* Programmet endrer valgt student
*/
 include("start.php");
?>
<script src="ajax-finn-student.js"></script>

<h3>Endre Student</h3>
<form method="post" action="" id="endreStudentSkjema" name="endreStudentSkjema">
 Brukernavn <select name="brukernavn" id="brukernavn" onChange="finn(this.value)">
  <?php print ("<option value=>velg brukernavn</option>"); 
 include("dynamiskeFunksjoner.php"); listeboksBrukernavn(); ?>
 </select> </br> 
 Fornavn (ny verdi)<input type="text" id="fornavn" name="fornavn" required /> <br/>
 etternavn (ny verdi)<input type="text" id="etternavn" name="etternavn" required /> <br/>
 klassekode <select name="klassekode" id="klassekode">
 <?php print("<option value=>velg klassekode </option>");
listeboksKlassekode(); ?>
 </select> <br/>
 bildenr <select name="bildenr" id="bildenr">
  <?php print("<option value=>velg bildenr </option>");
  listeboksBildenr(); ?>
 </select> <br/>
 <input type="submit" value="Endre student" name="endreStudentKnapp" id="endreStudentKnapp">
 <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>
<?php
 if (isset($_POST ["endreStudentKnapp"]))
 {
 $brukernavn=$_POST ["brukernavn"];
 $fornavn=$_POST ["fornavn"];
 $etternavn=$_POST ["etternavn"];
 $klassekode=$_POST ["klassekode"];
 $bildenr=$_POST ["bildenr"];
 if (!$brukernavn || !$fornavn || !$etternavn || !$klassekode || !$bildenr)
 {
 print ("Alle felt må fylles ut");
 }
 else
 {
 include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
 $sqlSetning="UPDATE student SET fornavn='$fornavn',etternavn='$etternavn',klassekode='$klassekode',bildenr='$bildenr' WHERE brukernavn='$brukernavn';";
 mysqli_query($db,$sqlSetning) or die ("ikke mulig å endre data i databasen");
 /* SQL-setning sendt til database-serveren */
 print ("student med brukernavn $brukernavn er nå endret<br />");
 }
 }
 include("slutt.php");
?>