<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>

  <style>

ul {
 padding:0;
 margin:0;
 list-style-type:none;
 }
li {
 margin-left:2px;
 float:left; /*pour IE*/
 }
ul li a {
 display:block;
 float:left;   
 width:100px;
 background-color:#6495ED;
 color:black;
 text-decoration:none;
 text-align:center;
 padding:5px;
 border:2px solid;
 /*pour avoir un effet "outset" avec IE :*/
 border-color:#DCDCDC #696969 #696969 #DCDCDC;
 }
ul li a:hover {
 background-color:#D3D3D3;
 border-color:#696969 #DCDCDC #DCDCDC #696969;
 } 
  </style>

</head>
<body>
 
  <!--   <form action="backofficehome.php" method="post" enctype="multipart/form-data">
      
       Mot de passe <input type="text" name="pass" required> <br><br>
       
        <input type="submit" name="submit" value="click">
       
    </form>
 -->

    <?php
    
/* if($_POST['pass']=='zeeshan'){ */


  session_start(); 


  echo "<ul>";
   echo ' <li><a href="new/ajoutnouveauchantier.php">Ajouter un chantier</a></li>';
   echo '<li><a href="new/supprimerchantier.php">Supprimer un chantier</a></li>';
   echo '<li><a href="new/ajouterphotoachantier.php">Ajouter une photo à un chantier existant</a></li>';
  echo  '<li><a href="new/photochantiersuppr.php">Supprimer une photo d un chantier existant</a></li>';
  echo  '<li><a href="new/ordrechantier.php">Choisir lordre des photos chantiers</a></li>';
  echo  '<li><a href="new/choisirordredesphotosdechantier.php">Choisir l ordre des photos de chantiers</a></li>';
  echo "</ul>";

  /* $_SESSION["passok"]='ok'; 


} else  if(!empty($_POST['pass'])){
    echo 'mot de passe erroné';
} */
    ?>

   
    
    

</body>
</html>