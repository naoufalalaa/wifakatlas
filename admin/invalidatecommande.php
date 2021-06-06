<?php
session_start();
if(empty($_SESSION['id'])){
   header('Location: index.php');
 }
 else{
$bdd = new PDO("mysql:host=127.0.0.1;dbname=AWAM;charset=utf8", "root", "");
if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $validate_id = htmlspecialchars($_GET['id']);
   $validate = $bdd->prepare('UPDATE commande SET validate = 0 WHERE id = ?');
   $validate->execute(array($validate_id));
   $commande=$bdd->prepare('SELECT * FROM commande WHERE id=?');
   $commande->execute(array($validate_id));
   $c=$commande->fetch();
   $prod=$bdd->prepare('SELECT * FROM produit WHERE id=?');
   $prod->execute(array($c['id_prod']));
   $p=$prod->fetch();
   $s=$p['s']+$c['qS'];
   $m=$p['m']+$c['qM'];
   $l=$p['l']+$c['qL'];
   $somme=$s+$m+$l;
   $change=$bdd->prepare('UPDATE produit SET s=? , m=? , l=?, stock=? WHERE id=?');
   $change->execute(array($s,$m,$l,$somme,$c['id_prod']));
   header('Location: commande.php?id='.$validate_id);
   
}}
?>