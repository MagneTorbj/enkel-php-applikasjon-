<?php  
session_start();
@$innloggetBruker=$_SESSION["brukernavn"]; 
  
if (!$innloggetBruker)  /* bruker er ikke innlogget */
 {
  print("<meta http-equiv='refresh' content='0;url=innlogging.php'>");
 }
?> 


<!DOCTYPE html>
<head>
<meta charset="UTF-8">

<title>innlevering 2</title>
<script src="funksjoner.js"> </script>
<link rel="stylesheet" type="text/css" href="stilark.css" media="screen" title="Stilark" />
 </head>
 <body class="mtStil">
 <div id="boks">
 <header>

 <h1>Obligatorisk Innlevering 2</h1>
 </header>
 <nav>
 
 <h3>Meny</h3>
 <p><a href="index.php">Hjem</a></p>        
 <p>Klasse</p>
  <ul>
 <li><a href="registrerKlasse.php">Registrer klasse</a></li>
 <li><a href="visAlleKlasser.php">Vis alle klasser</a></li>
 <li><a href="endreKlasse.php">Endre klasse</a></li>
 <li><a href="slettKlasse.php">Slett klasse</a></li>
 </ul>
 
 <p>Bilde</p>
  <ul>
 <li><a href="registrerBilde.php">Registrer bilde</a></li>
 <li><a href="visAlleBilder.php">Vis alle bilder</a></li>
 <li><a href="endreBilde.php">Endre bilder</a></li>
 <li><a href="slettBilder.php">Slett bilder</a></li>
 </ul>
 
 <p>Student</p>
  <ul>
 <li><a href="registrerStudent.php">Registrer student</a></li>
 <li><a href="visAlleStudenter.php">Vis alle studenter</a></li>
 <li><a href="endreStudent.php">Endre student</a></li>
 <li><a href="slettStudent.php">Slett student</a></li>
 </ul>
 
 <p>Annet</p>
  <ul>
 <li><a href="sok.php">Søk i databasen</a></li>
 <li><a href="visKlasseListe.php">Vis klasseliste med bilde</a></li>
 <li><a href="utlogging.php">Logg ut</a></li>
 </ul>
 
 </nav>
 <article>
