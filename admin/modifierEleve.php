<?php
session_start();
if(empty($_SESSION['id'])){
    header('Location: index.php');
  }
  else{
$bdd = new PDO('mysql:host=127.0.0.1;dbname=AWAM', 'root', '');
$getId=$_GET['id'];
$requser = $bdd->prepare("SELECT * FROM inscrits WHERE id = ?");
$requser->execute(array($getId));
$user = $requser->fetch();
$success=0;
        if(isset($_POST['update'])){
            $date=$_POST['date_naiss'];
                    function age($date) {
                    $age = date('Y') - date('Y', strtotime($date));
                    if (date('md') < date('md', strtotime($date))) {
                    return $age - 1;
                    }
                    return $age;
                    }
                    $age=age($date);
            $update=$bdd->prepare('UPDATE inscrits SET email=? ,adresse=?, phone_eleve=?, taille=?,poids=?,date_naiss=?,age_eleve=? WHERE id=? ');
            $update->execute(array($_POST['newmail'],$_POST['adresse'],$_POST['phone'],$_POST['taille'],$_POST['poids'],$date,$age,$getId));
                $success=1;
                if(isset($_FILES['avatars']) AND !empty($_FILES['avatars']['name'])) {
                    if(exif_imagetype($_FILES['avatars']['tmp_name']) == 2) {
                       $chemin = 'eleves/avatars/'.$getId.'.jpg';
                       move_uploaded_file($_FILES['avatars']['tmp_name'], $chemin);
                    } else {
                       $message = 'Votre image doit être au format jpg';
                    }
                 }
                header('location: eleve.php?id='.$getId);
                
        }

?>
<html style="scroll-behavior: smooth;">
   <head>
      <title>Éditer les informations</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="../assets/img/logo.png">
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   </head>
   <body>
   <?php
include 'adminMenu.php';
?>
<br>
<?php
if($success==1){
    echo'<div class="alert alert-success" role="alert">
    Modification Réussie!
  </div>';
}
?>
<div class="card text-white bg-dark w-50 mb-3" align="center" style="margin-left:25%">
  <div class="card-header"><i class="fas fa-users-cog"></i>Edition des information de <strong><?=ucfirst($user['nom']) ?> <?=ucfirst($user['prenom']) ?></strong></div>
  <div class="card-body">

  <form method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" name="newmail" placeholder="Mail" value="<?= $user['email']?>" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Adresse</label>
    <input type="text" class="form-control" placeholder="Nouvelle Adresse" name="adresse" value="<?= $user['adresse']?>">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Téléphone</label>
    <input type="text" class="form-control" placeholder="Nouveau Numéro" name="phone" value="<?= $user['phone_eleve']?>">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Poids</label>
    <input type="number" class="form-control" name="poids" placeholder="Poids" value="<?= $user['poids']?>">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Taille</label>
    <input type="number" class="form-control" name="taille" placeholder="Taille" value="<?= $user['taille']?>">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Date de naissance</label>
    <input type="date" class="form-control" name="date_naiss" placeholder="Nouvelle Adresse" value="<?= $user['date_naiss']?>">
  </div>
  <div class="custom-file w-50" style="color:black">
  
      <input type="file" class="custom-file-input" name="avatars" id="ChooseFile">  
      <label class="custom-file-label" for="customFile" align="left"><?php
      if(empty($_FILES['avatars'])){
      echo'Ajouter une photo';}
      else{
          echo $user['id'].'jpg';
      }
      ?></label>
</div>
<br>
<br>
  <button type="submit" name="update" class="btn btn-light">Mettre à jour</button>
  <a href="profil.php?id=<?= $_SESSION['id'] ?>" class="btn btn-outline-light">Annuler</a>

</form>

  </div>
</div>




    
        
      
   </body>
</html>
  <?php }?>