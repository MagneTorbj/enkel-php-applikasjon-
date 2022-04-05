<?php     /* ajax-finn-bilde */ 
 
  include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */ 
 
  $bildenr=$_GET ["bildenr"];
  $sqlSetning="SELECT * FROM bilde WHERE bildenr='$bildenr';";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");     /* SQL-setning sendt til database-serveren */
  $antallRader=mysqli_num_rows($sqlResultat);
  if ($antallRader!=0)  /* poststedet er registrert */     
  {       
  $rad=mysqli_fetch_array($sqlResultat);
  $opplastningsdato=$rad["opplastningsdato"];
  $filnavn=$rad["filnavn"];
  $beskrivelse=$rad["beskrivelse"];
  print("$opplastningsdato;$filnavn;$beskrivelse");     
  } 
  
  ?> 