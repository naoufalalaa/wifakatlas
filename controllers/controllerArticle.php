<?php
require_once 'connexion.php';

# CHECKING VIEWS #
$userIp=$_SERVER['REMOTE_ADDR'];
$check=$bdd->prepare('SELECT * FROM views WHERE ip_user=? AND id=?');
$check->execute(array($userIp,$_GET['id']));
$ip_exist= $check->rowCount();
# CHECKING VIEWS #

# FETCHING DATA #
if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $get_id = htmlspecialchars($_GET['id']);
   $article = $bdd->prepare('SELECT * FROM article WHERE id = ?');
   $article->execute(array($get_id));
   if($article->rowCount() == 1) {
      $article = $article->fetch();
      $titre = $article['titre'];
      $descript = $article['descript'];
      $contenu = $article['contenu'];
      $time=strtotime($article['date_time_publication']);
      $views=$article['views'];
      if($ip_exist<1){
        $views++;
        $view=$bdd->prepare('UPDATE article SET views=? WHERE id=?');
        $view->execute(array($views,$get_id));
        $visit=1;
       $insertip=$bdd->prepare('INSERT INTO views(id,ip_user,visited) VALUES(?,?,?)');
       $insertip->execute(array($get_id,$userIp,$visit));
      }
   } else {
      die();
   }
} else {
   die();
}
# FETCHING DATA #
?>