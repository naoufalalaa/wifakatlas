<?php
session_start();
if(empty($_SESSION['id'])){
   header('Location: index.php');
 }
 else{
$bdd = new PDO("mysql:host=127.0.0.1;dbname=AWAM;charset=utf8", "root", "");
if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $validate_id = htmlspecialchars($_GET['id']);
   $validate = $bdd->prepare('DELETE FROM commande WHERE id = ?');
   $validate->execute(array($validate_id));
   header('Location: commande.php?id='.$validate_id);  
}}
?>