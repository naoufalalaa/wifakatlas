<?php
require_once 'connexion.php';
$articles=$bdd->query('SELECT * FROM article ORDER BY id DESC');
$nbrarticles=$articles->rowCount();
$articleParPage = 4;
$pagesTotales=ceil($nbrarticles/$articleParPage);
if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
    $_GET['page'] = intval($_GET['page']);
    $pageCourante = $_GET['page'];
 } else {
    $pageCourante = 1;
 }
 $depart = ($pageCourante-1)*$articleParPage;

 if(empty($_GET['C']) AND empty($_GET['O']) AND empty($_GET['q'])){
   $article = $bdd->query('SELECT * FROM article ORDER BY id DESC LIMIT '.$depart.','.$articleParPage);
 }else{
if(isset($_GET['q']) AND empty($_GET['C']) AND empty($_GET['O'])){
   $keyword=$_GET['q'];
   $article = $bdd->query('SELECT * FROM article WHERE titre LIKE "%'.$keyword.'%" ORDER BY titre desc LIMIT '.$depart.','.$articleParPage);
}
 
elseif(isset($_GET['C']) AND isset($_GET['O'])){
   $article = $bdd->query('SELECT * FROM article ORDER BY '.$_GET['C'].' '.$_GET['O'].' ');
}
}$exist=$article->rowCount();

?>