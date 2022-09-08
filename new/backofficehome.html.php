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
 


    

    <ul>
      <li><a href="ajoutnouveauchantier.php">Ajouter un chantier</a></li>
      <li><a href="supprimerchantier.php">Supprimer un chantier</a></li>
      <li><a href="ajouterphotoachantier.php">Ajouter une photo à un chantier existant</a></li>
      <li><a href="backofficesuppr.php">Supprimer une photo d'un chantier existant</a></li>
    </ul>
    
    

</body>
</html>