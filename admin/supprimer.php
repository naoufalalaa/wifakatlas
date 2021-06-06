<?php
session_start();
if(empty($_SESSION['id'])){
   header('Location: index.php');
 }
 else{
$bdd = new PDO("mysql:host=127.0.0.1;dbname=AWAM;charset=utf8", "root", "");
if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $suppr_id = htmlspecialchars($_GET['id']);
   $suppr = $bdd->prepare('DELETE FROM article WHERE id = ?');
   $suppr->execute(array($suppr_id));
   $mask = '../assets/articles/'.$_GET['id'].'a*.*';
   array_map('unlink', glob($mask));
   header('Location: ajouterarticle.php');
}}
?>