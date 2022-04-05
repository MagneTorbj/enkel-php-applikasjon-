<?php  /* innlogging  */
  /*  Programmet logger inn en bruker i applikasjonen */
  
?> 
 
<h3>Innlogging </h3> 
<style> h3 { background-color: gray; } </style>
<form action="" id="innloggingSkjema" name="innloggingSkjema" method="post">
   Brukernavn <input name="brukernavn" type="text" id="brukernavn" required> <br />
   Passord <input name="passord" type="password" id="passord" required  >  <br />
   <input type="submit" name="logginnKnapp" value="Logg inn">
   <input type="reset" name="nullstill" id="nullstill" value="Nullstill"> <br />
   </form> 
 
Ny bruker ? <br /> <a href="registrerBruker.php">Registrer deg her</a> <br /> <br />
 
 
<?php
   if (isset($_POST ["logginnKnapp"]))     
   {       
    include("sjekk.php"); 
 
      $brukernavn=$_POST ["brukernavn"];
	  $passord=$_POST["passord"];   
 
      if (!sjekkBrukernavnPassord($brukernavn,$passord))  /* brukernavn og passord er ikke korrekt */
	  {
		print("Feil brukernavn/passord <br />");
	  }       
	  else  /* brukernavn og passord er korrekt */           
	  { 
	  session_start();
	  $_SESSION["brukernavn"]=$brukernavn;  /* brukernavn lagt inn i session-variabelen */
	  
	  print("<meta http-equiv='refresh' content='0;url=index.php'>"); /* redirigering til index-siden (index.php) */        
	  }     
	} 
?> 