<h2> Ajouter un nouveau chantier</h2>

<form action="ajoutnouveauchantier.php" method="post" enctype="multipart/form-data">
        <!-- <h2>Upload Fichier</h2> -->
        <label for="fileUpload">Image:</label>
        <input type="file" name="photo" id="fileUpload">
        Nom du chantier: <input type="text" name="Pname" required> <br><br>
        Description du chantier: <textarea id="deschantier" name="deschantier" rows="3" cols="33"></textarea> <br><br>
        <input type="submit" name="submit" value="Upload">
        <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
    </form>




    <?php





$servername = "91.216.107.248";
$username = "azieb419148";
$password = "!Corbeille1101";
$dbname = "azieb419148";
    
    $i=0;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    
    $sql = "SELECT MAX(ordernumber) FROM chantiers";
    $result = $conn->query($sql);
    

    
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        
        

        session_start();
        $_SESSION['maxnumber']=$row["MAX(ordernumber)"]+1;
echo $_SESSION['maxnumber'];

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        } 
    
       
        
        if ($conn->query($sql) === TRUE) {
           
          echo "success";
        } else {
          //$_SESSION['maxnumber']=0;
          echo "error";
         /*  echo "Error: " . $sql . "<br>" . $conn->error; */
        }





      }
     
      
    } else {
      echo "0 results";
    }















// ajout chantier et photo  à la base de données
if(!empty($_POST['Pname'])){

  

  


  $prodname1=$_POST['Pname'];
  $rowline=$prodname1;
$pieces = explode(" ", $rowline);
$prodname= $pieces[0]; 
  

$fullname=$_POST['Pname'];


 /*  $address=$_POST['photo'];
  
  echo $address; */
  
  $address= $_FILES["photo"]["name"];

  $descriptchant=$_POST['deschantier'];
  
  //$con=connection();
  $nmax= $_SESSION['maxnumber'];
  
  
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
  
  $sql ="INSERT INTO chantiers (title, Urlphoto, Descriptionchantier, ordernumber, fullname) VALUES ('$prodname', '$address', '$descriptchant', ' $nmax', '$fullname')" ;
  
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  /*   echo 'prod: '.$prodname; */
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
  
  

  














// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Vérifie si le fichier a été uploadé sans erreur.
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];

        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

        // Vérifie le type MIME du fichier
        if(in_array($filetype, $allowed)){
            // Vérifie si le fichier existe avant de le télécharger.
            if(file_exists("upload/" . $_FILES["photo"]["name"])){
                echo $_FILES["photo"]["name"] . " existe déjà.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $_FILES["photo"]["name"]);
                echo "Votre fichier a été téléchargé avec succès.";
            } 
        } else{
            echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}

/* if (isset($_POST['Pname'])){
  echo '
  <script type="text/javascript">
  location.reload();
  </script>';
  } */




}
?>


    