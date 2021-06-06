<?php
session_start();
$bdd = new PDO("mysql:host=127.0.0.1;dbname=AWAM;charset=utf8", "root", "");
if(empty($_SESSION['id'])){
  header('Location: index.php');
}
else{
if(isset($_POST['produit_titre'], $_POST['produit_prix'])) {
   if(!empty($_POST['produit_titre']) AND !empty($_POST['produit_descript']) AND !empty($_POST['produit_prix'])) {
      
      $produit_titre = htmlspecialchars(ucfirst($_POST['produit_titre']));
      $produit_descripion = htmlspecialchars(ucfirst($_POST['produit_descript']));
      $produit_prix = htmlspecialchars($_POST['produit_prix']);
      $produit_S = htmlspecialchars($_POST['produit_S']);
      $produit_M = htmlspecialchars($_POST['produit_M']);
      $produit_L = htmlspecialchars($_POST['produit_L']);
      $produit_stock = $produit_L+$produit_M+$produit_S;
      
      $ins = $bdd->prepare('INSERT INTO produit (titre, descript, prix,stock,s,m,l, date_time_publication) VALUES (?,?, ?,?,?, ?,?, NOW())');
      $ins->execute(array($produit_titre, $produit_descripion, $produit_prix,$produit_stock,$produit_S,$produit_M,$produit_L));
      $lastid = $bdd->lastInsertId();

      
      





      $message = '<div class="alert alert-success" role="alert\>
      <h4 class="alert-heading">produit posté!</h4>
      <p>Votre produit <strong><i>'.ucfirst($produit_titre).'</i></strong> a bien été mis en ligne par '.$_SESSION['pseudo'].'</p>
      <a class="btn btn-dark" href="../produit.php?id='.$lastid.'">Voir l\'produit</a>
      </div>';



      if(isset($_FILES['produit']) AND !empty($_FILES['produit']['name'])) {
        if(exif_imagetype($_FILES['produit']['tmp_name']) == 2) {
           $chemin = '../assets/produit/'.$lastid.'p.jpg';
           move_uploaded_file($_FILES['produit']['tmp_name'], $chemin);
        } else {
           $message = 'Votre image doit être au format jpg';
        }
     }
     $i=1;
     while($i<5){
     if(isset($_FILES['p'.$i.'']) AND !empty($_FILES['p'.$i.'']['name'])) {
        if(exif_imagetype($_FILES['p'.$i.'']['tmp_name']) == 2) {
           $chemin = '../assets/produit/'.$lastid.'p'.$i.'.jpg';
           move_uploaded_file($_FILES['p'.$i.'']['tmp_name'], $chemin);
        } else {
           $message = 'Votre image doit être au format jpg';
        }
     }
     $i++;
    }
   }
   
   
}
?>
<!DOCTYPE html>
<html>
<head>
   <title>Rédaction Nouveau • Produit</title>
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
<?php if(isset($message)) { echo $message; } ?>
  <div class="card-header">Mise à jour du Blog</div>
   <div class="card-body">
    <h5 class="card-title">Ajouter un produit</h5>


    <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="input-group mb-3 w-50">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Titre</span>
            </div>
            <input type="text" class="form-control" name="produit_titre" required placeholder="Titre" aria-describedby="basic-addon1">
        </div>
<br>
        <div class="input-group mb-3 w-75">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Description</span>
            </div>
            <input type="text" class="form-control"  name="produit_descript" required placeholder="descript" aria-describedby="basic-addon1">
        </div>
<br>

        <div class="input-group w-100">
            <div class="input-group-prepend">
                <span class="input-group-text">Stock de taille S</span>
            </div>
            <input class="form-control" type="number" min="0" name="produit_S" required placeholder="Stock de taille S">
        </div><br>
        <div class="input-group w-100">
            <div class="input-group-prepend">
                <span class="input-group-text">Stock de taille M</span>
            </div>
            <input class="form-control" type="number" min="0" name="produit_M" required placeholder="Stock de taille M">
        </div><br>
        <div class="input-group w-100">
            <div class="input-group-prepend">
                <span class="input-group-text">Stock de taille L</span>
            </div>
            <input class="form-control" type="number" min="0" name="produit_L" required placeholder="Stock de taille L">
        </div>
<br>

        <div class="input-group w-100">
            <div class="input-group-prepend">
                <span class="input-group-text">Prix</span>
            </div>
            <input class="form-control" type="text"  name="produit_prix" required placeholder="prix du produit">
        </div>
        <br>
        <div class="input-group mb-3 w-50">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="produit" placeholder=".jpg" id="inputGroupFile02" required>
                <label class="custom-file-label" for="inputGroupFile02" align="left">Miniature</label>
                <div class="input-group-append">
                <span class="input-group-text" id="">Importer</span>
                </div>
            </div>
        </div>
        <?php
        $i=1;
        while($i<=5){
        ?>
        <div class="input-group mb-3 w-50">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="p<?=$i?>" placeholder=".jpg" id="inputGroupFile02">
                <label class="custom-file-label" for="inputGroupFile02" align="left">File n°<?=$i?></label>
                <div class="input-group-append">
                <span class="input-group-text" id="">Importer</span>
                </div>
            </div>
            <div id="preview-file">

            </div>
        </div>
        <?php $i++;}?>
            
<br>
<br>
    <input class="btn btn-light" type="submit" value="Envoyer l'produit" />
    <a href="profil.php?id=<?= $_SESSION['id'] ?>" class="btn btn-outline-light">Annuler</a>

   </form>
    
    
  </div>
</div>
   
   <br />






   <?php
   $articles=$bdd->query('SELECT * FROM produit ORDER BY id desc');
if($articles->rowCount()>0){
?>
<div align="center">
   <table class="table table-striped w-75">
  <thead align="left">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Miniature</th>
      <th scope="col">Nom du Produit</th>
      <th scope="col">Modifier</th>
      <th scope="col">Supprimer</th>
      <th scope="col">Date et heure de modificaion</th>
    </tr>
  </thead>
  <tbody>
    <tr>
          <?php 
          
          while($a = $articles->fetch()) { ?>
            <tr>
      <th scope="row"><a href="../product.php?id=<?= $a['id'] ?> "> <?= $a['id'] ?></a></th>
      <th scope="row"><img src="../assets/produit/<?= $a['id'] ?>p.jpg" width="100px" alt="<?= $a['titre'] ?>"></th>
      <td><a href="../product.php?id=<?= $a['id'] ?> "> <?= $a['titre'] ?></a></td>
      <td><a class="btn btn-primary" href="modifproduit.php?id=<?= $a['id'] ?>">Modifier</a></td>
      <td><a class="btn btn-outline-danger" href="supprimer.php?id=<?= $a['id'] ?>">Supprimer</a></td>
      <td><?= $a['date_time_publication'] ?></td>
    </tr>
      <?php } ?>
      </tbody>
</table></div><?php } ?>










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
</body>
</html>
<?php
}?>