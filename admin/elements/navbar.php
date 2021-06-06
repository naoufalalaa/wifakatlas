<?php
$profil=$bdd->query('SELECT * FROM administrateur WHERE id='.$_SESSION['id']);
$p=$profil->fetch();
$eleve=$bdd->query('SELECT * FROM inscrits WHERE verify=0');
$nbrM=$eleve->rowCount();
$nRows=$eleve->rowCount();
$commande=$bdd->query('SELECT * FROM commande WHERE validate=0');
$nbrC=$commande->rowCount();
$nRowsC=$commande->rowCount();
?>


<nav style="z-index:999" class=" uk-navbar-transparent uk-navbar uk-navbar-container ">
    <div class="uk-navbar-center">
        <img src="../assets/img/logocenter.png" style="max-height:100px; margin-top:20px; padding:10px" alt="">
    </div>
    <div class="uk-navbar-left">
        <a class="uk-navbar-toggle" uk-toggle="target: #offcanvas-nav" href="#">
            <span uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Menu</span>
        </a>
    </div>
    <div id="offcanvas-nav" uk-offcanvas="overlay: true;mode:push">
    <div class="uk-offcanvas-bar">
        <div align="center">
        <img src="../assets/img/logo.png"  width="150px" alt="">
        </div>
        <ul class="uk-nav uk-nav-default">
            <li><a href="../index"><i class="fas fa-th-large"></i>&nbsp;&nbsp;Acceuil</a></li>
            <li class="uk-parent">
                <a href="../#"><i class="fas fa-bookmark"></i>&nbsp;&nbsp;Informations&nbsp;&nbsp;<i class="fas fa-angle-down"></i></a>
                <ul class="uk-nav-sub">
                        <li><a href="../index#reglement">Règlement interne</a></li>
                        <li><a href="../index#activity">Activités</a></li>
                        <li><a href="../index#membre">Membres</a></li>
                        <li><a href="../index#partenaire">Partenaires</a></li>
                </ul>
            </li>
            <li><a href="../index#Ecole"><i class="fas fa-graduation-cap"></i>&nbsp;&nbsp;École</a></li>
            <li><a href="../Blog"><i class="fas fa-newspaper"></i>&nbsp;&nbsp;Blog</a></li>
            <li><a href="../Store"><i class="fas fa-store"></i>&nbsp;&nbsp;Store</a></li>
            
        <?php 
        if(isset($_SESSION['id'])){
        ?>            <li class="uk-nav-divider"></li>

   
            <li>
                <a href="#"><i class="fas fa-user-circle"></i>&nbsp;&nbsp;<?= $p['pseudo'] ?>&nbsp;&nbsp;<i class="fas fa-angle-down"></i></a>
                    <ul class="uk-nav-sub">
                        <li><a href="../admin/"><i class="fas fa-cogs"></i>&nbsp;&nbsp;Mon profil</a></li>
                        <li><a href="../admin/"><i class="fas fa-bell"></i>Notifications&nbsp;&nbsp;<span class="badge badge-pill badge-danger"><?php echo $nbrC+$nbrM;?></span></a></li>
                        <li><a href="../admin/deconnexion.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Se déconnecter</a></li>
                    </ul>
            </li>
    <?php }?>
    </ul>
        
    </div>
    </div>
</nav>
