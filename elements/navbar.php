<?php
require_once 'controllers/connexion.php';
if(isset($_SESSION['id'])){
$profil=$bdd->query('SELECT * FROM administrateur WHERE id='.$_SESSION['id']);
$p=$profil->fetch();
$eleve=$bdd->query('SELECT * FROM inscrits WHERE verify=0');
$nbrM=$eleve->rowCount();
$commande=$bdd->query('SELECT * FROM commande WHERE validate=0');
$nbrC=$commande->rowCount();}
?>
<nav style="z-index:999;min-height:100px;"class="uk-navbar-container uk-navbar-transparent uk-visible@l position-sticky" uk-navbar="mode:click">

    <div class="uk-navbar-left" >

        <ul class="uk-navbar-nav">
            <li><a href="index"><svg class="bi bi-grid-fill" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M1 2.5A1.5 1.5 0 012.5 1h3A1.5 1.5 0 017 2.5v3A1.5 1.5 0 015.5 7h-3A1.5 1.5 0 011 5.5v-3zm8 0A1.5 1.5 0 0110.5 1h3A1.5 1.5 0 0115 2.5v3A1.5 1.5 0 0113.5 7h-3A1.5 1.5 0 019 5.5v-3zm-8 8A1.5 1.5 0 012.5 9h3A1.5 1.5 0 017 10.5v3A1.5 1.5 0 015.5 15h-3A1.5 1.5 0 011 13.5v-3zm8 0A1.5 1.5 0 0110.5 9h3a1.5 1.5 0 011.5 1.5v3a1.5 1.5 0 01-1.5 1.5h-3A1.5 1.5 0 019 13.5v-3z" clip-rule="evenodd"/>
</svg>&nbsp;&nbsp;Acceuil</a></li>
            <li>
                <a href="#"><svg class="bi bi-puzzle-fill" width="1.4em" height="1.4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M3.112 3.645A1.5 1.5 0 014.605 2H7a.5.5 0 01.5.5v.382c0 .696-.497 1.182-.872 1.469a.459.459 0 00-.115.118.113.113 0 00-.012.025L6.5 4.5v.003l.003.01c.004.01.014.028.036.053a.86.86 0 00.27.194C7.09 4.9 7.51 5 8 5c.492 0 .912-.1 1.19-.24a.86.86 0 00.271-.194.213.213 0 00.036-.054l.003-.01v-.008a.112.112 0 00-.012-.025.459.459 0 00-.115-.118c-.375-.287-.872-.773-.872-1.469V2.5A.5.5 0 019 2h2.395a1.5 1.5 0 011.493 1.645L12.645 6.5h.237c.195 0 .42-.147.675-.48.21-.274.528-.52.943-.52.568 0 .947.447 1.154.862C15.877 6.807 16 7.387 16 8s-.123 1.193-.346 1.638c-.207.415-.586.862-1.154.862-.415 0-.733-.246-.943-.52-.255-.333-.48-.48-.675-.48h-.237l.243 2.855A1.5 1.5 0 0111.395 14H9a.5.5 0 01-.5-.5v-.382c0-.696.497-1.182.872-1.469a.459.459 0 00.115-.118.113.113 0 00.012-.025L9.5 11.5v-.003l-.003-.01a.214.214 0 00-.036-.053.859.859 0 00-.27-.194C8.91 11.1 8.49 11 8 11c-.491 0-.912.1-1.19.24a.859.859 0 00-.271.194.214.214 0 00-.036.054l-.003.01v.002l.001.006a.113.113 0 00.012.025c.016.027.05.068.115.118.375.287.872.773.872 1.469v.382a.5.5 0 01-.5.5H4.605a1.5 1.5 0 01-1.493-1.645L3.356 9.5h-.238c-.195 0-.42.147-.675.48-.21.274-.528.52-.943.52-.568 0-.947-.447-1.154-.862C.123 9.193 0 8.613 0 8s.123-1.193.346-1.638C.553 5.947.932 5.5 1.5 5.5c.415 0 .733.246.943.52.255.333.48.48.675.48h.238l-.244-2.855z" clip-rule="evenodd"/>
</svg>&nbsp;&nbsp;Informations&nbsp;&nbsp;<i class="fas fa-angle-down"></i></a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                    <li><a href="index.php#Ecole"><i class="fas fa-graduation-cap"></i>&nbsp;&nbsp;École</a></li>
                        <li><a href="index.php#reglement"><i class="fas fa-gavel"></i>&nbsp;&nbsp;Règlement interne</a></li>
                        <li><a href="index.php#activite"><i class="fas fa-bolt"></i>&nbsp;&nbsp;Activités</a></li>
                        <li><a href="index.php#membre"><i class="fas fa-users"></i>&nbsp;&nbsp;Membres</a></li>
                        <li><a href="index.php#partenaire"><i class="fas fa-money-check-alt"></i>&nbsp;&nbsp;Partenaires</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="Blog.php"><svg class="bi bi-newspaper" width="1.4em" height="1.4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 2A1.5 1.5 0 011.5.5h11A1.5 1.5 0 0114 2v12a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 010 14V2zm1.5-.5A.5.5 0 001 2v12a.5.5 0 00.5.5h11a.5.5 0 00.5-.5V2a.5.5 0 00-.5-.5h-11z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M15.5 3a.5.5 0 01.5.5V14a1.5 1.5 0 01-1.5 1.5h-3v-1h3a.5.5 0 00.5-.5V3.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
  <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
</svg>&nbsp;&nbsp;Blog</a></li>
            <li><a href="Store.php"><i class="fas fa-store"></i>&nbsp;&nbsp;Store</a></li>
            <li><a href="Inscription.php"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Inscription</a></li>
        </ul>

    </div>
    <?php if(empty($_SESSION['id'])){?><div class="uk-navbar-right">
        <img src="assets/img/logocenter.png" style="width:250px;padding:10px" alt="">
    </div><?php }?>
    
    <?php 
    if(isset($_SESSION['id'])){
    ?>
    <div class="uk-navbar-center">
        <img src="assets/img/logocenter.png" style="width:180px;padding:10px" alt="">
    </div>
    <div class="uk-navbar-right">

        <ul class="uk-navbar-nav">
            <li>
                <a href="#"><i class="fas fa-user-circle"></i>&nbsp;&nbsp;<?= $p['pseudo'] ?>&nbsp;&nbsp;<i class="fas fa-angle-down"></i></a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li><a href="admin/"><svg class="bi bi-gear-wide-connected" width="1.3em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M9.928 1.723c-.243-.97-1.62-.97-1.863 0l-.072.286a.96.96 0 01-1.622.435l-.204-.212c-.695-.718-1.889-.03-1.614.932l.08.283a.96.96 0 01-1.186 1.187l-.283-.081c-.961-.275-1.65.919-.932 1.614l.212.204a.96.96 0 01-.435 1.622l-.286.072c-.97.242-.97 1.62 0 1.863l.286.071a.96.96 0 01.435 1.622l-.212.205c-.718.695-.03 1.888.932 1.613l.283-.08a.96.96 0 011.187 1.187l-.081.283c-.275.96.919 1.65 1.614.931l.204-.211a.96.96 0 011.622.434l.072.286c.242.97 1.62.97 1.863 0l.071-.286a.96.96 0 011.622-.434l.205.212c.695.718 1.888.029 1.613-.932l-.08-.283a.96.96 0 011.187-1.188l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205A.96.96 0 0115.983 10l.286-.071c.97-.243.97-1.62 0-1.863l-.286-.072a.96.96 0 01-.434-1.622l.212-.204c.718-.695.029-1.889-.932-1.614l-.283.08a.96.96 0 01-1.188-1.186l.081-.283c.275-.961-.918-1.65-1.613-.932l-.205.212A.96.96 0 0110 2.009l-.071-.286zm-.932 12.27a4.998 4.998 0 100-9.994 4.998 4.998 0 000 9.995z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M8.372 8.996L5.598 5.298l.8-.6 2.848 3.798h4.748v1H9.246l-2.849 3.798-.8-.6 2.775-3.698z" clip-rule="evenodd"/>
</svg>&nbsp;&nbsp;Mon profil</a></li>
                        <li><a href="admin/"><svg class="bi bi-bell-fill" width="1.3em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M8 16a2 2 0 002-2H6a2 2 0 002 2zm.995-14.901a1 1 0 10-1.99 0A5.002 5.002 0 003 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
</svg>&nbsp;&nbsp;Notifications&nbsp;&nbsp;<span class="badge badge-pill badge-danger"><?php echo $nbrC+$nbrM;?></span></a></li>
                        <li><a href="admin/deconnexion.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Se déconnecter</a></li>
                    </ul>
                </div>
            </li>
        </ul>

    </div>
    <?php }?>
</nav>
<nav style="z-index:999" class=" uk-navbar-transparent uk-navbar uk-navbar-container uk-hidden@l">
    <div class="uk-navbar-center">
        <img src="assets/img/logocenter.png" style="max-height:70px" alt="">
    </div>
    <div class="uk-navbar-left">
        <a class="uk-navbar-toggle" uk-toggle="target: #offcanvas-nav" href="#">
            <span uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Menu</span>
        </a>
    </div>
    <div id="offcanvas-nav" uk-offcanvas="overlay: true;mode:push">
    <div class="uk-offcanvas-bar">
        <div align="center">
        <img src="assets/img/logo.png" width="150px" alt="">
        </div>
        <ul class="uk-nav uk-nav-default">
            <li><a href="index"><i class="fas fa-th-large"></i>&nbsp;&nbsp;Acceuil</a></li>
            <li class="uk-parent">
                <a href="#"><svg class="bi bi-puzzle-fill" width="1.4em" height="1.4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M3.112 3.645A1.5 1.5 0 014.605 2H7a.5.5 0 01.5.5v.382c0 .696-.497 1.182-.872 1.469a.459.459 0 00-.115.118.113.113 0 00-.012.025L6.5 4.5v.003l.003.01c.004.01.014.028.036.053a.86.86 0 00.27.194C7.09 4.9 7.51 5 8 5c.492 0 .912-.1 1.19-.24a.86.86 0 00.271-.194.213.213 0 00.036-.054l.003-.01v-.008a.112.112 0 00-.012-.025.459.459 0 00-.115-.118c-.375-.287-.872-.773-.872-1.469V2.5A.5.5 0 019 2h2.395a1.5 1.5 0 011.493 1.645L12.645 6.5h.237c.195 0 .42-.147.675-.48.21-.274.528-.52.943-.52.568 0 .947.447 1.154.862C15.877 6.807 16 7.387 16 8s-.123 1.193-.346 1.638c-.207.415-.586.862-1.154.862-.415 0-.733-.246-.943-.52-.255-.333-.48-.48-.675-.48h-.237l.243 2.855A1.5 1.5 0 0111.395 14H9a.5.5 0 01-.5-.5v-.382c0-.696.497-1.182.872-1.469a.459.459 0 00.115-.118.113.113 0 00.012-.025L9.5 11.5v-.003l-.003-.01a.214.214 0 00-.036-.053.859.859 0 00-.27-.194C8.91 11.1 8.49 11 8 11c-.491 0-.912.1-1.19.24a.859.859 0 00-.271.194.214.214 0 00-.036.054l-.003.01v.002l.001.006a.113.113 0 00.012.025c.016.027.05.068.115.118.375.287.872.773.872 1.469v.382a.5.5 0 01-.5.5H4.605a1.5 1.5 0 01-1.493-1.645L3.356 9.5h-.238c-.195 0-.42.147-.675.48-.21.274-.528.52-.943.52-.568 0-.947-.447-1.154-.862C.123 9.193 0 8.613 0 8s.123-1.193.346-1.638C.553 5.947.932 5.5 1.5 5.5c.415 0 .733.246.943.52.255.333.48.48.675.48h.238l-.244-2.855z" clip-rule="evenodd"/>
</svg>&nbsp;&nbsp;Informations&nbsp;&nbsp;<i class="fas fa-angle-down"></i></a>
                <ul class="uk-nav-sub">
                        <li><a href="index.php#reglement">Règlement interne</a></li>
                        <li><a href="index.php#activite">Activités</a></li>
                        <li><a href="index.php#membre">Membres</a></li>
                        <li><a href="index.php#partenaire">Partenaires</a></li>
                </ul>
            </li>
            <li><a href="index.php#Ecole"><i class="fas fa-graduation-cap"></i>&nbsp;&nbsp;École</a></li>
            <li><a href="Blog.php"><svg class="bi bi-newspaper" width="1.4em" height="1.4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 2A1.5 1.5 0 011.5.5h11A1.5 1.5 0 0114 2v12a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 010 14V2zm1.5-.5A.5.5 0 001 2v12a.5.5 0 00.5.5h11a.5.5 0 00.5-.5V2a.5.5 0 00-.5-.5h-11z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M15.5 3a.5.5 0 01.5.5V14a1.5 1.5 0 01-1.5 1.5h-3v-1h3a.5.5 0 00.5-.5V3.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
  <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
</svg>&nbsp;&nbsp;Blog</a></li>
            <li><a href="Store.php"><i class="fas fa-store"></i>&nbsp;&nbsp;Store</a></li>
            <li><a href="Inscription.php"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Inscription</a></li>
            
        <?php 
        if(isset($_SESSION['id'])){
        ?>            <li class="uk-nav-divider"></li>

   
            <li>
                <a href="#"><i class="fas fa-user-circle"></i>&nbsp;&nbsp;<?= $p['pseudo'] ?>&nbsp;&nbsp;<i class="fas fa-angle-down"></i></a>
                    <ul class="uk-nav-sub">
                        <li><a href="admin/"><i class="fas fa-cogs"></i>&nbsp;&nbsp;Mon profil</a></li>
                        <li><a href="admin/"><i class="fas fa-bell"></i>Notifications&nbsp;&nbsp;<span class="badge badge-pill badge-danger"><?php echo $nbrC+$nbrM;?></span></a></li>
                        <li><a href="admin/deconnexion.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Se déconnecter</a></li>
                    </ul>
            </li>
    <?php }?>
    </ul>
        
    </div>
    </div>
</nav>
