<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Exemple PHP</title>
</head>
<body>
<?php
    require_once('pdo.php');
    ?>
    
        <h2> Voici la liste des articles enregistrés en BDD gérés via phpMyAdmin : </h2>
        <p class="text-center mb-5">Retour à <a class ="text-warning"href="../index.php">l'accueil</a></p>
        

        <?php
            foreach ($results as $currentResult) {

                ?>
                <article class="foreach">
                    <h3> Auteur : <?= $currentResult['Author'] ?></h3>
                    <p class="articleContent text-white"> <?= $currentResult['Content'] ?></p>
                    <p class="articleDate">Créé le <?= $currentResult['Date'] ?></p>
                </article>
                <?php
            }
        ?>
    
</body>
</html>
