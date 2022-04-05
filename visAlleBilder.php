<?php /* vis-alle-Bilder */
/*
/* Programmet skriver ut alle registrerte bilder
*/
 include("start.php");
 include("db-tilkobling.php"); 

  $sqlSetning="SELECT * FROM bilde;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen"); 

  print ("<h3>Registrerte bilder </h3>"); 

  print ("<table border=1>");
  print ("<tr><th align=left>bildenr</th> <th align=left>filnavn</th> <th align=left>beskrivelse</th> <th align=left>opplastningsdato</th></tr>");

  $antallRader=mysqli_num_rows($sqlResultat);  

  for ($r=1;$r<=$antallRader;$r++)
    {
      $rad=mysqli_fetch_array($sqlResultat); 
      $bildenr=$rad["bildenr"];       
      $filnavn=$rad["filnavn"];   
      $beskrivelse=$rad["beskrivelse"];
	  $opplastningsdato=$rad["opplastningsdato"];
	  
      print ("<tr> <td> $bildenr </td> <td> <a href='bilder/$filnavn' target='_blank'>$filnavn </a> </td> <td> $beskrivelse </td> <td> $opplastningsdato </td>  </tr>");  
    }
  print ("</table>"); 
 include("slutt.php");
?>