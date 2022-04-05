<?php /* slett-student */
/*
/* Programmet lager et skjema for å kunne slette en student
/* Programmet sletter den valgte studenten
*/
 include("start.php");
?>
<script src="funksjoner.js"> </script>
<h3>Slett Student</h3>
<form method="post" action="" id="slettStudentSkjema" name="slettStudentSkjema" onsubmit="return bekreft()">
 Brukernavn <select name="brukernavn" id="brukernavn">
 <?php print ("<option value=>velg student</option>"); 
 include("dynamiskeFunksjoner.php"); listeboksBrukernavn(); ?>
 </select> </br> 
<input type="submit" value="Slett student" name="slettStudentKnapp" id="slettStudentKnapp" />
</form>

<?php
 if (isset($_POST ["slettStudentKnapp"]))
 {
      $brukernavn=$_POST ["brukernavn"];
	  if (!$brukernavn)         
	  {           
  print ("Det er ikke valgt noen student");  
 
        }       
		else         
		{	 
	 
	 include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
	 $sqlSetning="DELETE FROM student WHERE brukernavn='$brukernavn';";
	 mysqli_query($db,$sqlSetning) or die ("ikke mulig å slette data i databasen");
	 /* SQL-setning sendt til database-serveren */
	 print ("Følgende student er nå slettet: $brukernavn <br />");
	 }
 }
	 include("slutt.php");
	 ?>