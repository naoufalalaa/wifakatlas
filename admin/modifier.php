<?php
session_start();
if(empty($_SESSION['id'])){
  header('Location: index.php');
}
else{
$bdd = new PDO("mysql:host=127.0.0.1;dbname=AWAM;charset=utf8", "root", "");
$mode_edition = 0;
if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
   $mode_edition = 1;
   $edit_id = htmlspecialchars($_GET['edit']);
   $edit_article = $bdd->prepare('SELECT * FROM article WHERE id = ?');
   $edit_article->execute(array($edit_id));
   if($edit_article->rowCount() == 1) {
      $edit_article = $edit_article->fetch();
   } else {
      die('');
   }
}
if(isset($_POST['article_titre'],$_POST['article_descript'], $_POST['article_contenu'])) {
    $article_titre = htmlspecialchars(ucfirst($_POST['article_titre']));
    $article_descript = htmlspecialchars(ucfirst($_POST['article_descript']));  
    $article_contenu = htmlspecialchars(ucfirst($_POST['article_contenu']));
         $update = $bdd->prepare('UPDATE article SET titre = ?, descript = ?, contenu = ? WHERE id = ?');
         $update->execute(array($article_titre,$article_descript, $article_contenu, $edit_id));
         $message = 'Votre article a bien été mis à jour !';
         header('Location: ../article.php?id='.$edit_id);
   }
?>
<!DOCTYPE html>
<html>
<head>
   <title>Éditer l'article <?= $edit_article['titre'] ?></title>
   <meta charset="utf-8">
   <link rel="icon" href="../assets/img/logo.png">
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<?php
include 'adminMenu.php';?>
<br>

<div class="card text-white bg-dark mb-3 w-50" align="center" style="margin-left:25%">
  <div class="card-header">Mise à jour du Blog</div>
  <div class="card-body">
    <h5 class="card-title">Modifier un article</h5>
    <form method="POST">
        <div class="input-group mb-3 w-50">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Titre</span>
            </div>
            <input type="text" class="form-control" name="article_titre" placeholder="Titre" aria-describedby="basic-addon1" <?php if($mode_edition == 1) { ?> value="<?= 
      $edit_article['titre'] ?>"<?php } ?> >
        </div>

        <div class="input-group mb-3 w-75">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Description</span>
            </div>
            <input type="text" class="form-control"  name="article_descript" placeholder="descript" aria-describedby="basic-addon1" <?php if($mode_edition == 1) { ?> value="<?= 
      $edit_article['descript'] ?>"<?php } ?>>
        </div>


        <div class="input-group w-100">
            <div class="input-group-prepend">
                <span class="input-group-text">Contenu</span>
            </div>
            <textarea class="form-control" aria-label="With textarea" name="article_contenu" placeholder="Contenu de l'article"><?php if($mode_edition == 1) { ?><?= 
      $edit_article['contenu'] ?><?php } ?></textarea>
        </div>
        <br>

    <input class="btn btn-light" type="submit" value="Mettre à jour l'article">
    <a type="button" href="profil.php?id=<?= $_SESSION['id'] ?>" class="btn btn-outline-light">Retour</a>

   </form>
    
    
  </div>
</div>

   <br />
   <?php if(isset($message)) { echo $message; } ?>
</body>
</html>
<?php
}
?>