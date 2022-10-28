<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
    <link rel="stylesheet" href="admin.css">

</head>
<body>
    <h1>PAGE ADMIN</h1>

<?php

try
{
    // On se connecte à MySQL
    $pdo = new PDO('mysql:host=localhost;dbname=contactmmc', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}

catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table contact2
$sqlQuery = 'SELECT * FROM contactadmin';
$recipesStatement = $pdo->prepare($sqlQuery);
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();

// On affiche chaque recette une à une de chaque base de données
foreach ($recipes as $recipe) {
?>

<h2>Requête numéro : <?php echo $recipe["id"]; ?></h2> 

<div class="card" style="width: 118rem;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><p>Prénom : <?php echo $recipe["prenom"]; ?></p></li>
    <li class="list-group-item"><p>Nom : <?php echo $recipe["nom"]; ?></p></li>
    <li class="list-group-item"><p>Adresse mail : <?php echo $recipe["email"]; ?></p></li>
    <li class="list-group-item"> <p>Numéro de téléphone : <?php echo $recipe["tel"]; ?></p></li>
    <li class="list-group-item"><p>Sujet : <?php echo $recipe["sujet"]; ?></p></li>
    <li class="list-group-item"><p>Message : <?php echo $recipe["msg"]; ?></p>
  </ul>
</div>



<?php
}
?>

</body>
</html>