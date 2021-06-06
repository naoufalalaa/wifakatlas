<?php
session_start();
if(empty($_SESSION['id'])){
  header('Location: index.php');
}
else{
$bdd = new PDO('mysql:host=127.0.0.1;dbname=AWAM', 'root', '');
$inscript = $bdd->query('SELECT * FROM inscrits');
if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $reqele = $bdd->prepare('SELECT * FROM inscrits WHERE id = ?');
   $reqele->execute(array($getid));
   $userinfo = $reqele->fetch();
?>
<html style="scroll-behavior: smooth; background-color: rgb(248, 248, 248);">
   <head>
      <title>Élève - <?=$userinfo['nom'] ?> <?=$userinfo['prenom'] ?></title>
      <meta charset="utf-8">
  <link rel="icon" href="../assets/img/logo.png">
      <meta name="viewport" content="width=device-width, initial-scale=1">
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
<div align="center">

<div class="card text-white bg-dark mb-3 w-75" align="center">
  <div class="card-header">Profil de <?=ucfirst($userinfo['prenom'])?> <?=ucfirst($userinfo['nom'])?></div>
  <div class="card-body">
  <img src="eleves/avatars/<?= $userinfo['id'] ?>.jpg" class="rounded-circle" width="150px">
<br>
<br>
    <h5 class="card-title">Élève : <strong> <?=ucfirst($userinfo['prenom'])?> <?=ucfirst($userinfo['nom'])?></strong></h5>
    <div align="left">
    <table class="table table-hover table-dark" >
    <tr><td scope="row" class="card-text">E-mail: </td><td><u><?=$userinfo['email']?></u></td></tr>
    <tr><td scope="row" class="card-text">Télephone: </td><td><u><?=$userinfo['phone_eleve']?></u></td></tr>
    <tr><td scope="row" class="card-text">Age: </td><td><u><?=$userinfo['age_eleve']?></u></td></tr>
    <tr><td scope="row" class="card-text">Adresse: </td><td><u><?=$userinfo['adresse']?></u></td></tr>
    <tr><td scope="row" class="card-text">Poids: </td><td><u><?=$userinfo['poids']?></u></td></tr>
    <tr><td scope="row" class="card-text">Taille: </td><td><u><?=$userinfo['taille']?></u></td></tr>
    <tr><td scope="row" class="card-text">Date de naissance: </td><td><u><?=$userinfo['date_naiss']?></u></td></tr>
    <tr><td scope="row" class="card-text">Date d'inscription: </td><td><?=$userinfo['date_insc']?></td></tr>
    </table>
    </div>
    <div align="right">
    <?php
    if($userinfo['verify']==0){
        echo'<a href="verify.php?id='.$userinfo['id'].'" class="btn btn-success">Verifier </a>
        <a href="modifierEleve.php?id='.$userinfo['id'].'" class="btn btn-primary">
        Modifier Élève
       </a>
       <a href="index.php" class="btn btn-primary">
            Retourner
         </a>';
    }
    else{
   ?>
    <a href="index.php" class="btn btn-primary">
            Retourner
         </a>
         <a href="modifierEleve.php?id=<?=$userinfo['id'] ?>" class="btn btn-primary">
          Modifier Élève
         </a>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#supprimer">
          Supprimer Élève
         </button>
</div>
          <!-- Modal -->
          <div class="modal fade" id="supprimer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="supprimer" style="color: grey">Suppression</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" style="color:black">
                  Voulez-vous vraiment supprimer cet élève de votre table?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <a href="supprimerEleve.php?id=<?=$userinfo['id']?>" class="btn btn-outline-danger">Supprimer</a>
                </div>
              </div>
            </div>
          </div>  
    <!-- Button trigger modal --><?php }?>
    </div>
</div>

</body>
</html>
<?php   
}}
?>