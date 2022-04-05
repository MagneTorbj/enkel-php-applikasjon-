<?php     /* ajax-finn-student */ 
 
  include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */ 
 
  $brukernavn=$_GET ["brukernavn"];
  $sqlSetning="SELECT * FROM student WHERE brukernavn='$brukernavn';";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");     /* SQL-setning sendt til database-serveren */
  
  $antallRader=mysqli_num_rows($sqlResultat);
  if ($antallRader!=0)  /*  registrert */     
  {       
  $rad=mysqli_fetch_array($sqlResultat);
  $fornavn=$rad["fornavn"];
  $etternavn=$rad["etternavn"];
  $klassekode=$rad["klassekode"];
  $bildenr=$rad["bildenr"];
  print("$fornavn;$etternavn;$klassekode;$bildenr");     
  }                                           
  ?> 