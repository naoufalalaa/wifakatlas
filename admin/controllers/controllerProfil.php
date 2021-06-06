<?php
include '../controllers/connexion.php';
if(empty($_SESSION['id'])){
    header('location: index.php');
}
else{
    $getid=$_GET['id'];
    if(empty($_GET['id'])){
        header('location: profil.php?id='.$_SESSION['id']);
    }
    else{
$admin=$bdd->query('SELECT * FROM administrateur WHERE id='.$_GET['id']);
$exist=$admin->rowCount();
if($exist==0){
    header('location: profil.php?id='.$_SESSION['id']);
}else{
$user=$admin->fetch();
if($_SESSION['id']===$_GET['id']){
    $mod=true;
}
    }
}
if(isset($_GET['c']) AND isset($_GET['o'])){
    $c=$_GET['c'];
    $o=$_GET['o'];
  $inscript = $bdd->query('SELECT * FROM inscrits ORDER BY '.$c.' '.$o);
  }
  else{
  $inscript = $bdd->query('SELECT * FROM inscrits ORDER BY id DESC');
  }

if(isset($_GET['com']) AND isset($_GET['O1'])){
    $C1=$_GET['com'];
    $O1=$_GET['O1'];
  $commande = $bdd->query('SELECT * FROM commande ORDER BY '.$C1.' '.$O1);
  }
  else{
  $commande = $bdd->query('SELECT * FROM commande ORDER BY id DESC');
  }
}
?>