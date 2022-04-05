<?php /* registrer-Bilde */
/*
/* Programmet lager et html-skjema for å registrere ett bilde og laste det opp
/* Programmet registrerer data om bildet i databasen
*/
 include("start.php");
?>
<h3>Registrer bilde </h3>

<form method="post" action="" enctype="multipart/form-data" id="registrerBildeSkjema" name="registrerBildeSkjema">
  Bildenr <input type="text" id="bildenr" name="bildenr" required /> <br/>
  Opplastningsdato <input type="date" id="opplastningsdato" name="opplastningsdato" required /> <br />
  Beskrivelse <input type="text" id="beskrivelse" name="beskrivelse" required /> <br/>
  Bilde <input type="file" id="fil" name="fil" size="60"/> <br />
  <input type="submit" value="Registrer bilde" id="registrerBildeKnapp" name="registrerBildeKnapp" /> 
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>
<?php
 if (isset($_POST ["registrerBildeKnapp"]))
    {
      $bildenr=$_POST ["bildenr"];
      $beskrivelse=$_POST ["beskrivelse"];
      $opplastningsdato=$_POST ["opplastningsdato"];	  

      $filnavn=$_FILES ["fil"]["name"];  /* filnavn på opplastet fil */
      $filtype=$_FILES ["fil"]["type"];  /* filtype på opplastet fil */	
      $filstorrelse=$_FILES ["fil"]["size"];  /* filstørrelse på opplastet fil */
      $tmpnavn=$_FILES ["fil"]["tmp_name"];    /* midlertidig navn på opplastet fil */
      $nyttnavn="bilder/".$filnavn;  /* mappe- og filnavn på opplastet fil */

      if (!$bildenr || !$filnavn|| !$beskrivelse || !$opplastningsdato)
        {
          print ("Alle felt må fylles ut og bilde må velges"); 
        }
      else if ($filtype != "image/gif" && $filtype != "image/jpeg" && $filtype != "image/png")
        {
          print ("Det er kun tillatt å laste opp bilder ");
        }
      else if ($filstorrelse > 5000000)    /* max = 5MB*/
        {
          print ("Bildet er for stor til å kunne lastes opp ");
        }
      else
        {
          include("db-tilkobling.php"); 

          $sqlSetning="SELECT * FROM bilde WHERE bildenr='$bildenr';";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
          $antallRader=mysqli_num_rows($sqlResultat); 
              
          if ($antallRader!=0)  /* bildet er registrert fra før */
            {
              print ("Bildenummeret er registrert fra før");
            }
          else
            {
              move_uploaded_file($tmpnavn,$nyttnavn) or die ("ikke mulig å laste opp fil");  
                /* bilde lastet opp på serveren */
					
              $sqlSetning="INSERT INTO bilde (bildenr,filnavn,beskrivelse,opplastningsdato)VALUES('$bildenr', '$filnavn' , '$beskrivelse' , '$opplastningsdato');";
              if (mysqli_query($db,$sqlSetning))  /* bilde registrert i databasen*/
                {
                  print ("Følgende bilde er nå registrert:<br/> bildenr: $bildenr <br/> filnavn: $filnavn <br/> beskrivelse:$beskrivelse <br/> opplastningsdato:$opplastningsdato <br/>");
                }
              else
                {
                  print ("ikke mulig å registrere data i databasen");
                  unlink($nyttnavn) or die ("ikke mulig å slette bilde på serveren igjen");
                }
            }
        } 
    }
 include("slutt.php");
?>