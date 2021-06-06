<?php
session_start();
if(empty($_SESSION['id'])){
   header('Location: index.php');
 }
 else{
$bdd = new PDO("mysql:host=127.0.0.1;dbname=AWAM;charset=utf8", "root", "");
if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $verify_id = htmlspecialchars($_GET['id']);
   $verify = $bdd->prepare('UPDATE inscrits SET verify = 0 WHERE id = ?');
   $verify->execute(array($verify_id));
   header('Location: profil.php?id='.$_SESSION['id']);
}}
?>