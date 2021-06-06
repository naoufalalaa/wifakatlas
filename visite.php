<?php
include_once 'controllers/connexion.php';

if(isset($_GET['id'])AND !empty($_GET['id'])){
    $parte=$bdd->query('SELECT * FROM partenaire WHERE id='.$_GET['id']);
    $par=$parte->fetch();
    $site=$par['site'];
    $vues=intval($par['visite'])+1;
    $update=$bdd->prepare('UPDATE partenaire SET visite=?');
    $update->execute(array($vues));
    header('location: '.$site);
}else{
    header('location: index.php');
}
?>