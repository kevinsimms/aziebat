<h2> Supprimer chantier</h2>

<form action="supprimerchantier.php" method="post" enctype="multipart/form-data">
        <!-- <h2>Upload Fichier</h2> -->






        <?php
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

echo "<select id='chantiers2' name='chantier2'>";
echo " <option value=''>-- Choisir un chantier--</option>";

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<option value=" . $row["title"]. ">".$row["fullname"]."</option><br>";
  }
  echo "</select>";
  
} else {
  echo "0 results";
}
$conn->close();

?>







     
        <input type="submit" name="submit" value="Suprimer">
      
    </form>

</div>
</div>


<?php
// suprrimer un chantier
if(!empty($_POST['chantier2'])){


$titledelete=$_POST['chantier2'];


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
 
  
  $sql ="DELETE FROM chantiers WHERE title='$titledelete'" ;
  
  if ($conn->query($sql) === TRUE) {
    echo "Chantier supprimer avec succès";
    echo $titledelete;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();






}

?>