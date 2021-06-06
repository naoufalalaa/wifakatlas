<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=AWAM', 'root', '');

if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM administrateur WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();
   if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {
      $newpseudo = htmlspecialchars($_POST['newpseudo']);
      $insertpseudo = $bdd->prepare("UPDATE administrateur SET pseudo = ? WHERE id = ?");
      $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['email']) {
      $newmail = htmlspecialchars($_POST['newmail']);
      $insertmail = $bdd->prepare("UPDATE administrateur SET email = ? WHERE id = ?");
      $insertmail->execute(array($newmail, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdp1 = $_POST['newmdp1'];
      $mdp2 = $_POST['newmdp2'];



      if($mdp1 == $mdp2) {
         $insertmdp = $bdd->prepare("UPDATE administrateur SET password = ? WHERE id = ?");
         $insertmdp->execute(array($mdp1, $_SESSION['id']));
         header('Location: profil.php?id='.$_SESSION['id']);
      } else {
         $msg = "Vos deux mdp ne correspondent pas !";
      }
   }
   if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
    $tailleMax = 2097152;
    $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
    if($_FILES['avatar']['size'] <= $tailleMax) {
       $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
       if(in_array($extensionUpload, $extensionsValides)) {
          $chemin = "avatar/".$_SESSION['id'].".".$extensionUpload;
          $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
          if($resultat) {
             $updateavatar = $bdd->prepare('UPDATE administrateur SET avatar = :avatar WHERE id = :id');
             $updateavatar->execute(array(
                'avatar' => $_SESSION['id'].".".$extensionUpload,
                'id' => $_SESSION['id']
                ));
             header('Location: profil.php?id='.$_SESSION['id']);
          } else {
             $msg = "Erreur durant l'importation de votre photo de profil";
          }
       } else {
          $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
       }
    } else {
       $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
    }
 }
?>
<html style="scroll-behavior: smooth;">
   <head>
      <title>Éditer le profile</title>
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

<div class="card text-white bg-dark w-50 mb-3" align="center" style="margin-left:25%">
  <div class="card-header"><i class="fas fa-users-cog"></i> Edition de mon profil</div>
  <div class="card-body">
  <form method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" name="newmail" placeholder="Mail" value="<?php echo $user['email']; ?>" class="form-control">
    </div>
    <div class="form-group col-md-6">
      <label for="newpseudo">Pseudo</label>
      <input type="text" value="<?php echo $user['pseudo']; ?>" name="newpseudo" placeholder="Pseudo" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Nouveau mot de passe</label>
    <input type="password" class="form-control" placeholder="Nouveau mot de passe">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Confirmer le mot de passe</label>
    <input type="password" class="form-control" placeholder="Confirmer le mot de passe">
  </div>
  <div class="custom-file w-50">
      <input type="file" class="custom-file-input" name="avatar" id="ChooseFile">  
      <label class="custom-file-label" for="customFile" align="left">Modifiez votre Avatar</label>
</div>
<br>
<br>
  <button type="submit" class="btn btn-outline-light">Mettre à jour</button>
  <a href="profil.php?id=<?= $_SESSION['id'] ?>" class="btn btn-outline-light">Annuler</a>

</form>
<?php if(isset($msg)) { echo $msg; } ?>
  </div>
</div>




    
        
      
   </body>
</html>
<?php   
}
else {
   header("Location: index.php");
}
?>