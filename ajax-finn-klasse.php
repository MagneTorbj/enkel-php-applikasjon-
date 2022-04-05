<?php     /* ajax-finn-klasse */ 
 
  include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */ 
 
  $klassekode=$_GET ["klassekode"];
  $sqlSetning="SELECT * FROM klasse WHERE klassekode='$klassekode';"; /* velger alle klasser som tilhører valgt klassekode */
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");  /* SQL-setning sendt til database-serveren */
  $antallRader=mysqli_num_rows($sqlResultat);
  if ($antallRader!=0)  /* registrert */     
  {       
  $rad=mysqli_fetch_array($sqlResultat);
  $klassenavn=$rad["klassenavn"];
  $studiumkode=$rad["studiumkode"];
  print("$klassenavn;$studiumkode");     
  } 
  
  ?> 