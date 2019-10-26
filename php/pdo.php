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
$user = 'root'; // Le nom de l'utilisateur de la BDD
$password = ''; // Mot de passe de l'utilisateur du dessus

// Je créé mon instance de la classe PDO
$pdo = new PDO($dsn, $user, $password);


$sql = 'SELECT * FROM articles;';
$pdoStatement = $pdo->query($sql);

// var_dump($pdoStatement);

// Si jamais il y a une erreur dans ma requête...
if ($pdoStatement === false) {

    // J'affiche les erreurs avec un print_r
    print_r($pdo->errorInfo());
    // Puis j'arrete mon code
    die();
}


$results = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
?>