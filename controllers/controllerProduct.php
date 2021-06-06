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
    $produit = $bdd->prepare('SELECT * FROM produit WHERE id = ?');
    $produit->execute(array($get_id));
    if($produit->rowCount() == 1) {
       $produit = $produit->fetch();
       $titre = $produit['titre'];
       $descript = $produit['descript'];
       $prix = $produit['prix'];
       $time=strtotime($produit['date_time_publication']);
       $stock=$produit['stock'];
       $stock_s=$produit['s'];
       $stock_m=$produit['m'];
       $stock_l=$produit['l'];
 
      
    } else {
       die();
    }
 } else {
    die();
 }
# FETCHING DATA #


# COMMANDE #
if(isset($_POST['valider'])){
    $nom=htmlspecialchars($_POST['nom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $email=htmlspecialchars($_POST['email']);
    $phone=htmlspecialchars($_POST['phone']);
    $ville=htmlspecialchars($_POST['ville']);
    $adress=htmlspecialchars($_POST['adresse']);
    $adresse=$adress." ".$ville;
    $code=htmlspecialchars($_POST['code_postal']);
    $qS=htmlspecialchars($_POST['qs']);
    $qM=htmlspecialchars($_POST['qm']);
    $qL=htmlspecialchars($_POST['ql']);
    $quantity=$qL+$qM+$qS;
    $montant=$prix*$quantity;
    if(!empty($nom) AND !empty($prenom) AND !empty($email) AND !empty($phone) AND !empty($ville) AND !empty($adresse)){
        $commande=$bdd->prepare('INSERT INTO commande(nom,prenom,email,phone,adresse,codeP,qS,qM,qL,montant,id_prod,quantity,date_commande) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,NOw())');
        $commande->execute(array($nom,$prenom,$email,$phone,$adresse,$code,$qS,$qM,$qL,$montant,$get_id,$quantity));
        $message='<div class="alert alert-success" role="alert">
        <h4 class="alert-heading">C\'est commandé!</h4>
        <p>Merci d\'avoir commander ce produit <strong>'.ucfirst($titre).'</strong>, un e-mail vous sera envoyer lors de la validation de la commande.</p>
        <hr>
        <p class="mb-0">Surveillez votre boîte en cas de changement contactez nous via Téléphone.</p>
      </div>';
      $empty=0;
    }
    else{
        $empty=1;
    if(empty($nom)){
        $error0=1;
    }
    if(empty($prenom)){
        
        $error1=1;
       
    }
    if(empty($email)){
        $error2=1;
    }
    if(empty($phone)){
        $error3=1;   
    }
    if(empty($adress)){
        $error4=1;
    }
    if(empty($ville)){
        $error5=1;
    }
    $message='<div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">OOOPS!</h4>
        <p>Votre formulaire de commande du produit <strong>'.ucfirst($titre).'</strong>, ne s\'est pas passée correctement réessayez .</p>
        <hr>
        <p class="mb-0">Cliquez sur le bouton rouge.</p>
      </div>';
}
}
else{
    $error=1;
}
# COMMANDE #
?>