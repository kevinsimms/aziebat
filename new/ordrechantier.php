<!DOCTYPE html>
<html>
<head>

<title>Aziebat Chantiers</title>

<!-- <link href="chantiers.css" rel="stylesheet"> -->


<style>
    
    .wrapper{

      margin-top: 50px;
clear:left;
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


#titletext{
  margin-top:-45px;
}

</style>




<meta charset="UTF-8">

</head>

<body>

    <h1>Changer l'ordre des chantiers</h1>
    <p>Numeroter l'ordre voulu </p>


    <form action="ordrechantier.php" method="post" enctype="multipart/form-data">

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

$sql = "SELECT Urlphoto, title, Descriptionchantier, fullname FROM chantiers ORDER BY ordernumber";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  echo "<div id='bwrap'>";
  $inputnameinc=0;
  while($row = mysqli_fetch_assoc($result)) {
    
 $rowline=$row["title"];
$pieces = explode(" ", $rowline);
$finaltitle= $pieces[0].'.php'; 


/* $finaltitle= $row["title"].'.php'; */
$inputname="input".$inputnameinc;
echo "<div id='wrap1'>";
    echo "<div class='wrapper' > <div class='photowrap'> <div > <img src='upload/"  . $row["Urlphoto"]. "' class='photo' > </div> </div> <h2 id='titletext'>" . $row["fullname"]. " </h2> <h3 id='desc'>" . $row["Descriptionchantier"]. " </h3></div>";
    echo " <input type='text' id='nameinput' name='$inputname' required> <br><br>";
    echo "</div>";
    $inputnameinc++;
  }
echo "</div>";

} else {
  echo "0 results";
}

mysqli_close($conn);


?>

<input type="submit" name="submit" value="changer l'ordre">
      
    </form>



    <?php


if(!empty($_POST['input1'])){

  

/* for($i=0; $i<$inputnameinc; $i++){

echo $i;

echo $_POST['input'.$i];

  } */
    
    
   
 /*  $servername = "localhost";
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
    
    
    $sql = "SELECT key1 FROM chantiers";
    $result = $conn->query($sql);
    

    
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        } 
    
        $number=$_POST['input'.$i];
        $i++;
        $keyone= $row['key1'];
        /* echo $number; */
        $sql ="UPDATE chantiers SET ordernumber = '$number' WHERE key1 = '$keyone' ";
        
        if ($conn->query($sql) === TRUE) {
           
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }





      }
     
      
    } else {
      echo "0 results";
    }

    /* for($i=0; $i<$inputnameinc; $i++){ */

    
    // Check connection
   /*  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } 

    $number=$_POST['input'.$i];
    echo $number;
    $sql ="UPDATE chantiers SET ordernumber = '$number' WHERE key1 = $i" ;
    
    if ($conn->query($sql) === TRUE) {
       
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
     */

 /*  } */



    $conn->close(); 
    
    
  
}  







?>



</body>


</html>