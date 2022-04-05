<?php /* endre-bilde */
/*
/* Programmet lager et skjema for kunne endre en bilde
/* Programmet endrer den valgte bilde
*/
 include("start.php");
?>
<script src="ajax-finn-bilde.js"></script>

<h3>Endre Bilde</h3>
<form method="post" action="" id="endreBildeSkjema" name="endreBildeSkjema">
 Bildenr <select name="bildenr" id="bildenr" onChange="finn(this.value)">
 <?php print ("<option value=>velg bilde</option>"); 
 include("dynamiskeFunksjoner.php"); listeboksBildenr(); ?>
 </select> </br> 
 Opplastningsdato (ny verdi)<input type="date" id="opplastningsdato" name="opplastningsdato" required /> <br/>
 Filnavn (ny verdi)<input type="text" id="filnavn" name="filnavn" required /> <br/>
 beskrivelse (ny verdi)<input type="text" id="beskrivelse" name="beskrivelse" required /> <br/>
 <input type="submit" value="Endre bilde" name="endreBildeKnapp" id="endreBildeKnapp">
 <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>
<?php
 if (isset($_POST ["endreBildeKnapp"]))
 {
 $bildenr=$_POST ["bildenr"];
 $opplastningsdato=$_POST ["opplastningsdato"];
 $filnavn=$_POST ["filnavn"];
 $beskrivelse=$_POST ["beskrivelse"];
 if (!$bildenr || !$opplastningsdato || !$filnavn || !$beskrivelse)
 {
 print ("Alle felt må fylles ut");
 }
 else
 {
 include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
 $sqlSetning="UPDATE bilde SET opplastningsdato='$opplastningsdato', filnavn='$filnavn', beskrivelse='$beskrivelse' WHERE bildenr='$bildenr';";
 mysqli_query($db,$sqlSetning) or die ("ikke mulig å endre data i databasen");
 /* SQL-setning sendt til database-serveren */
 print ("bilde med bildenr $bildenr er nå endret<br />");
 }
 }
 include("slutt.php");
?>