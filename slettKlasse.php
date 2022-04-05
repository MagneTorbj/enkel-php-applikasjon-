<?php /* slett-klasse */
/*
/* Programmet lager et skjema for å kunne slette en klasse
/* Programmet sletter den valgte klassen
*/
 include("start.php");
?>
<script src="funksjoner.js"> </script>
<h3>Slett Klasse</h3>
<form method="post" action="" id="slettKlasseSkjema" name="slettKlasseSkjema" onsubmit="return bekreft()">
 Klassekode <select name="klassekode" id="klassekode">
 <?php print ("<option value=>velg klasse</option>"); 
 include("dynamiskeFunksjoner.php"); listeboksKlassekode(); ?>
 </select> </br> 
<input type="submit" value="Slett klasse" name="slettKlasseKnapp" id="slettKlasseKnapp" />
</form>

<?php
 if (isset($_POST ["slettKlasseKnapp"]))
 {
      $klassekode=$_POST ["klassekode"];
	  if (!$klassekode)         
	  {           
  print ("Det er ikke valgt noen klasse");  
 
        }       
		else         
		{	 
	 
	 include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
	 $sqlSetning="DELETE FROM klasse WHERE klassekode='$klassekode';";
	 mysqli_query($db,$sqlSetning) or die ("ikke mulig å slette data i databasen");
	 /* SQL-setning sendt til database-serveren */
	 print ("Følgende klasse er nå slettet: $klassekode <br />");
	 }
 }
	 include("slutt.php");
	 ?>