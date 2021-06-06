<?php
require_once 'controllers/connexion.php';
include 'controllers/controllerHome.php';
$page='Home';
$slider=true;
include 'elements/head.php';
include 'elements/navbar.php';
?>

<div class="jumbotron bg-transparent" align="center">
  <h1 class="display-4" data-aos="fade-down" data-aos-duration="2000">Bienvenue!</h1>
  <p class="lead" data-aos="fade-up" data-aos-duration="2000">Ceci est le site officiel de l'association Wifak Atlas Marrakech.</p>
  <hr class="my-4" >
  <p data-aos="fade-up" data-aos-duration="3000">Vous trouverez ici tous ce qui vous aidera à découvrir et même vous inscrire.</p>

  <div class="card-group uk-width-5-6@m mt-5" uk-parallax="y:-500" style="opacity:0.9">
  <div data-aos="fade-right" data-aos-duration="3000" class="card card1 text-white bg-warning" style="border-radius: 5;margin-top: 50px; height: 400px;">
        <div class="card-body">
          <h3 class="card-title text-white" align="center">L'École</h3>
          <hr class="my-4"><p class="uk-padding">
          <svg class="bi bi-building" width="4em" height="4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M15.285.089A.5.5 0 0115.5.5v15a.5.5 0 01-.5.5h-3a.5.5 0 01-.5-.5V14h-1v1.5a.5.5 0 01-.5.5H1a.5.5 0 01-.5-.5v-6a.5.5 0 01.418-.493l5.582-.93V3.5a.5.5 0 01.324-.468l8-3a.5.5 0 01.46.057zM7.5 3.846V8.5a.5.5 0 01-.418.493l-5.582.93V15h8v-1.5a.5.5 0 01.5-.5h2a.5.5 0 01.5.5V15h2V1.222l-7 2.624z" clip-rule="evenodd"/>
            <path fill-rule="evenodd" d="M6.5 15.5v-7h1v7h-1z" clip-rule="evenodd"/>
            <path d="M2.5 11h1v1h-1v-1zm2 0h1v1h-1v-1zm-2 2h1v1h-1v-1zm2 0h1v1h-1v-1zm6-10h1v1h-1V3zm2 0h1v1h-1V3zm-4 2h1v1h-1V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm-2 2h1v1h-1V7zm2 0h1v1h-1V7zm-4 0h1v1h-1V7zm0 2h1v1h-1V9zm2 0h1v1h-1V9zm2 0h1v1h-1V9zm-4 2h1v1h-1v-1zm2 0h1v1h-1v-1zm2 0h1v1h-1v-1z"/>
          </svg></p>
          <p class="card-text" align="center">Inscrivez-vous et Rejoiniez l'effectif.</p>
          <a href="Inscription.php" class="btn btn-outline-light">Rejoindre l'équipe</a>
        </div>
      </div>
    
      <div data-aos="fade-up" data-aos-duration="2000" class="card card1 text-white bg-danger" style="border-radius: 0; height: 500px;">
        <div class="card-body">
            <h3 class="card-title text-white" align="center">Notre Blog</h3>
            <hr class="my-4"><p class="uk-padding">
            <svg class="bi bi-collection-play-fill" width="6em" height="6em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M1.5 14.5A1.5 1.5 0 010 13V6a1.5 1.5 0 011.5-1.5h13A1.5 1.5 0 0116 6v7a1.5 1.5 0 01-1.5 1.5h-13zm5.265-7.924A.5.5 0 006 7v5a.5.5 0 00.765.424l4-2.5a.5.5 0 000-.848l-4-2.5zM2 3a.5.5 0 00.5.5h11a.5.5 0 000-1h-11A.5.5 0 002 3zm2-2a.5.5 0 00.5.5h7a.5.5 0 000-1h-7A.5.5 0 004 1z" clip-rule="evenodd"/>
            </svg></p>
            <p class="card-text" align="center">Découvrez notre nouveauté et annonce à travers ce blog.</p>
            <a href="Blog.php" class="btn btn-outline-light">Découvrir</a>
        </div>
      </div>
   
      <div data-aos="fade-top" data-aos-duration="3000" class="card card1 text-white bg-info" style="border-radius: 5; height: 400px;" >
        <div class="card-body">
          <h3 class="card-title text-white" align="center">Nos Activités</h3>
          <hr class="my-4"><p class="uk-padding">
          <svg class="bi bi-controller" width="4em" height="4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M11.119 2.693c.904.19 1.75.495 2.235.98.407.408.779 1.05 1.094 1.772.32.733.599 1.591.805 2.466.206.875.34 1.78.364 2.606.024.815-.059 1.602-.328 2.21a1.42 1.42 0 01-1.445.83c-.636-.067-1.115-.394-1.513-.773a11.307 11.307 0 01-.739-.809c-.126-.147-.25-.291-.368-.422-.728-.804-1.597-1.527-3.224-1.527-1.627 0-2.496.723-3.224 1.527-.119.131-.242.275-.368.422-.243.283-.494.576-.739.81-.398.378-.877.705-1.513.772a1.42 1.42 0 01-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772.486-.485 1.331-.79 2.235-.98.932-.196 2.03-.292 3.119-.292 1.089 0 2.187.096 3.119.292zm-6.032.979c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a13.748 13.748 0 00-.748 2.295 12.351 12.351 0 00-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 00.426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.505C4.861 9.97 5.978 9.026 8 9.026s3.139.943 3.965 1.855c.164.182.307.35.44.505.214.25.403.472.615.674.318.303.601.468.929.503a.42.42 0 00.426-.241c.18-.408.265-1.02.243-1.776a12.354 12.354 0 00-.339-2.406 13.753 13.753 0 00-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27-1.036 0-2.063.091-2.913.27z" clip-rule="evenodd"/>
            <path d="M11.5 6.026a.5.5 0 11-1 0 .5.5 0 011 0zm-1 1a.5.5 0 11-1 0 .5.5 0 011 0zm2 0a.5.5 0 11-1 0 .5.5 0 011 0zm-1 1a.5.5 0 11-1 0 .5.5 0 011 0zm-7-2.5h1v3h-1v-3z"/>
            <path d="M3.5 6.526h3v1h-3v-1zM3.051 3.26a.5.5 0 01.354-.613l1.932-.518a.5.5 0 01.258.966l-1.932.518a.5.5 0 01-.612-.354zm9.976 0a.5.5 0 00-.353-.613l-1.932-.518a.5.5 0 10-.259.966l1.932.518a.5.5 0 00.612-.354z"/>
        </svg></p>
          <p class="card-text" align="center">Découvrir les Activités que propose l'Association.</p>
          <a href="#activite" class="btn btn-outline-light">Découvrir</a>
        </div>
      </div>
      </div>
</div>
<div align="center">
<div style="z-index:0;"  uk-parallax="y:-500" class="uk-position-relative uk-width-2-3@l uk-visible-toggle uk-box-shadow-bottom shadow-lg uk-light" tabindex="-1" uk-slideshow="animation: scale;autoplay:true;ratio:16:9">

        <ul class="uk-slideshow-items">
            <?php 
            if($nbrarticles==0){?>
            <li>
                <img src="assets/img/SOCCER.jpg" alt="" uk-cover>
                <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom">
                    <h3 class="uk-margin-remove">Bottom</h3>
                    <p class="uk-margin-remove">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </li>
            <?php
            }else{
                $i=1;
                while($a=$articles->fetch()){
                    if($i <= 5){
                        $time=strtotime($a['date_time_publication']);
            ?>
            <li>
                <img src="assets/articles/<?=$a['id'] ?>a.jpg" alt="" uk-cover>
                <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom">
                    <h3 class="uk-margin-remove"><a href="article.php?id=<?=$a['id'] ?>"><?=ucfirst($a['titre']) ?></a></h3>
                    <p class="uk-margin-remove"><?=ucfirst($a['descript']) ?>.</p>
                    <div class="uk-margin-remove d-flex justify-content-between"><p><i class="fas fa-clock"></i> <?=date("d M à H:i", $time) ?></p><p></p><p><i class="fas fa-eye"></i> <?=$a['views'] ?></p></div>
                </div>
            </li>
            <?php $i++;}else{ break;} }  }?>
        </ul>

        <a class="uk-position-center-left uk-position-small uk-hidden-hover" style="color:black" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" style="color:black" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
</div>
</div>
<div class="uk-grid-collapse uk-child-width-expand@s uk-text-center uk-grid-match uk-padding uk-margin-medium-top uk-margin-medium-bottom" uk-grid="parallax:50">
   <div uk-parallax="y:-300">
   
        <div class="uk-card uk-padding" style="">
            <div class="uk-card-media-top">
                <img src="assets/img/goals.png" width="150px" alt="">
            </div>
            <div class="uk-card-body">
                <h3 class="uk-card-title">Notre But Majeur</h3>
                <p>Construire un espri de groupe chez des jeunes passionnés par le jeu et faire en sorte qu'ils découvrent le monde du ballon rond dès un jeune âge.</p>
            </div>
        </div>
    </div>
    <div uk-parallax="y:-500">
        <div class="uk-card uk-padding" style="background: rgb(243,244,245);
background: linear-gradient(180deg, rgba(243,244,245,1) 0%, rgba(243,244,245,1) 37%, rgba(243,244,245,0) 100%);">
            <div class="uk-card-media-top">
                <img src="assets/img/reglement.png" width="150px" alt="">
            </div>
            <div class="uk-card-body">
                <h3 class="uk-card-title">Règlements et Politique</h3>
                <p>Le <strong>fairplay</strong> et le beau jeu sont notre devis, nous visons à planter une le sens de l'entraide et de prise de décision dans la génération futur.</p>
                <a href="assets/files/Reglement.pdf" download><svg class="bi bi-cloud-download" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.887 5.2l-.964-.165A2.5 2.5 0 103.5 10H6v1H3.5a3.5 3.5 0 11.59-6.95 5.002 5.002 0 119.804 1.98A2.501 2.501 0 0113.5 11H10v-1h3.5a1.5 1.5 0 00.237-2.981L12.7 6.854l.216-1.028a4 4 0 10-7.843-1.587l-.185.96z"/>
                    <path fill-rule="evenodd" d="M5 12.5a.5.5 0 01.707 0L8 14.793l2.293-2.293a.5.5 0 11.707.707l-2.646 2.646a.5.5 0 01-.708 0L5 13.207a.5.5 0 010-.707z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M8 6a.5.5 0 01.5.5v8a.5.5 0 01-1 0v-8A.5.5 0 018 6z" clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="uk-height-large uk-background-cover uk-light uk-flex shadow-lg" uk-parallax="bgy: -460" style="background-image: url('assets/img/pitch.jpg');">

    <h1 class="uk-width-1-2@m uk-text-center uk-margin-auto uk-margin-auto-vertical">Le Terrain est le NÔTRE</h1>

</div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="0.5" d="M0,224L120,197.3C240,171,480,117,720,117.3C960,117,1200,171,1320,197.3L1440,224L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
    <h1 align="center" class="uk-padding uk-margin-remove" style="background:rgba(243, 244, 245,0.5);">Notre Boutique<hr class="uk-divider-icon"></h1>


<div class="uk-grid-match uk-grid-column-large uk-grid-row-large uk-child-width-1-3@m uk-padding-large" style="background-color:rgba(243, 244, 245,0.5)" uk-grid="parallax:50">

    <?php 
    if($nbrproduit==0){?>
    <div class="uk-width-1-4@m">
    <div class="uk-text-center">
        <div class="uk-inline-clip uk-transition-toggle" tabindex="0">
            <img src="assets/img/player.png" alt="">
            <div style="border-radius:10px; background:#ec5c4870" class="uk-transition-fade uk-position-cover uk-position-small uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle">
                <p class="uk-h4 uk-margin-remove text-white">Pas de produit pour le moment</p>
            </div>
        </div>
    </div>
    </div>
    <?php }else{ 
        while($p=$produit->fetch()){
    ?>
    <div>
        <div class="uk-card uk-card-default">
            <div class="uk-card-media-top">
            <div uk-slideshow="autoplay:true">
                <ul class="uk-slideshow-items">
                    <?php
                    $filename='assets/produit/'.$p['id'].'p.jpg';
                    if(file_exists($filename)){?>
                    <li>
                        <img src="assets/produit/<?=$p['id']?>p.jpg" alt="">
                    </li>
                    <?php }$i=1;
                    while($i<=5){
                        $filename='assets/produit/'.$p['id'].'p'.$i.'.jpg';
                        if(file_exists($filename)){
                    ?>
                    <li>
                        <img src="assets/produit/<?=$p['id']?>p<?=$i?>.jpg" alt="">
                    </li>
                        <?php } $i++;} ?>
                </ul>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

            </div>
                
            </div>
            <div class="uk-card-body">
                <h3 class="uk-card-title"><a href="product.php?id=<?=$p['id'] ?>"><?=$p['titre'] ?></a></h3>
                <p><i class="fas fa-info"></i> <?=$p['descript'] ?>.</p>
                <p><i class="fas fa-expand-arrows-alt"></i> Tailles: <?php if($p['s']>0){echo '|S|';}?> <?php if($p['m']>0){echo '|M|';}?> <?php if($p['l']>0){echo '|L|';} ?></p>
            </div>
            <div class="uk-card-footer">
                <a href="#" class="uk-button uk-button-text"><i class="fas fa-money-bill"></i> <?=$p['prix'] ?> dh</a>
            </div>
        </div>
    </div>
    
    <?php $i++; }?>
    <?php }?>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="0.5" d="M0,224L120,197.3C240,171,480,117,720,117.3C960,117,1200,171,1320,197.3L1440,224L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"></path></svg>

<?php
$partenaire=$bdd->query('SELECT * FROM partenaire');
$nbrP=$partenaire->rowCount();
if($nbrP>0){?>
<svg class="uk-margin-remove-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="1" d="M0,224L120,197.3C240,171,480,117,720,117.3C960,117,1200,171,1320,197.3L1440,224L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>

<div style="background: rgb(243,244,245);
background: linear-gradient(180deg, rgba(243,244,245,1) 0%, rgba(243,244,245,1) 37%, rgba(243,244,245,0) 100%);" id="partenaire" align="center" class="uk-padding uk-margin-bottom">

<h1 align="center" class="uk-margin-remove-top uk-padding">Partenaires</h1>
<div style="background: rgb(2,102,36);
background: linear-gradient(0deg, rgba(2,102,36,0.2) 0%, rgba(253,187,45,0.2) 100%); border-radius:10px" class="uk-padding">
<div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-grid-match uk-text-center" uk-grid>
<?php
    while($par=$partenaire->fetch()){
?>
    <div>
        <div style='border-radius:10px;' class="my shadow uk-card uk-card-default uk-card-body">
        <style>
        .my{
            background-color: rgba(255,255,255,0.8);
            opacity:0.9;
        }
            .my:hover{
                background-color:#fff;
                opacity:1;
                transition: all ease-out 1s;

            }
        </style>
        <?php
        if($par['site']!='pas de mention'){
        ?>
            <a href="visite.php?id=<?=$par['id'] ?>">
            <?php }?>
                <img class="uk-padding-remove" style='border-radius:10px' src="assets/partenaire/<?=$par['id'] ?>.jpg" alt="<?=$par['nom'] ?>">
            </a>
        </div>
    </div>
    <?php }?>
    
    
</div>
</div>
</div>

        <?php }?>

<?php
    $membre=$bdd->query('SELECT * FROM membre');
    $nbrM=$membre->rowCount();
    if($nbrM>0){?>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e8e8e8" fill-opacity="0.5" d="M0,224L120,197.3C240,171,480,117,720,117.3C960,117,1200,171,1320,197.3L1440,224L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>

    <div align="center" style="background:rgba(232, 232, 232,0.5)" id="membre">

        <h1 align="center" class="uk-margin-remove uk-padding">Membres</h1><hr class="uk-width-2-3 uk-margin-remove-top uk uk-divider-icon">
        <div class="uk-grid-column-small uk-grid-match uk-grid-row-large uk-child-width-1-3@m uk-width-2-3" uk-grid="parallax:150">
        <?php
                while($par=$membre->fetch()){?>
                <li>
                <div>
                    <img src="assets/membre/<?=$par['id']?>.jpg" class="shadow uk-border-circle"  style="height:200px !important; width:200px !important" alt="">
                    </div><p class="uk-text-lead uk-margin-top" ><?=ucfirst($par['nom']) ?> <?=ucfirst($par['prenom']) ?></p>
                    <p class="uk-text-meta"><?=ucfirst($par['information']) ?></p>
                </li>
                <?php }?>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e8e8e8" fill-opacity="0.5" d="M0,128L720,256L1440,128L1440,0L720,0L0,0Z"></path></svg>
        <?php }?>
<div class="uk-height-large uk-background-cover uk-dark shadow uk-flex shadow-lg" uk-parallax="bgy: -460" style="background-image: url('assets/img/back1.png');">

    <h1 style="font-family: 'Pacifico', cursive;font-size:60pt" class="uk-width-1-2@m uk-text-center uk-margin-auto uk-margin-auto-vertical">École Wifak Atlas Marrakech</h1>

</div>
<div align="center" style="background: rgb(219,219,219);
background: linear-gradient(180deg, rgba(219,219,219,1) 0%, rgba(243,244,245,1) 37%, rgba(243,244,245,0) 100%);">
    <h2 id="activite" class="uk-padding" >Galerie de photos</h2>
    <hr>
<?php
$eleve=$bdd->query('SELECT * FROM pic_eleve ORDER BY id DESC');
$nbreleve=$eleve->rowCount();
if($nbreleve>0){
?>
<div class="uk-position-relative uk-visible-toggle uk-light uk-padding uk-margin-top uk-margin-bottom" tabindex="-1" uk-slider>
<div uk-lightbox>

    <ul class="uk-slider-items uk-child-width-1-2@m uk-child-width-1-3@l uk-child-width-1-4@xl uk-grid">
<?php
    while($pic=$eleve->fetch()){?>
        <li>
            <div class="uk-panel shadow">
                    <a class="uk-button uk-button-default" href="assets/eleve/<?=$pic['id'] ?>.jpg" data-caption="<?=$pic['titre'] ?>">
                        <img src="assets/eleve/<?=$pic['id'] ?>.jpg" alt="">
                    </a>
                </div>
                
        </li>
    <?php }?>
    </ul>
    </div>

        <a class="uk-position-center-left uk-position-small" style="color:blue" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small" style="color:blue" href="#" uk-slidenav-next uk-slider-item="next"></a>

</div>
    <?php }?>
    </div>
<?php
include 'elements/footer.php';
?>