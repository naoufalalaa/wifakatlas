<?php
require_once 'connexion.php';
if(isset($_POST['sign'])){
    $nom=htmlspecialchars(ucfirst($_POST['nom']));
    $prenom=htmlspecialchars(ucfirst($_POST['prenom']));
    $email=htmlspecialchars($_POST['email']);
    $adresse=htmlspecialchars(ucfirst($_POST['adresse']));
    $phone=htmlspecialchars($_POST['phone']);
    $datenaiss=htmlspecialchars($_POST['datenaiss']);
    $taille=htmlspecialchars($_POST['taille']);
    $poids=htmlspecialchars($_POST['poids']);
    function age($datenaiss) {
        $age = date('Y') - date('Y', strtotime($datenaiss));
        if (date('md') < date('md', strtotime($datenaiss))) {
        return $age - 1;
        }
        return $age;
        }
    $age=age($datenaiss);
    # CHECK MAIL EXIST
    $mail=$bdd->prepare('SELECT * FROM inscrits WHERE email=?');
    $mail->execute(array($email));
    $exist=$mail->rowCount();
    if($exist>0){
        $errormail='<div class="col-md-12 alert alert-danger" role="alert">
                        Vous vous êtes déjà inscrit, veuillez contacter l\'association pour plus d\'information sur la procédure à prendre!
                    </div>';
        $valid=false;
    }else{
        $valid=true;
    }
    # CHECK AGE
    if($age<=6){
        $errorage='<div class="col-md-12 alert alert-danger" role="alert">
                        Vous n\'avez pas été inscrit vous êtes trop jeune !
                    </div>';
                    $valid=false;
    }else{
        $valid=true;
    }
    # INSERT PHOTO
    if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
        if(exif_imagetype($_FILES['avatar']['tmp_name']) == 2) {
           $chemin = 'assets/inscription/eleve/'.$lastid.'.jpg';
           move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
           $valid=true;
        } else {
           $delete = $bdd->prepare('DELETE FROM inscrits WHERE id=?');
           $delete->execute(array($lastid));
           $errorphoto='<div class="col-md-12 alert alert-danger" role="alert">
                            Vous n\'avez pas été inscrit car votre photo n\'est pas correcte. Veuillez entrez une photo de format .JPG
                        </div>';
                    $valid=false;

        }
     }
     # INSERT DATA
    if($valid){
        $ins=$bdd->prepare('INSERT INTO inscrits (nom, prenom, email, phone_eleve, age_eleve, poids, taille, adresse, date_naiss, date_insc) VALUES (?,?,?,?,?,?,?,?,?,NOW())');
        $ins->execute(array($nom, $prenom, $email, $phone, $age, $poids, $taille, $adresse, $datenaiss));
        $lastid=$bdd->lastInsertId();
        $message='<div class="alert alert-success" role="alert">
        Vous vous êtes inscrit! Merci de rejoindre l\'équipage
      </div>';
    }
}
?>