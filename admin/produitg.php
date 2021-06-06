<?php
session_start();
if(empty($_SESSION['id'])){
  header('Location: index.php');
}
else{
$bdd = new PDO("mysql:host=127.0.0.1;dbname=AWAM;charset=utf8", "root", "");
$produit = $bdd->query('SELECT * FROM produit ORDER BY date_time_publication DESC');
$nRows = $bdd->query('SELECT COUNT(*) FROM produit WHERE stock=0')->fetchColumn(); 
?>
<!DOCTYPE html>
<html bgcolor="rgb(248, 248, 248)">
<head>
   <title>Modifier ou Supprimer l'article</title>
   <meta charset="utf-8">
</head>

<link rel="icon" href="../assets/img/logo.png">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

   </head>
   <body>
   

<?php
include 'adminMenu.php';?>


<br>
<h1 align="center">Tous les produits</h1>
<br>
<table class="table table-hover justify-content-center">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre</th>
      <th scope="col">Stock<?php if($nRows>0){?>  <span class="badge badge-danger"><?=$nRows?></span><?php }?></th>
      <th scope="col">Date et heure de modificaion</th>
      <th scope="col">Modifier</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
    
          <?php while($a = $produit->fetch()) { 
            $time=strtotime($a['date_time_publication']);
              if($a['stock']==0){

             ?>
            <tr class="alert alert-danger"> 
            <th scope="row"><img src="../assets/img/oos.png" height="30px" alt=""></th>
        <?php }
        else{?><tr> 
            <th scope="row"><a href="../produit.php?id=<?= $a['id'] ?> "> <?= $a['id'] ?></a></th>
        <?php }
              ?>
     
      <td><a href="../produit.php?id=<?= $a['id'] ?> "> <?= $a['titre'] ?></a></td>
      <td><?= $a['stock'] ?></td>
      <td><?= date("d M à H:i",$time) ?></td>
      <td><a class="btn btn-primary" href="modifproduit.php?id=<?= $a['id'] ?>">Modifier</a></td>
      <td><a class="btn btn-outline-danger" href="supprimerproduit.php?id=<?= $a['id'] ?>">Supprimer</a></td>
      
    </tr>
      <?php } ?>
      </tbody>
    </table>
</body>
</html>
<?php
}?>