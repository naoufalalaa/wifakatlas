<?php
require_once 'connexion.php';
$articles=$bdd->query('SELECT * FROM article ORDER BY id DESC');
$nbrarticles=$articles->rowCount();
$produit=$bdd->query('SELECT * FROM produit ORDER BY id DESC');
$nbrproduit=$produit->rowCount();

?>