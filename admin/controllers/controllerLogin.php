<?php
include_once '../../controllers/connexion.php';
if(isset($_SESSION['id'])){
    header('location: ../profil.php?id='.$_SESSION['id']);
}
else{
    if(isset($_POST['login'])){
        if(!empty($_POST['email']) AND !empty($_POST['pass'])){
            $mailconnect = htmlspecialchars($_POST['email']);
            $mdpconnect = htmlspecialchars($_POST['pass']);
            if(!empty($mailconnect) AND !empty($mdpconnect)) {
                $requser = $bdd->prepare("SELECT * FROM administrateur WHERE email = ? AND password = ?");
                $requser->execute(array($mailconnect, $mdpconnect));
                $userexist = $requser->rowCount();
                if($userexist == 1) {
                    $userinfo = $requser->fetch();
                    $_SESSION['id'] = $userinfo['id'];
                    $_SESSION['prenom'] = $userinfo['prenom'];
                    $_SESSION['site'] = 'AWAM';
                    $_SESSION['nom'] = $userinfo['nom'];
                    $_SESSION['pseudo']= $userinfo['pseudo'];
                    $_SESSION['email'] = $userinfo['email'];
                    header("Location: ../profil.php?id=".$_SESSION['id']);
                } else {
                    header("Location: index.php");
                }
            } else {
                header("Location: index.php");
            }
        }
    }
}
?>