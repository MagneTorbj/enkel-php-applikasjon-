
<?php     
/* vis klasseliste med bilde  */
/*    fyll inn klassekode
/*    Programmet skriver ut en liste over bilder tilknyttet student i angitt klasse med klassekode
*/
  include("start.php");
 
?>

<h3>Vis klasseliste med bilde </h3>
<form method="post" action="" id="visklasselisteSkjema" name="visklasselisteSkjema" >

 Klasse <select name="klassekodebilde" id="klassekodebilde" required>
 <?php print("<option value=>velg klassekode </option>");
 include("dynamiskeFunksjoner.php");listeboksKlassekode(); ?> 
 </select> <br/> <br/>

<input type="submit"value="Vis klasseliste" id="visKlasselisteKnapp" name="visKlasselisteKnapp"   /> 
<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>


<?php  
 if (isset($_POST ["visKlasselisteKnapp"]))
 {
  $klassekodebilde=$_POST ["klassekodebilde"];
 
 include("db-tilkobling.php");
 
  $sqlSetning="SELECT fornavn, etternavn, filnavn FROM Studentmedbilde WHERE klassekode LIKE '%$klassekodebilde%';"; /* velger fornavn, etternavn og filnavn fra studentmedbilde table view */
  
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen"); 

  print ("<h3>Følgende studenter er registrert med bilde</h3>"); /* printer ut en tekst over tabellen */ 

  print ("<table border=1>");
  print ("<tr><th align=left>fornavn</th> <th align=left>etternavn</th> <th align=left>filnavn</th></tr>");

  $antallRader=mysqli_num_rows($sqlResultat);  

  for ($r=1;$r<=$antallRader;$r++)
    {
      $rad=mysqli_fetch_array($sqlResultat); /* rad hentes fra spørreresultatet */       
	  $fornavn=$rad["fornavn"];
	  $etternavn=$rad["etternavn"]; 	  
      $filnavn=$rad["filnavn"];
	 
	  
      print ("<tr><td>$fornavn</td><td>$etternavn</td> <td> <a href='bilder/$filnavn' target='_blank'>$filnavn</a> </td> </tr>");  
    }
}
  print ("</table>"); 
  include("slutt.php");
?>