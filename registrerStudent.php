<?php /* registrer-student */
/*
/* Programmet lager et html-skjema for å registrere en student
/* Programmet registrerer data i databasen
*/
 include("start.php");
?>
<h3>Registrer Student </h3>
<form method="post" action="" id="registrerStudentSkjema" name="registrerStudentSkjema">
 Brukernavn <input type="text" id="brukernavn" name="brukernavn" required /> <br/>
 Fornavn <input type="text" id="fornavn" name="fornavn" required /> <br/>
 Etternavn <input type="text" id="etternavn" name="etternavn" required /> <br/>
 klassekode <select name="klassekode" id="klassekode">
 <?php print("<option value=>velg klassekode </option>");
 include("dynamiskeFunksjoner.php");listeboksKlassekode(); ?>
 </select> <br/>
 bildenr <select name="bildenr" id="bildenr">
  <?php print("<option value=>velg bildenr </option>");
  listeboksBildenr(); ?>
 </select> <br/>
 <input type="submit" value="Registrer student" id="registrerStudentKnapp" name="registrerStudentKnapp" />
 <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>
<?php
 if (isset($_POST ["registrerStudentKnapp"]))
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
 $sqlSetning="SELECT * FROM student WHERE brukernavn='$brukernavn';";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
 $antallRader=mysqli_num_rows($sqlResultat);
 
 if ($antallRader!=0) /* klassen er registrert fra før */
 {
 print ("Studenten er registrert fra før");
 }
 else
 {
 $sqlSetning="INSERT INTO student (brukernavn,fornavn,etternavn,klassekode,bildenr)
 VALUES('$brukernavn','$fornavn' , '$etternavn' , '$klassekode' , '$bildenr');";
 mysqli_query($db,$sqlSetning) or die ("ikke mulig å registrere data i databasen");
 /* SQL-setning sendt til database-serveren */
 print ("Følgende Student er nå registrert: $brukernavn $fornavn $etternavn $klassekode $bildenr");      
 }
 }
 }
 include("slutt.php");
?>