<h2> Choisir le chantier</h2>



<form action="photochantiersuppr.php" method="get" enctype="multipart/form-data">
        
<?php

session_start(); 




$servername = "91.216.107.248";
$username = "azieb419148";
$password = "!Corbeille1101";
$dbname = "azieb419148";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT title, fullname FROM chantiers";
$result = $conn->query($sql);

echo "<select id='chantiers3' name='chantier3'>";
echo " <option value=''>-- Choisir un chantier--</option>";

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<option value=" . $row["title"]. ">". $row["fullname"]."</option><br>";
  }
  echo "</select>";
  
} else {
  echo "0 results";
}
$conn->close();

?>

       
        <input type="submit" name="submit" value="selectionner chantier">
         </form>

         </div>


<?php


if(!empty($_GET['chantier3'])){
  
$nomchantier3=$_GET['chantier3'];


session_start(); 
$_SESSION["chantiername"]=$nomchantier3; 


  //echo "<h3 id='chantiers5'> Supprimer la photo selectionné</h3>";  


  $servername = "91.216.107.248";
  $username = "azieb419148";
  $password = "!Corbeille1101";
  $dbname = "azieb419148";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT chantiernom, Photochantierurl, Description FROM photochantiers WHERE chantiernom='$nomchantier3'";
$result = $conn->query($sql);
echo "<form action='photochantiersuppr.php' method='get' enctype='multipart/form-data'>";
echo "<select id='chantiers4' name='chantier4'>";
echo " <option value=''>-- Choisir une image--</option>";

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<option value=" . $row["Photochantierurl"]. ">". $row["Description"]."</option><br>";
  }
  echo "</select>";
 
  echo "<input type='submit' id='chantiers7' name='submit' value='supprimer photo'>";

  echo "</form>";
  
} else {
  echo "0 results";
}
$conn->close();









}

if(!empty($_GET['chantier4'])){


  $chantierdelete=$_GET['chantier4'];


  $servername = "91.216.107.248";
$username = "azieb419148";
$password = "!Corbeille1101";
$dbname = "azieb419148";
  
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  
 
  
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  
  $sql ="DELETE FROM photochantiers WHERE Photochantierurl='$chantierdelete';" ;
  
  if ($conn->query($sql) === TRUE) {
    echo "Photo supprimé!  ";
    echo $_SESSION["chantiername"];
    echo " end";
    echo $chantierdelete;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();







  $chantiernom=$_SESSION["chantiername"];


  // $myfile = fopen("chantiers/".$chantiernom.".php", "w") or die("Unable to open file!");
  // $txt = "<!doctype html>
  // <html lang='fr'>
  // <head>
  
  
  //   <meta charset='utf-8'>
  //   <title>Titre de la page</title>
  //   <link href='chantiers.css' rel='stylesheet'>
  // </head>
  // <body>";
  
  
  // $txt .= "<h1> Chantier:  ".$chantiernom."</h1>";
  
  
  
  
  
  
  //  $servername = "localhost";
  //  $username = "Aziebat";
  //  $password = "!Corbeille1101";
  //  $dbname = "Aziebat";
  
  // // Create connection
  // $conn = new mysqli($servername, $username, $password, $dbname);
  // // Check connection
  // if ($conn->connect_error) {
  //   die("Connection failed: " . $conn->connect_error);
  // }
  
  // $sql = "SELECT * FROM `photochantiers` WHERE `chantiernom`='$chantiernom' ORDER BY ordernumber";
  // $result = $conn->query($sql);
  
  
  // if ($result->num_rows > 0) {
  //   // output data of each row
  //   while($row = $result->fetch_assoc()) {
  //    /*  echo "<option value=" . $row["title"]. ">". $row["title"]."</option><br>"; */
  
  
  
  //    $txt .="<div class='wrapper' > <div class='photowrap'> <div>"; 
  
  
  //      $txt .= "<img src='photochantier/".$row['Photochantierurl']."'class='photo'>";
  //      $txt .= "</div> </div> <h2>" . $row["Description"]. " </h2> </div> </a><br>";
       
  
      
  
  
  //   }
    
    
  // } else {
  //   echo "0 results";
  // }
  // $conn->close();
  
  
  
  
  // $txt .= "</body>
  // </html>";
  
  // fwrite($myfile, $txt);
  // fclose($myfile);
   







}

?>