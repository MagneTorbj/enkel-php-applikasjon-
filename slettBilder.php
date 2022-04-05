<?php 
 include("start.php");
?>

    
<h1>Slett bilde</h1>
<script src="funksjoner.js"> </script>

<form method="post" action="" id="slettBildeSkjema" name="slettBildeSkjema" onSubmit="return bekreft()">
  Bildenr
  <select name="bildenrfilnavn" id="bildenrfilnavn">
    <?php print ("<option value=>velg bilde</option>");  
	include("dynamiskeFunksjoner.php"); listeboksBildenrFilnavn(); ?> 
  </select>  <br/>
  <input type="submit" value="Slett bilde" name="slettBildeKnapp" id="slettBildeKnapp" /> 
</form>

<?php
   if (isset($_POST ["slettBildeKnapp"]))
    {
      $bildenrfilnavn=$_POST ["bildenrfilnavn"];

      $del=explode(";",$bildenrfilnavn);
      $bildenr=$del[0];
      $filnavn=$del[1];  

      include("db-tilkobling.php");
		
      $sqlSetning="DELETE FROM bilde WHERE bildenr='$bildenr';";
      mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
        /* bilde slettet i databasen*/
		
      $bildefil="bilder/".$filnavn;
      unlink($bildefil) or die ("ikke mulig &aring; slette bilde på serveren");
        /* bilde slettet fra serveren */

      print ("Følgende bilde er n&aring; slettet: $bildenr $filnavn <br />");
    }
   include("slutt.php");
?> 

