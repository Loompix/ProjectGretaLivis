<?php

// Découverte de PDO

// Step 1: Se connecter

// Doc: http://php.net/manual/fr/pdo.construct.php
// Exemple: http://php.net/manual/fr/pdo.construct.php#refsect1-pdo.construct-examples

// Premier argument pour le constructeur PDO: le dsn => détails:
// mysql => driver de la base de données, nous c'est mysql
// dbname=blog => On souhaite accéder aux tables de la base de données blog
// host=localhost => L'adresse du serveur sur lequel se trouve MySQL, pour nous, c'est localhost car sur la même machine que PHP
// charset=UTF8 => Comme pour HTML, mais ici pour spécifier le format des caractères de la liaison entre PHP/PDO et MySQL.
$dsn = 'mysql:dbname=projet_greta;host=localhost;charset=UTF8';
$user = 'cyril'; // Le nom de l'utilisateur de la BDD
$password = 'cyril'; // Mot de passe de l'utilisateur du dessus

// Je créé mon instance de la classe PDO
$pdo = new PDO($dsn, $user, $password);


// Step 2: Jouer :D

// J'écris ma requête dans une string
$sql = 'SELECT * FROM articles;';
// J'écris ma requête dans une string (version avec un ORDER BY)
$sql = 'SELECT * FROM articles ORDER BY date ASC;';

// J'affiche ma requête et ca ne sert à rien... (débug)
// var_dump($sql);

// J'execute la requete, et je récupère un objet PDOStatement (ou FALSE si j'ai une erreur)
// $pdo => objet PDO (connexion/relation avec la bdd)
// ->query => méthode executant la requête fournie en arguement/parametre et retournant un PDOStatement
// $pdoStatement => objet PDOStatement contenant l'ensemble des résultats de la requête
$pdoStatement = $pdo->query($sql);

// var_dump($pdoStatement);

// Si jamais il y a une erreur dans ma requête...
if ($pdoStatement === false) {

    // J'affiche les erreurs avec un print_r
    print_r($pdo->errorInfo());
    // Puis j'arrete mon code
    die();
}

// Je demande à PDOStatement de me donner les résultats sous la forme d'un tableau (fetchAll)
// Je précise à PDOStatement que je veux le résultat sous la forme d'un tableau associatif (PDO::FETCH_ASSOC)
$results = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

// J'affiche en mode "debug" la liste des résultats
// var_dump($results[1]['Content']);

// Si je souhaite afficher le nom du deuxieme résultat:
// $results => Liste des résultats (jeu de résultat) (tableau indexé multidimentionnel)
// [1] => Je cible l'index 1 de mon tableau (un tableau indexé commence à l'index 0 donc ici je cible le deuxieme résultat)
// ['name'] => Pour acceder à la valeur de la clé "name" ('name' car c'est le nom du champ dans ma table 'author')
// print_r($results[1]['name']);

// // Si je souhaite afficher les adresses emails de mes auteurs :
// // Je vais donc parcourir mon tableau de résultats
// foreach ($results as $currentResult) {

//     echo $currentResult ['Author'] ."\n";

//     // Le nom pour l'id ... est ... courriel associée est ...

//     // echo 'Le nom pour l\'id ' . $currentResult['id'] . ' est ' . $currentResult['name'] . ' le courriel associé est ' . $currentResult['email'] . "\n";
// }


// Deuxieme requête:

// Je souhaite afficher la liste des catégories...
// avec le message suivant:
// Il y a actuellement ... catégories, voici la liste:
// ...
// ...

// Mise en place de ma requête
// $sql = 'SELECT name FROM category;';

// $pdoStatement = $pdo->query($sql);

// Si jamais il y a une erreur dans ma requête...
// if ($pdoStatement === false) {

//     // J'affiche les erreurs avec un print_r
//     print_r($pdo->errorInfo());
//     // Puis j'arrete mon code
//     die();
// }

// // Récupération des résultats sous la forme d'un tableau
// $results = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

// // J'affiche le nombre de résultats
// echo 'Il y a actuellement ' . count($results) . ' catégories, voici la liste:' . "\n";

// // Je parcours la liste des résultats
// foreach ($results as $currentRow) {

//     echo $currentRow['name'] . "\n";
// }


// // Troisième requête:

// // Afficher l'article qui a l'ID 1

// // Mise en place de la requête SQL
// $sql = 'SELECT * FROM post WHERE id = 1;';

// $pdoStatement = $pdo->query($sql);

// // Si jamais il y a une erreur dans ma requête...
// if ($pdoStatement === false) {

//     // J'affiche les erreurs avec un print_r
//     print_r($pdo->errorInfo());
//     // Puis j'arrete mon code
//     die();
// }

// // $result sans "S" car je fait un fetch, je n'aurai donc qu'un seul résultat !
// $result = $pdoStatement->fetch(PDO::FETCH_ASSOC);

// if (empty($result)) {

//     echo 'Pas de résultat';
//     die();
// }

// // Comme j'ai fait un fetch, je n'ai pas besoin d'aller cibler un index, j'ai directement mon tableau associatif
// var_dump($result['title']);