<?php
session_start();
$bdd = new PDO("mysql:host=127.0.0.1;dbname=AWAM;charset=utf8", "root", "");
if(empty($_SESSION['id'])){
  header('Location: index.php');
}
else{
if(isset($_POST['article_titre'])) {
   if(!empty($_POST['article_titre'])) {
      
      $article_titre = htmlspecialchars(ucfirst($_POST['article_titre']));
      
      $ins = $bdd->prepare('INSERT INTO pic_eleve (titre) VALUES (?)');
      $ins->execute(array($article_titre));
      $lastid = $bdd->lastInsertId();





      $message = '<div class="alert alert-success" role="alert\>
      <h4 class="alert-heading">Article posté!</h4>
      <p>Votre article <strong><i>'.ucfirst($article_titre).'</i></strong> a bien été mis en ligne par '.$_SESSION['pseudo'].'</p>
      <a class="btn btn-dark" href="../article.php?id='.$lastid.'">Voir l\'article</a>
      </div>';




      if(isset($_FILES['image']) AND !empty($_FILES['image']['name'])) {
        if(exif_imagetype($_FILES['image']['tmp_name']) == 2) {
           $chemin = '../assets/eleve/'.$lastid.'.jpg';
           move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
        } else {
           $message = 'Votre image doit être au format jpg';
        }
     }


   }
   
   else {
      $message = '<div class="alert alert-warning alert-dismissible fade show w-50" role="alert">
      <strong>Tous les champs ne sont pas remplit</strong> Veuillez remplir tous les champs!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
   }
}
?>
<!DOCTYPE html>
<html>
<head>
   <title>Ajouter photo</title>
   <meta charset="utf-8">
   <link rel="icon" href="../assets/img/logo.png">
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="../assets/uikit/css/uikit.min.css" />

<script src="../assets/uikit/js/uikit.min.js"></script>

<script src="../assets/uikit/js/uikit-icons.min.js"></script>

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php
include 'adminMenu.php';
?>
<br>

<div class="card text-white bg-dark mb-3 w-50" align="center" style="margin-left:25%">
  <div class="card-header">Mise à jour du slider École</div>
   <div class="card-body">
    <h5 class="card-title" style="color:white">Ajouter une photo</h5>
    <form method="POST"class="needs-validation" novalidate enctype="multipart/form-data">
        <div class="input-group mb-3 w-50">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Titre</span>
            </div>
            <input type="text" class="form-control" name="article_titre" placeholder="Titre" required aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3 w-50">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" placeholder=".jpg" id="inputGroupFile02" required>
                <label class="custom-file-label" for="inputGroupFile02" align="left">Miniature</label>
                <div class="input-group-append">
                <span class="input-group-text" id="">Importer</span>
                </div>
            </div>
        </div>
            
<br>
    <input class="btn btn-light" type="submit" value="Envoyer l'article" />
    <a href="profil.php?id=<?= $_SESSION['id'] ?>" class="btn btn-outline-light">Annuler</a>

   </form>
    
    
  </div>
</div>
   
   <br />
   <?php if(isset($message)) { echo $message; } ?>



   <div align="center">
<?php
$eleve=$bdd->query('SELECT * FROM pic_eleve ORDER BY id DESC');
$nbreleve=$eleve->rowCount();
if($nbreleve>0){
?>
<div class="uk-position-relative uk-visible-toggle uk-light uk-padding uk-margin-top uk-margin-bottom" tabindex="-1" uk-slider>

    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@m uk-grid">
<?php
    while($pic=$eleve->fetch()){?>
        <li>
            <div class="uk-panel shadow">
                <div uk-lightbox>
                    <a class="uk-button uk-button-default" href="../assets/eleve/<?=$pic['id'] ?>.jpg">
                        <img src="../assets/eleve/<?=$pic['id'] ?>.jpg" alt="">
                        <div class="uk-position-center uk-panel"><h1><?=$pic['titre'] ?></h1>
                        
                        </div>
                        
                    </a>
                </div>
                
            </div><a href="supprimerslider.php?id=<?=$pic['id'] ?>" class="btn btn-danger">Delete</a>
        </li>
    <?php }?>
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

</div>
    <?php }?>
    </div>
</body>
<script>/* //////////////////////////////////////////////
Plus d'informations liées à la solution  : 
////////////////////////////////////////////// */

/*
Toutes le fonctions ci-dessous peuvent être optimisées
elles sont même volontairement non optimisées
Elles sont là juste pour vous présenter le concept à vous de les améliorer 
*/
function createThumbnail(sFile,sId) {
  var oReader = new FileReader();
  oReader.addEventListener('load', function() {
    var oImgElement = document.createElement('img');
    oImgElement.classList.add('imgPreview') 
    oImgElement.src = this.result;
    document.getElementById('preview-'+sId).appendChild(oImgElement);
  }, false);

  oReader.readAsDataURL(sFile);

}//function
function changeInputFil(oEvent){
  var oInputFile = oEvent.currentTarget,
      sName = oInputFile.name,
      aFiles = oInputFile.files,
      aAllowedTypes = ['png', 'jpg', 'jpeg', 'gif'],
      imgType;  
  document.getElementById('preview-'+sName).innerHTML ='';
  for (var i = 0 ; i < aFiles.length ; i++) {
    imgType = aFiles[i].name.split('.');
    imgType = imgType[imgType.length - 1];
    if(aAllowedTypes.indexOf(imgType) != -1) {
      createThumbnail(aFiles[i],sName);
    }//if
  }//for
}//function 

document.addEventListener('DOMContentLoaded',function(){
 var aFileInput = document.forms['myForm'].querySelectorAll('[type=file]');
  for(var k = 0; k < aFileInput.length;k++){
    aFileInput[k].addEventListener('change', changeInputFil, false);
  }//for
});</script>


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
</html>
<?php
}?>