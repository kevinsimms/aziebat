<!DOCTYPE html>
<html>
<head>

<title>Aziebat Photo Chantiers</title>
<meta charset="UTF-8">

<link rel="stylesheet" href="csschantier/menuchantier.css">
<link rel="stylesheet" href="csschantier/bigsize.css">

 <link rel="stylesheet" href="csschantier/chantier1350.css">
<link rel="stylesheet" href="csschantier/chantier1200.css">

<link rel="stylesheet" href="csschantier/chantier1000.css">
<link rel="stylesheet" href="csschantier/chantier680.css">  
<link rel="stylesheet" href="csschantier/chantiersmobile.css">
<!-- <link rel="stylesheet" href="footer/footer.css"> -->
<link rel="stylesheet" href="footer/footerbig.css">
<link rel="stylesheet" href="footer/footersmall.css">





<style>



    </style>






</head>

<body>

<?php



include "menu2.php";
?>



<div id="backwrap">

    <div id="background">

<!-- <div id ="blackbg">


<img src="xcross.png" alt="jo" id="cross" onclick="toggle()">
<img src="fleche_droite.png" alt="jo" id="fleche2" onclick="nextpic()">
</div> -->


<?php

/*  session_start(); */  

$_SESSION["result"]='a';

$_SESSION["count"]=-1;



if(isset($_GET["name"]))
{

 
  $_SESSION["chantiername"]=$_GET["name"];

$chantiername=$_GET["name"];

$i=0;

$servername = "91.216.107.248";
$username = "azieb419148";
$password = "!Corbeille1101";
$dbname = "azieb419148";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT DISTINCT chantiernom, Photochantierurl, Description, ordernumber FROM photochantiers WHERE chantiernom='$chantiername' ORDER BY ordernumber";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
 
  while($row = mysqli_fetch_assoc($result)) {
    
 $rowline=$row["ordernumber"];
 
 $_SESSION["orderchantier".$i]=$rowline;
 /* echo $_SESSION["orderchantier".$i]; */

 $_SESSION["chantcount"]=$i;
 $i++;
 
 

}



} else {
  echo "0 results";
}

mysqli_close($conn);


}





if(!isset($_SESSION["count"])){
  $_SESSION["count"]=-1;
}



if(isset($_GET["action"]))
{

 /* 
	if($_GET["action"] == "add")
	{
	
    
   

    $_SESSION["count"]=$_SESSION["count"]+1;

    $i=$_SESSION["count"];
$chantcount= $_SESSION["orderchantier".$i];



  }

 
	
 

  if($_GET["action"] == "less")
	{
	
    
    

    $_SESSION["count"]=$_SESSION["count"]-1;

    $j=$_SESSION["count"];
$chantcount= $_SESSION["orderchantier".$j];



  } */




    echo '<div id ="blackbg">';

     echo '<div id ="blackbg2">';
    echo '</div>'; 


  


   echo '<a id="link" href="chantier2.php">';
    echo '<img src="imgchantier/xcross.png" alt="jo" id="cross" onclick="toggle()">';
    
    echo "</a>";

if($_SESSION["count"]>0){
    echo '<a id="link" href="chantier.php?action=less">';
    echo '<img src="imgchantier/fleche_gauche.png" alt="jo" id="fleche1" >';
    echo "</a>";
}



if($_SESSION["count"]<$_SESSION["chantcount"]){
  echo '<a id="link" href="chantier.php?action=add">';
      echo '<img src="imgchantier/fleche_droite.png" alt="jo" id="fleche2" >';
      echo "</a>";
  }


  
  

  $servername = "91.216.107.248";
  $username = "azieb419148";
  $password = "!Corbeille1101";
  $dbname = "azieb419148";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$chantname=$_SESSION["chantiername"];
$sql = "SELECT Photochantierurl, Description FROM photochantiers WHERE ordernumber='$chantcount' AND chantiernom='$chantname'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
 
  while($row = mysqli_fetch_assoc($result)) {
    
 $rowline="upload/".$row["Photochantierurl"];
 $rowline2=utf8_encode($row["Description"]);
 

 echo '<div id="textpara">';
echo '<p>'.$rowline2.'</p>';
echo '</div>';



echo '<div id="imgwrap">';

 echo '<img src='.$rowline.' class="image2">';
echo '</div>';




 

}



} else {
  echo "0 results";
}

mysqli_close($conn);






    echo '</div>';



	
} 


if(isset($_GET["action2"]))
{
	if($_GET["action2"] == "remove")
	{
	
    $_SESSION["count"]=-1;



	}
} 











/* $servername = "localhost";
$username = "Aziebat";
$password = "!Corbeille1101";
$dbname = "Aziebat"; */



/* $servername = "localhost";
$username = "root";
$password = "";
$dbname = "Aziebat";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$resultorder=$_SESSION["result"];
$sql = "SELECT DISTINCT chantiernom, Photochantierurl, Description FROM photochantiers WHERE ordernumber=$resultorder ORDER BY ordernumber";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
 
  while($row = mysqli_fetch_assoc($result)) {
    
 $rowline=$row["chantiernom"];
 $rowdesc=$row["Description"];
 $rowpic=$row["Photochantierurl"];

 
 
 echo'<img src='.$rowpic.' class="image2" onclick="toggle()">';
 echo "<p id='parades'>".$rowdesc."</p>";
}



} else {
  echo "0 resultsm";
}

mysqli_close($conn);
 */


?>













    <?php
/* $servername = "localhost";
$username = "Aziebat";
$password = "!Corbeille1101";
$dbname = "Aziebat"; */
$servername = "91.216.107.248";
$username = "azieb419148";
$password = "!Corbeille1101";
$dbname = "azieb419148";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT DISTINCT Urlphoto, title, Descriptionchantier, fullname FROM chantiers ORDER BY ordernumber";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  //echo "<div id='bwrap'>";
  while($row = mysqli_fetch_assoc($result)) {
    
 $rowline2=utf8_encode($row["title"]);
$pieces = explode(" ", $rowline);
$finaltitle= $pieces[0].'.php'; 

$full=utf8_encode($row["fullname"]);

$desc=utf8_encode($row["Descriptionchantier"]);
$photo="upload/".$row["Urlphoto"];

echo '<a id="link" href="chantier.php?action=zero&name='.$rowline2.'">';
  echo  '<div id="poster">';

 
echo'<img src="'.$photo.'" id="image" onclick="toggle()">';

echo '<h2 id="titre1">'.$full.'</h2>';

echo '<p id ="para"> '.$desc.'</p>';

//echo "<button type='button' onclick='ajax_post2($full)'>Click Me!</button>";

echo '</div>';
echo "</a>";

}
//echo "</div>";


} else {
  echo "0 results";
}

mysqli_close($conn);





?>











</div>

</div>

<div id="bandejaune">
</div>



<?php

  include "footer/footer2.php";  

?>

<!--  <script src="scriptfooterchantier.js"></script>  -->
<script src="csschantier/scriptindexchantier.js"></script>

</body>

</html>