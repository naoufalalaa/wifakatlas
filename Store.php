<?php
require_once 'controllers/connexion.php';
$page='Store';
$slider=true;
include 'elements/head.php';
include 'elements/navbar.php';
include 'controllers/controllerStore.php';
?>

<?php if(empty($_GET['page'])OR $_GET['page']==1){?>
<div class="jumbotron bg-transparent" align="center" uk-parallax="y:-500">
  <h1 class="display-4" data-aos="fade-down" data-aos-duration="2000">Bienvenue sur AWAM Store!</h1>
  <p class="lead" data-aos="fade-up" data-aos-duration="2000">Cette boutique éléctronique vous permettera d'acheter des produits AWAM en toute sécurité.
  <hr class="uk-divider-icon w-75" data-aos="fade-up" data-aos-duration="3000">

  </p>
</div>
<?php }?>
<div class="uk-width-child-1-4@m" align="center">
<div align='center' class='uk-width-2-3'>
            <nav class="uk-navbar-container" uk-navbar style="border-radius:20px">
                <div class="uk-navbar-left">

                    <div class="uk-navbar-item">
                        <form method="get" class="uk-search uk-search-navbar">
                            <span uk-search-icon></span>
                            <input class="uk-search-input" type="search" name="q" <?php if(isset($_GET['q'])){?>value="<?=$_GET['q']?>"<?php }?> placeholder="Search...">
                        </form>
                    </div>

                </div>
            </nav>
        </div>
    <div class="uk-grid-column-large uk-margin uk-child-width-expand@m uk-width-3-4@m" uk-grid>
        <div>
            <a class="btn btn-light" style="width:225px" href="Store.php?C=titre&O=<?php if(empty($_GET['C']) or $_GET['C']!='titre' or $_GET['O']==='DESC'){ ?>ASC<?php } elseif(!empty($_GET['C']) ){ echo'DESC';} ?>"><strong> Trier par Nom </strong>
            <?php if(empty($_GET['C']) or $_GET['C']!='titre'){ ?>
                <svg class="bi bi-chevron-expand" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3.646 9.146a.5.5 0 01.708 0L8 12.793l3.646-3.647a.5.5 0 01.708.708l-4 4a.5.5 0 01-.708 0l-4-4a.5.5 0 010-.708zm0-2.292a.5.5 0 00.708 0L8 3.207l3.646 3.647a.5.5 0 00.708-.708l-4-4a.5.5 0 00-.708 0l-4 4a.5.5 0 000 .708z" clip-rule="evenodd"/>
                </svg>
            <?php }
                elseif(isset($_GET['C']) AND $_GET['O']==='DESC'){
                echo'&nbsp;<i class="fas fa-sort-up"></i>';
                }
                elseif(isset($_GET['C']) AND $_GET['O']==='ASC'){
                    echo'&nbsp;<i class="fas fa-sort-down"></i>';
                }?>
            </a>
        </div>
        <div>
            <a class="btn btn-light" style="width:225px" href="Store.php?C=prix&O=<?php if(empty($_GET['C']) or $_GET['C']!='prix' or $_GET['O']==='DESC'){ ?>ASC<?php } elseif(!empty($_GET['C']) ){ echo'DESC';} ?>"><strong> Trier par Prix </strong>
            <?php if(empty($_GET['C']) or $_GET['C']!='prix'){ ?>
                <svg class="bi bi-chevron-expand" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3.646 9.146a.5.5 0 01.708 0L8 12.793l3.646-3.647a.5.5 0 01.708.708l-4 4a.5.5 0 01-.708 0l-4-4a.5.5 0 010-.708zm0-2.292a.5.5 0 00.708 0L8 3.207l3.646 3.647a.5.5 0 00.708-.708l-4-4a.5.5 0 00-.708 0l-4 4a.5.5 0 000 .708z" clip-rule="evenodd"/>
                </svg>
            <?php }
                elseif(isset($_GET['C']) AND $_GET['O']==='DESC'){
                echo'&nbsp;<i class="fas fa-sort-up"></i>';
                }
                elseif(isset($_GET['C']) AND $_GET['O']==='ASC'){
                    echo'&nbsp;<i class="fas fa-sort-down"></i>';
                }?>
            </a>
        </div>
        <div>
            <a class="btn btn-light" style="width:225px" href="Store.php?C=date_time_publication&O=<?php if(empty($_GET['C']) or $_GET['C']!='date_time_publication' or $_GET['O']==='DESC'){ ?>ASC<?php } elseif(!empty($_GET['C']) ){ echo'DESC';} ?>"><strong> Trier par date </strong>
            <?php if(empty($_GET['C']) or $_GET['C']!='date_time_publication'){ ?>
                <svg class="bi bi-chevron-expand" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3.646 9.146a.5.5 0 01.708 0L8 12.793l3.646-3.647a.5.5 0 01.708.708l-4 4a.5.5 0 01-.708 0l-4-4a.5.5 0 010-.708zm0-2.292a.5.5 0 00.708 0L8 3.207l3.646 3.647a.5.5 0 00.708-.708l-4-4a.5.5 0 00-.708 0l-4 4a.5.5 0 000 .708z" clip-rule="evenodd"/>
                </svg>
            <?php }
                elseif(isset($_GET['C']) AND $_GET['O']==='DESC'){
                echo'&nbsp;<i class="fas fa-sort-up"></i>';
                }
                elseif(isset($_GET['C']) AND $_GET['O']==='ASC'){
                    echo'&nbsp;<i class="fas fa-sort-down"></i>';
                }?>

            </a>
        </div>
            </div>
        </div>

<?php 
    $exist=$article->rowCount();
    if($exist==0){
    if($nbrprod==0){
?>
    <div class="uk-padding uk-margin" align='center'>
    <div class="uk-text-center">
        <div class="uk-inline-clip uk-transition-toggle" tabindex="0">
            <img src="assets/img/player.png" alt="">
            <div style="border-radius:10px;" class="uk-transition-fade uk-position-cover uk-position-small uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle">
                <p class="uk-h4 uk-margin-remove">Pas de produit pour le moment</p>
            </div>
        </div>
    </div>
    </div>
<?php }}
    else{
?>
</div>
<div align='center'>
<div class="uk-grid-column-small uk-grid-match uk-grid-row-large uk-child-width-1-4@l uk-child-width-1-4@m uk-child-width-1-3@s uk-width-5-6@l" uk-grid>
        
            <?php
            $exist=$article->rowCount();
            if($exist>0){
            while($prod = $article->fetch()) {
                $time=strtotime($prod['date_time_publication']);
            ?>
            <div>
                <div class="card" <?php if($prod['stock']==0){?>style="opacity:0.3"<?php }?>>
                
                
                        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow='autoplay:true;ratio:1:1'>

                            <ul class="uk-slideshow-items">
                                <?php
                                $filename='assets/produit/'.$prod['id'].'p.jpg';
                                if(file_exists($filename)){
                                ?>
                                <li>
                                    <img src="assets/produit/<?=$prod['id']?>p.jpg" alt="">
                                </li>
                                <?php }
                                $i=1;
                                while($i<=5){
                                $filename='assets/produit/'.$prod['id'].'p'.$i.'.jpg';
                                if(file_exists($filename)){
                                
                                ?>
                                <li>
                                    <img src="assets/produit/<?=$prod['id']?>p<?=$i?>.jpg" alt="" >
                                </li>
                                <?php }$i++;}?>
                            </ul>

                            <a class="uk-position-center-left uk-position-small uk-hidden-hover" style="color:black" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                            <a class="uk-position-center-right uk-position-small uk-hidden-hover" style="color:black" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

                        </div>
                
                    <div class="card-body">
                        <hr>
                    <h5 class="card-title" align="center"><a href="product.php?id=<?= $prod['id'] ?>"><?= ucfirst($prod['titre']) ?></a></h5>
                    <hr>
                    <p class="card-text"  style="overflow:hidden; text-overflow: ellipsis; white-space: nowrap;"><small class="text-muted"><i class="fas fa-info"></i> <?= ucfirst($prod['descript']) ?></small></p>
                    
                    <p class="card-text" align="right"><a class="btn btn-primary" href="product.php?id=<?=$prod['id'] ?>">Voir plus de détails</a></p>
                    <hr>

                    <p class="card-text" ><small class="text-muted" style="float:left">
            
                    <?php
                        $now=time();
                        $diff=$now - $time;
                        $diff=intval($diff/60);
                        $hours=intval($diff/60);
                        $days=intval($diff/1440);
                        if($days<1){
                        if($hours>=1){
                    ?>
                            <svg class="bi bi-clock-history" width="1.4em" height="1.4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8.515 1.019A7 7 0 008 1V0a8 8 0 01.589.022l-.074.997zm2.004.45a7.003 7.003 0 00-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 00-.439-.27l.493-.87a8.025 8.025 0 01.979.654l-.615.789a6.996 6.996 0 00-.418-.302zm1.834 1.79a6.99 6.99 0 00-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 00-.214-.468l.893-.45a7.976 7.976 0 01.45 1.088l-.95.313a7.023 7.023 0 00-.179-.483zm.53 2.507a6.991 6.991 0 00-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 01-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 01-.401.432l-.707-.707z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M8 1a7 7 0 104.95 11.95l.707.707A8.001 8.001 0 118 0v1z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M7.5 3a.5.5 0 01.5.5v5.21l3.248 1.856a.5.5 0 01-.496.868l-3.5-2A.5.5 0 017 9V3.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                    </svg> Il y a environ <?=$hours ?> h
                                <?php }
                                if($diff<1){
                                ?>
                        <svg class="bi bi-clock-history" width="1.4em" height="1.4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8.515 1.019A7 7 0 008 1V0a8 8 0 01.589.022l-.074.997zm2.004.45a7.003 7.003 0 00-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 00-.439-.27l.493-.87a8.025 8.025 0 01.979.654l-.615.789a6.996 6.996 0 00-.418-.302zm1.834 1.79a6.99 6.99 0 00-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 00-.214-.468l.893-.45a7.976 7.976 0 01.45 1.088l-.95.313a7.023 7.023 0 00-.179-.483zm.53 2.507a6.991 6.991 0 00-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 01-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 01-.401.432l-.707-.707z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M8 1a7 7 0 104.95 11.95l.707.707A8.001 8.001 0 118 0v1z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M7.5 3a.5.5 0 01.5.5v5.21l3.248 1.856a.5.5 0 01-.496.868l-3.5-2A.5.5 0 017 9V3.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                    </svg> Il y a environ <?=$diff*60 ?> sec

                            <?php
                                }
                                elseif($diff>=1 && $hours<1){
                            ?>
                        <svg class="bi bi-clock-history" width="1.4em" height="1.4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8.515 1.019A7 7 0 008 1V0a8 8 0 01.589.022l-.074.997zm2.004.45a7.003 7.003 0 00-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 00-.439-.27l.493-.87a8.025 8.025 0 01.979.654l-.615.789a6.996 6.996 0 00-.418-.302zm1.834 1.79a6.99 6.99 0 00-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 00-.214-.468l.893-.45a7.976 7.976 0 01.45 1.088l-.95.313a7.023 7.023 0 00-.179-.483zm.53 2.507a6.991 6.991 0 00-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 01-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 01-.401.432l-.707-.707z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M8 1a7 7 0 104.95 11.95l.707.707A8.001 8.001 0 118 0v1z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M7.5 3a.5.5 0 01.5.5v5.21l3.248 1.856a.5.5 0 01-.496.868l-3.5-2A.5.5 0 017 9V3.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                    </svg> Il y a environ <?=$diff ?> min
                            <?php
                            }
                            }
                            else{
                                if($days<30){
                            ?>
                        <svg class="bi bi-clock-history" width="1.4em" height="1.4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8.515 1.019A7 7 0 008 1V0a8 8 0 01.589.022l-.074.997zm2.004.45a7.003 7.003 0 00-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 00-.439-.27l.493-.87a8.025 8.025 0 01.979.654l-.615.789a6.996 6.996 0 00-.418-.302zm1.834 1.79a6.99 6.99 0 00-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 00-.214-.468l.893-.45a7.976 7.976 0 01.45 1.088l-.95.313a7.023 7.023 0 00-.179-.483zm.53 2.507a6.991 6.991 0 00-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 01-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 01-.401.432l-.707-.707z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M8 1a7 7 0 104.95 11.95l.707.707A8.001 8.001 0 118 0v1z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M7.5 3a.5.5 0 01.5.5v5.21l3.248 1.856a.5.5 0 01-.496.868l-3.5-2A.5.5 0 017 9V3.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                    </svg> Il y a <?=$days ?> jour<?php if($days>1){echo's';}
                            }
                            
                            elseif($days<60 AND $days>=30){
                                ?>
                            <svg class="bi bi-clock-history" width="1.4em" height="1.4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8.515 1.019A7 7 0 008 1V0a8 8 0 01.589.022l-.074.997zm2.004.45a7.003 7.003 0 00-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 00-.439-.27l.493-.87a8.025 8.025 0 01.979.654l-.615.789a6.996 6.996 0 00-.418-.302zm1.834 1.79a6.99 6.99 0 00-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 00-.214-.468l.893-.45a7.976 7.976 0 01.45 1.088l-.95.313a7.023 7.023 0 00-.179-.483zm.53 2.507a6.991 6.991 0 00-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 01-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 01-.401.432l-.707-.707z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M8 1a7 7 0 104.95 11.95l.707.707A8.001 8.001 0 118 0v1z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M7.5 3a.5.5 0 01.5.5v5.21l3.248 1.856a.5.5 0 01-.496.868l-3.5-2A.5.5 0 017 9V3.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                    </svg>Il y a <?=intval($days/30) ?> mois
                            <?php }
                            elseif($days>60){
                            ?>
                            <svg class="bi bi-clock-history" width="1.4em" height="1.4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8.515 1.019A7 7 0 008 1V0a8 8 0 01.589.022l-.074.997zm2.004.45a7.003 7.003 0 00-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 00-.439-.27l.493-.87a8.025 8.025 0 01.979.654l-.615.789a6.996 6.996 0 00-.418-.302zm1.834 1.79a6.99 6.99 0 00-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 00-.214-.468l.893-.45a7.976 7.976 0 01.45 1.088l-.95.313a7.023 7.023 0 00-.179-.483zm.53 2.507a6.991 6.991 0 00-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 01-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 01-.401.432l-.707-.707z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M8 1a7 7 0 104.95 11.95l.707.707A8.001 8.001 0 118 0v1z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M7.5 3a.5.5 0 01.5.5v5.21l3.248 1.856a.5.5 0 01-.496.868l-3.5-2A.5.5 0 017 9V3.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                    </svg> <?=date("d M",$time)?>, <?= date("h:i",$time) ?>
                            
                            <?php }}?>
                                            </small>
                                    <small class="text-muted" style="float:right"><i class="fas fa-coins"></i> <?=$prod['prix'] ?> Dh</small>
                    </p>
                    </div>
                    
                </div></div>
                <?php }}
}?>
            


</div>
</div>

            
</div>
<nav aria-label="">
  <ul class="pagination pagination-md justify-content-center">
    
   
  
      <?php
      for($i=1;$i<=$pagesTotales;$i++) {
          if($pagesTotales > 1){
         if($i == $pageCourante) {
            echo '<li class="page-item shadow-sm" >
            <a class="page-link">'.$i.'</a>
          </li>';
         } else {
            echo ' <li class="page-item"><a class="page-link" href="Blog.php?page='.$i.'">'.$i.'</a></li>';
         }
      }}
      ?>
    </ul>
</nav>

<?php
include 'elements/footer.php';
?>