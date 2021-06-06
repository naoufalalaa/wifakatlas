<?php
require_once 'connexion.php';
$articleParPage = 6;
$articleTotalesReq = $bdd->query('SELECT id FROM produit');
$articleTotales = $articleTotalesReq->rowCount();
$pagesTotales = ceil($articleTotales/$articleParPage);
if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
   $_GET['page'] = intval($_GET['page']);
   $pageCourante = $_GET['page'];
} else {
   $pageCourante = 1;
}
$depart = ($pageCourante-1)*$articleParPage;
$produit = $bdd->query('SELECT * FROM produit');
$nbrprod=$produit->rowCount();
if($nbrprod>0){
if(empty($_GET['C']) AND empty($_GET['O']) AND empty($_GET['q'])){
   $article = $bdd->query('SELECT * FROM produit ORDER BY id DESC LIMIT '.$depart.','.$articleParPage);
 }else{
if(isset($_GET['q']) AND empty($_GET['C']) AND empty($_GET['O'])){
   $keyword=$_GET['q'];
   $article = $bdd->query('SELECT * FROM produit WHERE titre LIKE "%'.$keyword.'%" ORDER BY titre desc LIMIT '.$depart.','.$articleParPage);
}
 
if (isset($_GET['C']) AND isset($_GET['O'])){
   $article = $bdd->query('SELECT * FROM produit ORDER BY '.$_GET['C'].' '.$_GET['O'].' ');
}
}}



?>