<?php  /* sok-i-db */
/*
/*    Programmet demonstrerer sÃ¸k i databasetabeller
*/
include("start.php");
?> 

<h3>Søk i Databasen </h3>

<form method="post" action="" id="sokeSkjema" name="sokeSkjema">
    Søkestreng <input type="text" id="sokestreng" name="sokestreng" required /> <br/>
    <input type="submit" value="Fortsett" id="sokeKnapp" name="sokeKnapp" /> 
    <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php 
  if (isset($_POST ["sokeKnapp"]))
    {
      $sokestreng=$_POST ["sokestreng"];

      include("db-tilkobling.php");  /* tilkobling til database-serveren utfÃ¸rt og valg av database foretatt */

      print ("Treff for søkestrengen <strong>$sokestreng</strong> <br /><br />");  
	  
      /* sÃ¸k i STUDIUM-tabellen*/

      $sqlSetning="SELECT * FROM klasse WHERE klassekode LIKE '%$sokestreng%' OR klassenavn LIKE '%$sokestreng%' OR studiumkode LIKE '%$sokestreng%';";
      $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
      $antallRader=mysqli_num_rows($sqlResultat); 

      if ($antallRader==0) 
        {
          print ("Treff i klasse-tabellen: <br /> Ingen <br /> <br />");  
        }
      else 
        {
          print ("Treff i klasse-tabellen: <br />");  
          print ("<table border=1");  
          print ("<tr><th align=left>klassekode - klassenavn - studiumkode</th> </tr>");

          for ($r=1;$r<=$antallRader;$r++)
            {
              $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spørringsresultatet */
              $klassekode=$rad["klassekode"];     
              $klassenavn=$rad["klassenavn"];   
              $studiumkode=$rad["studiumkode"];   
              $sokestrenglengde=strlen($sokestreng);  /* lengden på sokestrengen */
			  
              print("<tr><td> ");
              $tekst="$klassekode $klassenavn $studiumkode";  /* første tekststreng */
              $startpos=stripos($tekst,$sokestreng);  /* første startpos */   

              while ($startpos!==false)
                { 
                  $tekstlengde=strlen($tekst);  /* lengden på teksten */

                  $hode=substr($tekst,0,$startpos);  
                  $sok=substr($tekst,$startpos,$sokestrenglengde);  
                  $hale=substr($tekst,$startpos+$sokestrenglengde,$tekstlengde-$startpos-$sokestrenglengde);

                  print("$hode<strong><font color='blue'>$sok</font></strong>");  /* deler av utskriften*/

                  $tekst=$hale;/* ny tekst tilhørende hale */
                  $startpos=stripos($tekst,$sokestreng);  /* ny startpos */
                } 
              print("$hale</td></tr>");  /* utskrift av siste hale */
            }
          print ("</table> </br />");
        }

      /* søk i bilde-tabellen*/

      $sqlSetning="SELECT * FROM bilde WHERE bildenr LIKE '%$sokestreng%' OR opplastningsdato LIKE '%$sokestreng%' OR filnavn  LIKE '%$sokestreng%' OR beskrivelse  LIKE '%$sokestreng%';";
      $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
      $antallRader=mysqli_num_rows($sqlResultat); 

      if ($antallRader==0) 
        {
          print ("Treff i bilde-tabellen: <br /> Ingen <br /> <br />");  
        }
      else 
        {
          print ("Treff i bilde-tabellen: <br />");  
          print ("<table border=1>"); 
          print ("<tr><th align=left>bildenr - opplastningsdato - filnavn - beskrivelse</th> </tr>");

          for ($r=1;$r<=$antallRader;$r++)
            {
              $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spÃ¸rringsresultatet */
              $bildenr=$rad["bildenr"];   
              $opplastningsdato=$rad["opplastningsdato"];       
              $filnavn=$rad["filnavn"];
              $beskrivelse=$rad["beskrivelse"];   			  

              $sokestrenglengde=strlen($sokestreng);  /* lengden på sokestrengen */
			  
              print("<tr><td> ");
              $tekst="$bildenr $opplastningsdato $filnavn $beskrivelse";  /* første tekststreng */
              $startpos=stripos($tekst,$sokestreng);  /* første startpos */

              while ($startpos!==false)
                { 
                  $tekstlengde=strlen($tekst);  /* lengden pÃ¥ teksten */

                  $hode=substr($tekst,0,$startpos);  
                  $sok=substr($tekst,$startpos,$sokestrenglengde);  
                  $hale=substr($tekst,$startpos+$sokestrenglengde,$tekstlengde-$startpos-$sokestrenglengde);

                  print("$hode<strong><font color='blue'>$sok</font></strong>");  /* deler av utskriften*/

                  $tekst=$hale;/* ny tekst = nÃ¥vÃ¦rende hale */
                  $startpos=stripos($tekst,$sokestreng);  /* ny startpos */
                } 
                print("$hale</td></tr>");  /* utskrift av siste hale */
            }
          print ("</table> </br />");  
        }

      /* søk i student-tabellen*/

      $sqlSetning="SELECT * FROM student  WHERE brukernavn LIKE '%$sokestreng%' OR fornavn LIKE '%$sokestreng%' OR etternavn LIKE '%$sokestreng%' OR klassekode LIKE '%$sokestreng%' OR bildenr LIKE '%$sokestreng%';";
      $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
      $antallRader=mysqli_num_rows($sqlResultat); 

      if ($antallRader==0) 
        {
          print ("Treff i student-tabellen: <br /> Ingen <br /> <br />");  
        }
      else 
        {
          print ("Treff i student-tabellen: <br />");  /* starten pÃ¥ tabellen definert */
          print ("<table border=1>");  /* starten pÃ¥ tabellen definert */
          print ("<tr><th align=left>brukernavn - fornavn - etternavn - klassekode - bildenr </th> </tr>");

          for ($r=1;$r<=$antallRader;$r++)
            {
              $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spÃ¸rringsresultatet */
              $brukernavn=$rad["brukernavn"];      
              $fornavn=$rad["fornavn"];   
              $etternavn=$rad["etternavn"];   
              $klassekode=$rad["klassekode"];
              $bildenr=$rad["bildenr"]; 			  
              $sokestrenglengde=strlen($sokestreng);  /* lengden pÃ¥ sokestrengen */
			  
              print("<tr><td> ");
              $tekst="$brukernavn $fornavn $etternavn $klassekode $bildenr";  /* fÃ¸rste tekststreng */
              $startpos=stripos($tekst,$sokestreng);  /* fÃ¸rste startpos */

              while ($startpos!==false)
                { 
                  $tekstlengde=strlen($tekst);  /* lengden pÃ¥ teksten */

                  $hode=substr($tekst,0,$startpos);  
                  $sok=substr($tekst,$startpos,$sokestrenglengde);  
                  $hale=substr($tekst,$startpos+$sokestrenglengde,$tekstlengde-$startpos-$sokestrenglengde);

                  print("$hode<strong><font color='blue'>$sok</font></strong>");  /* deler av utskriften*/

                  $tekst=$hale;/* ny tekst = nÃ¥vÃ¦rende hale */
                  $startpos=stripos($tekst,$sokestreng);  /* ny startpos */
                } 
                print("$hale</td></tr>");  /* utskrift av siste hale */
            }
          print ("</table> </br />"); 
        }
    }
	include("slutt.php");
?> 