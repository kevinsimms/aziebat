<!DOCTYPE html>
<html>
<head>
<title>Photos des chantiers</title>
<meta charset="UTF-8">

<link rel="stylesheet" href="csschantier/chantierdisplaybig.css">

<link rel="stylesheet" href="csschantier/chantier1450.css">
<link rel="stylesheet" href="csschantier/chantiersmobile2.css">



</head>

<body>


<?php

session_start();

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
  
  
  
    }



  }









  $servername = "91.216.107.248";
  $username = "azieb419148";
  $password = "!Corbeille1101";
  $dbname = "azieb419148";


$chantname=$_SESSION["chantiername"];;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT Photochantierurl, Description FROM photochantiers WHERE ordernumber='$chantcount' AND chantiernom='$chantname'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

while($row = mysqli_fetch_assoc($result)) {

    $rowline="upload/".$row["Photochantierurl"];
    $rowline2=utf8_encode($row["Description"]);

}



} else {
    echo "0 results";
  }
  
  mysqli_close($conn);


?>







    <div id="wrap">

    <a id="link" href="chantier2.php">
    <img src="imgchantier/xcross.png" alt="jo" id="cross" >
    </a>


<div id="gridwrap">


<?php  if($_SESSION["count"]>0){     ?>

    <a id="link" href="chantier.php?action=less">
    <img src="imgchantier/fleche_gauche.png" alt="jo" id="fleche1" >
    </a>

    <?php } ?>
  

<img src=<?php echo $rowline;  ?> id="image" alt="mainimg">


<?php  if($_SESSION["count"]<$_SESSION["chantcount"]){     ?>

<a id="link" href="chantier.php?action=add">
    <img src="imgchantier/fleche_droite.png" alt="jo" id="fleche2" >
    </a>

    <?php } ?>


</div>


</div>

<p id="paradescription"><?php echo $rowline2;  ?></p>

<!-- <script src="scripttest.js"></script>  -->





</body>

</html>