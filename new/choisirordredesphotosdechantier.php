<!DOCTYPE html>
<html>
<head>

<title>Aziebat Chantiers</title>

<!-- <link href="chantiers.css" rel="stylesheet"> -->


<style>
    
    .wrapper{


margin-top: 50px;
margin-left: 30px;

width: 300px;
}


.photowrap{
/*  border: 2px solid green; */

margin-left: 0px;


width: 150px;
    height: 150px;
    overflow: hidden;

}

.photo{




width: 200px;
    height: 150px;
    margin: -75px 0 0 -100px;
}

#nameinput{
  margin-top:90px;
  margin-left: -80px;
  float:left;
  width: 30px;
  height:30px;
}

#wrap1{
  display: flex;
}

#desc{
  margin-top: -70px;
  margin-bottom:50px;
}


</style>




<meta charset="UTF-8">

</head>

<body>

    <h1>Changer l'ordre des photos de chantiers</h1>
    <p>Numeroter à partir de la lettre a, l'ordre voulu </p>



    <form action="choisirordredesphotosdechantier.php" method="post" enctype="multipart/form-data">
    <?php


session_start();

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

$sql = "SELECT Urlphoto, title, Descriptionchantier FROM chantiers";
$result = mysqli_query($conn, $sql);


echo "<select id='chantiers' name='chantier'>";
echo " <option value=''>-- Choisir un chantier--</option>";

if (mysqli_num_rows($result) > 0) {
  // output data of each row
 
  while($row = mysqli_fetch_assoc($result)) {
    echo "<option value=" . utf8_encode($row["title"]). ">". utf8_encode($row["title"])."</option><br>";


  }

  echo "</select>";


} else {
  echo "0 results";
}

mysqli_close($conn);








?>

<input type="submit" name="submit" value="selectionner chantier">
      
    </form>


<?php


if(!empty($_POST['chantier'])){

  

  $_SESSION["chantiervalue"]=$_POST['chantier'];
  $chantiernom=$_SESSION["chantiervalue"]; 
/* echo $chantiernom; */
//$chantiernom=$_POST['chantier'];
}



?>






    <form action="choisirordredesphotosdechantier.php" method="post" enctype="multipart/form-data">

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

$chantiernom=$_SESSION["chantiervalue"];
echo $chantiernom;

$sql = "SELECT * FROM photochantiers WHERE chantiernom='$chantiernom' ORDER BY ordernumber";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  echo "<div id='bwrap'>";
  $inputnameinc=0;
  while($row = mysqli_fetch_assoc($result)) {
    
/*  $rowline=$row["title"];
$pieces = explode(" ", $rowline);
$finaltitle= $pieces[0].'.php';  */


/* $finaltitle= $row["title"].'.php'; */
$inputname="input".$inputnameinc;
echo "<div id='wrap1'>";
    echo "<div class='wrapper' > <div class='photowrap'> <div > <img src='upload/"  . $row["Photochantierurl"]. "' class='photo' > </div> </div>  <h3 id='desc'>" . utf8_encode($row["Description"]). " </h3></div>";
    echo " <input type='text' id='nameinput' name='$inputname' required> <br><br>";
    echo "</div>";
    $inputnameinc++;
  }
echo "</div>";

} else {
  echo "0 results";
  echo $chantiernom;
}

mysqli_close($conn);


?>

<input type="submit" name="submit" value="changer l'ordre">
      
    </form>



    <?php


if(!empty($_POST['input0'])){

  echo 'hey';

/* for($i=0; $i<$inputnameinc; $i++){

echo $i;

echo $_POST['input'.$i];

  } */
    
    
   
/*   $servername = "localhost";
  $username = "Aziebat";
  $password = "!Corbeille1101";
  $dbname = "Aziebat"; */

  $servername = "91.216.107.248";
$username = "azieb419148";
$password = "!Corbeille1101";
$dbname = "azieb419148";
    
    $i=0;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $chantiernom=utf8_encode($_SESSION["chantiervalue"]);
    echo $chantiernom;
    
    $sql = "SELECT * FROM photochantiers WHERE chantiernom='$chantiernom'";
    $result = $conn->query($sql);
    

    
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        } 
    
        $number=$_POST['input'.$i];
        $i++;
        $keyone= $row['key2'];
        echo 'number: '.$number;
        
        $sql ="UPDATE photochantiers SET ordernumber = '$number' WHERE key2 = '$keyone' AND chantiernom='$chantiernom'";
        
        if ($conn->query($sql) === TRUE) {
           
          echo "New record created successfully";
        } else {

          echo "Error: " . $sql . "<br>" . $conn->error;
        }





      }
     
      
    } else {
      echo "0 results now";
    }

    /* for($i=0; $i<$inputnameinc; $i++){ */

    
    // Check connection
   /*  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } 

    $number=$_POST['input'.$i];
    echo $number;
    $sql ="UPDATE photochantiers SET ordernumber = '$number' WHERE key2 = $i" ;
    
    if ($conn->query($sql) === TRUE) {
       
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    } */
    






 /*  } */



    $conn->close(); 
    
    
  
}  








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






// /*  $servername = "localhost";
//  $username = "Aziebat";
//  $password = "!Corbeille1101";
//  $dbname = "Aziebat"; */


//  $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "Aziebat";

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
 







?>



</body>


</html>