
<h2> Ajouter une photo à un chantier existant</h2>





<form action="ajouterphotoachantier.php" method="post" enctype="multipart/form-data">
        
<?php
/*  $servername = "localhost";
 $username = "Aziebat";
 $password = "!Corbeille1101";
 $dbname = "Aziebat"; */


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

echo "<select id='chantiers' name='chantier'>";
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

        <label for="fileUpload2">Image:</label>
        <input type="file" name="photo2" id="fileUpload2">
        Description: <input type="text" name="desc" required> <br><br>
        <input type="submit" name="submit" value="Upload" onclick="getOption()">
        <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
    </form>










<?php


if(!empty($_POST['desc'])){







  

  $chantiernom=$_POST['chantier'];



  $servername = "91.216.107.248";
  $username = "azieb419148";
  $password = "!Corbeille1101";
  $dbname = "azieb419148";
      
      $i=0;
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      
      
      $sql = "SELECT MAX(ordernumber) FROM photochantiers WHERE chantiernom='$chantiernom'";
      $result = $conn->query($sql);
      
  
      
      
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          
          echo $row["MAX(ordernumber)"];
  
          session_start();
          $_SESSION['maxnumber']=$row["MAX(ordernumber)"]+1;
  
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          } 
      
         
          
          if ($conn->query($sql) === TRUE) {
             
            
          } else {
           /*  echo "Error: " . $sql . "<br>" . $conn->error; */
          }
  
  
  
  
  
        }
       
        
      } else {
        echo "0 results";
      }
  











  $description=$_POST['desc'];

 /*  $address=$_POST['photo'];
  
  echo $address; */
  
  $address= $_FILES["photo2"]["name"];
  
  //$con=connection();
  
  $ordern= $_SESSION['maxnumber'];
  
 /*  $servername = "localhost";
  $username = "Aziebat";
  $password = "!Corbeille1101";
  $dbname = "Aziebat"; */

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
  
  $sql ="INSERT INTO photochantiers (chantiernom, Photochantierurl, Description, ordernumber) VALUES ('$chantiernom', '$address', '$description','$ordern')" ;
  
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
  
  

  








// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
  // Vérifie si le fichier a été uploadé sans erreur.
  if(isset($_FILES["photo2"]) && $_FILES["photo2"]["error"] == 0){
      $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
      $filename = $_FILES["photo2"]["name"];
      $filetype = $_FILES["photo2"]["type"];
      $filesize = $_FILES["photo2"]["size"];

      // Vérifie l'extension du fichier
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

      // Vérifie la taille du fichier - 5Mo maximum
      $maxsize = 5 * 1024 * 1024;
      if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

      // Vérifie le type MIME du fichier
      if(in_array($filetype, $allowed)){
          // Vérifie si le fichier existe avant de le télécharger.
          if(file_exists("chantiers/photochantier/" . $_FILES["photo2"]["name"])){
              echo $_FILES["photo"]["name"] . " existe déjà.";
          } else{
              move_uploaded_file($_FILES["photo2"]["tmp_name"], "upload/" . $_FILES["photo2"]["name"]);
              echo "Votre fichier a été téléchargé avec succès.";
          } 
      } else{
          echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
      }
  } else{
      echo "Error: " . $_FILES["photo2"]["error"];
  }
}




//  $myfile = fopen("chantiers/".$chantiernom.".php", "w") or die("Unable to open file!");
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

//  $i=0;
// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// $sql = "SELECT * FROM `photochantiers` WHERE `chantiernom`='$chantiernom'  ORDER BY ordernumber";
// $result = $conn->query($sql);


// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//    /*  echo "<option value=" . $row["title"]. ">". $row["title"]."</option><br>"; */



//    $txt .="<div class='wrapper' > <div class='photowrap'> <div>"; 


//      $txt .= "<img src='photochantier/".$row['Photochantierurl']."' onclick='test($i)' class='photo'>";
//      $i++;
//      $txt .= "</div> </div> <h2>" . $row["Description"]. " </h2> </div> </a><br>";
     

    


//   }
  
  
// } else {
//   echo "0 results";
// }
// $conn->close();


// $txt .="<script>";

// for($j=0;$j<$i;$j++){
// $txt .="function test(.$j.){";
//   $txt .=  "alert('hey '.$j);}";

//   }

//   $txt .=" </script>";

// $txt .= "</body>
// </html>";

// fwrite($myfile, $txt);
// fclose($myfile);
 






}









?>


