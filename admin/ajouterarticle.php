<?php
session_start();
$bdd = new PDO("mysql:host=127.0.0.1;dbname=AWAM;charset=utf8", "root", "");
if(empty($_SESSION['id'])){
  header('Location: index.php');
}
else{
if(isset($_POST['article_titre'])) {
      
      $article_titre = htmlspecialchars(ucfirst($_POST['article_titre']));
      $article_descripion = htmlspecialchars(ucfirst($_POST['article_descript']));
      $article_contenu = htmlspecialchars(ucfirst($_POST['article_contenu']));

      $ins = $bdd->prepare('INSERT INTO article (titre, descript, contenu, date_time_publication) VALUES (?,?, ?, NOW())');
      $ins->execute(array($article_titre, $article_descripion, $article_contenu));
      $lastid = $bdd->lastInsertId();

        
      
      





      $message = '<div class="alert alert-success" role="alert\>
      <h4 class="alert-heading">Article posté!</h4>
      <p>Votre article <strong><i>'.ucfirst($article_titre).'</i></strong> a bien été mis en ligne par '.$_SESSION['pseudo'].'</p>
      <a class="btn btn-dark" href="../article.php?id='.$lastid.'">Voir l\'article</a>
      </div></div>';

      
      $inss = $bdd->prepare('INSERT INTO pic_eleve (titre) VALUES (?)');
      $inss->execute(array($article_titre));
      $lastids = $bdd->lastInsertId();

   


      if(isset($_FILES['miniature']) AND !empty($_FILES['miniature']['name'])) {
        if(exif_imagetype($_FILES['miniature']['tmp_name']) == 2) {
           $chemin = '../assets/articles/'.$lastid.'a.jpg';
           move_uploaded_file($_FILES['miniature']['tmp_name'], $chemin);
        } else {
           $message = 'Votre image doit être au format jpg';
        }

     }
     $fn = '../assets/articles/'.$lastid.'a.jpg';    
     $newfn = '../assets/eleve/'.$lastids.'.jpg'; 
 
copy($fn,$newfn);
     $i=1;
     while($i<=7){
         if(isset($_FILES['img'.$i])){
             $file=$_FILES['img'.$i];
             $filename=$_FILES['img'.$i]['name'];
             $filetmpname=$_FILES['img'.$i]['tmp_name'];
             $fileext=explode('.',$filename);
             $fileExt=strtolower(end($fileext));
             $chemin = '../assets/articles/'.$lastid.'a'.$i.'.'.$fileExt;
                move_uploaded_file($_FILES['img'.$i]['tmp_name'], $chemin);
         }
         $i++;
     }

   
     
  
}
$articles = $bdd->query('SELECT * FROM article ORDER BY date_time_publication DESC');

?>
<!DOCTYPE html>
<html>
<head>
   <title>Rédaction</title>
   <meta charset="utf-8">
   <link rel="icon" href="../assets/img/logo.png">
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php
include 'adminMenu.php';
?>
<br>

<div class="card text-white bg-dark mb-3 w-50" align="center" style="margin-left:25%">
  <div class="card-header">Mise à jour du Blog</div>
   <div class="card-body">
    <h5 class="card-title">Ajouter un article</h5>
    <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

        <div class="input-group mb-3 w-50">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Titre</span>
            </div>
            <input type="text" class="form-control" name="article_titre" placeholder="Titre" required aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3 w-75">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Description</span>
            </div>
            <input type="text" class="form-control"  name="article_descript" placeholder="descript" required aria-describedby="basic-addon1">
        </div>


        <div class="input-group w-100">
            <div class="input-group-prepend">
                <span class="input-group-text">Contenu</span>
            </div>
            <textarea class="form-control" aria-label="With textarea" name="article_contenu" required placeholder="Contenu de l'article"></textarea>
        </div>
        <br>
        <div class="input-group mb-3 w-50">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="miniature" placeholder=".jpg" id="inputGroupFileminia" required>
                <label class="custom-file-label" for="inputGroupFileminia" align="left">Miniature</label>
                <div class="input-group-append">
                <span class="input-group-text" id="miniature">Importer</span>
                </div>
            </div>
        </div>
        <?php
        $i=1;
        while($i<=7){
        ?>
        <div class="input-group mb-3 w-50">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="img<?=$i?>" placeholder=".jpg">
                <label class="custom-file-label" for="image<?=$i?>" align="left">File n°<?=$i?></label>
                <div class="input-group-append">
                <span class="input-group-text" id="<?=$i?>">Importer</span>
                </div>
            </div>
        </div>
        <?php $i++;}?>
<br>
    <input class="btn btn-light" type="submit" value="Envoyer l'article" />
    <a href="profil.php?id=<?= $_SESSION['id'] ?>" class="btn btn-outline-light">Annuler</a>

   </form>
    
    
  </div>
</div>
   
   <br />
   <?php if(isset($message)) { echo $message; } ?>

<?php
if($articles->rowCount()>0){
?>
<div align="center">
   <table class="table table-striped w-75">
  <thead align="left">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Miniature</th>
      <th scope="col">Titre</th>
      <th scope="col">Modifier</th>
      <th scope="col">Supprimer</th>
      <th scope="col">Date et heure de modificaion</th>
    </tr>
  </thead>
  <tbody>
    <tr>
          <?php while($a = $articles->fetch()) { ?>
            <tr>
      <th scope="row"><a href="../article.php?id=<?= $a['id'] ?> "> <?= $a['id'] ?></a></th>
      <th scope="row"><img src="../assets/articles/<?= $a['id'] ?>a.jpg" width="100px" alt="<?= $a['titre'] ?>"></th>
      <td><a href="../article.php?id=<?= $a['id'] ?> "> <?= $a['titre'] ?></a></td>
      <td><a class="btn btn-primary" href="modifier.php?edit=<?= $a['id'] ?>">Modifier</a></td>
      <td><a class="btn btn-outline-danger" href="supprimer.php?id=<?= $a['id'] ?>">Supprimer</a></td>
      <td><?= $a['date_time_publication'] ?></td>
    </tr>
      <?php } ?>
      </tbody>
</table></div><?php } ?>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
</body>
</html>
<?php
}?>