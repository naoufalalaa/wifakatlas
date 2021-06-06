<?php
session_start();
$bdd = new PDO("mysql:host=127.0.0.1;dbname=AWAM;charset=utf8", "root", "");
if(empty($_SESSION['id'])){
  header('Location: index.php');
}
else{
    $getId=$_GET['id'];
    $produit=$bdd->prepare('SELECT * FROM produit WHERE id=?');
    $produit->execute(array($getId));
    $pppp=$produit->fetch();
if(isset($_POST['produit_titre'], $_POST['produit_prix'])) {
   if(!empty($_POST['produit_titre']) AND !empty($_POST['produit_descript']) AND !empty($_POST['produit_prix'])) {
      
      $produit_titre = htmlspecialchars(ucfirst($_POST['produit_titre']));
      $produit_descripion = htmlspecialchars(ucfirst($_POST['produit_descript']));
      $produit_prix = htmlspecialchars($_POST['produit_prix']);
      $produit_S = htmlspecialchars($_POST['produit_S']);
      $produit_M = htmlspecialchars($_POST['produit_M']);
      $produit_L = htmlspecialchars($_POST['produit_L']);
      $produit_stock = $produit_L+$produit_M+$produit_S;
      
      $ins = $bdd->prepare('UPDATE produit SET titre=?, descript=?, prix=?,stock=?,s=?,m=?,l=?, date_time_publication=NOW() WHERE id='.$getId);
      $ins->execute(array($produit_titre, $produit_descripion, $produit_prix,$produit_stock,$produit_S,$produit_M,$produit_L));
      $lastid = $bdd->lastInsertId();

      
      





      $message = '<div class="alert alert-success" role="alert\>
      <h4 class="alert-heading">produit posté!</h4>
      <p>Votre produit <strong><i>'.ucfirst($produit_titre).'</i></strong> a bien été mis en ligne par '.$_SESSION['pseudo'].'</p>
      
      </div>';
    $valid=1;



      if(isset($_FILES['produit']) AND !empty($_FILES['produit']['name'])) {
        if(exif_imagetype($_FILES['produit']['tmp_name']) == 2) {
           $chemin = 'produit/'.$lastid.'p.jpg';
           move_uploaded_file($_FILES['produit']['tmp_name'], $chemin);
        } else {
           $message = 'Votre image doit être au format jpg';
        }
     }
     $i=1;
     while($i<5){
     if(isset($_FILES['p'.$i.'']) AND !empty($_FILES['p'.$i.'']['name'])) {
        if(exif_imagetype($_FILES['p'.$i.'']['tmp_name']) == 2) {
           $chemin = 'produit/'.$lastid.'p'.$i.'.jpg';
           move_uploaded_file($_FILES['p'.$i.'']['tmp_name'], $chemin);
        } else {
           $message = 'Votre image doit être au format jpg';
        }
     }
     $i++;
    }
   }
   
   else {
      $message = '<div class="alert alert-warning alert-dismissible fade show w-50" role="alert">
      <strong>Tous les champs ne sont pas remplit</strong> Veuillez remplir tous les champs!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    $valid=0;
   }
}
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
<?php if(isset($message)) { echo $message; } ?>

<div class="card text-white bg-dark mb-3 w-50" align="center" style="margin-left:25%">

  <div class="card-header">Mise à jour du Blog</div>
   <div class="card-body">
    <h5 class="card-title">Ajouter un produit</h5>


    <form method="POST"<?php if($valid=0){ echo'class="was-validated"';} ?> enctype="multipart/form-data">
        <div class="input-group mb-3 w-50">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Titre</span>
            </div>
            <input type="text" class="form-control" name="produit_titre" placeholder="Titre" value="<?=$pppp['titre']?>" aria-describedby="basic-addon1">
        </div>
<br>
        <div class="input-group mb-3 w-75">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Description</span>
            </div>
            <input type="text" class="form-control"  name="produit_descript" placeholder="descript" value="<?=$pppp['descript']?>" aria-describedby="basic-addon1">
        </div>
<br>

        <div class="input-group w-100">
            <div class="input-group-prepend">
                <span class="input-group-text">Stock de taille S</span>
            </div>
            <input class="form-control" type="number" min="0" name="produit_S" value="<?=$pppp['s']?>" placeholder="Stock de taille S">
        </div><br>
        <div class="input-group w-100">
            <div class="input-group-prepend">
                <span class="input-group-text">Stock de taille M</span>
            </div>
            <input class="form-control" type="number" min="0" name="produit_M" value="<?=$pppp['m']?>" placeholder="Stock de taille M">
        </div><br>
        <div class="input-group w-100">
            <div class="input-group-prepend">
                <span class="input-group-text">Stock de taille L</span>
            </div>
            <input class="form-control" type="number" min="0" name="produit_L" value="<?=$pppp['l']?>" placeholder="Stock de taille L">
        </div>
<br>

        <div class="input-group w-100">
            <div class="input-group-prepend">
                <span class="input-group-text">Prix</span>
            </div>
            <input class="form-control" type="text"  name="produit_prix" value="<?=$pppp['prix']?>" placeholder="prix du produit">
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
        <img src="../assets/produit/<?=$pppp['id'] ?>p.jpg" width="200px" alt="">
<br><br>

        <?php
        $i=1;
        while($i<=5){
        ?>
        <div class="input-group mb-3 w-50">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="p<?=$i?>" placeholder=".jpg" id="inputGroupFile02">
                <label class="custom-file-label" for="inputGroupFile02" align="left"><?=$pppp['titre'] ?>p<?=$i ?></label>
                <div class="input-group-append">
                <span class="input-group-text" id="">Importer</span>
                </div>
            </div>
            <div id="preview-file">
            

            </div>
        </div>
        <?php 
        $filename='../assets/produit/'.$pppp['id'].'p'.$i.'.jpg';
        if(file_exists($filename)){
        ?>
        <img src="../assets/produit/<?=$pppp['id'] ?>p<?=$i ?>.jpg" width="200px" alt="<?=$pppp['id'] ?>p<?=$i ?>">  <br>
<br>
        <?php }?>
      
        <?php $i++;}?>
            
<br>
<br>
            
<br>
    <input class="btn btn-light" type="submit" value="Mettre à jour le produit" />
    <a href="profil.php?id=<?= $_SESSION['id'] ?>" class="btn btn-outline-light">Annuler</a>

   </form>
    
    
  </div>
</div>
   
   <br />
   <script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
</body>
</html>
<?php
}?>