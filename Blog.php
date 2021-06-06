<?php
require_once 'controllers/connexion.php';
$page='Blog';
$slider=true;
include 'elements/head.php';
include 'elements/navbar.php';
include 'controllers/controllerBlog.php';
?>
<?php if(empty($_GET['page'])OR $_GET['page']==1){?>
    <div class="jumbotron bg-transparent" align="center" uk-parallax="y:-500">
        <h1 class="display-4" data-aos="fade-down" data-aos-duration="2000">Bienvenue sur AWAM Blog!</h1>
        <p class="lead" data-aos="fade-up" data-aos-duration="2000">Ce blog est consacré aux nouveautés / activités organisées par l'association.
        <hr class="uk-divider-icon w-75" data-aos="fade-up" data-aos-duration="3000">

        </p>
    </div>
<?php }?>
<div align='center'>
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
            <a class="btn btn-light" style="width:225px" href="Blog.php?C=titre&O=<?php if(empty($_GET['C']) or $_GET['C']!='titre' or $_GET['O']==='DESC'){ ?>ASC<?php } elseif(!empty($_GET['C']) ){ echo'DESC';} ?>"><strong> Trier par Titre </strong>
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
            <a class="btn btn-light" style="width:225px" href="Blog.php?C=descript&O=<?php if(empty($_GET['C']) or $_GET['C']!='descript' or $_GET['O']==='DESC'){ ?>ASC<?php } elseif(!empty($_GET['C']) ){ echo'DESC';} ?>"><strong> Trier par Description </strong>
            <?php if(empty($_GET['C']) or $_GET['C']!='descript'){ ?>
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
            <a class="btn btn-light" style="width:225px" href="Blog.php?C=date_time_publication&O=<?php if(empty($_GET['C']) or $_GET['C']!='date_time_publication' or $_GET['O']==='DESC'){ ?>ASC<?php } elseif(!empty($_GET['C']) ){ echo'DESC';} ?>"><strong> Trier par date </strong>
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



    <div align='center'>
        <div class="uk-grid-column-small uk-grid-match uk-grid-row-large uk-child-width-1-3@l uk-child-width-1-2@m uk-width-3-4@s" uk-grid="parallax:20">
    
        <?php
            
            if($exist>0){
            while($a = $article->fetch()) {
            $time=strtotime($a['date_time_publication']);
        ?>
        <div align='left'>
            <div class="card" style="padding-bottom:0">
            <div  >
            <a href="article.php?id=<?= $a['id'] ?>"><img class="card-img-top" src="assets/articles/<?= $a['id'] ?>a.jpg" alt="<?= $a['titre'] ?>"></a>
            </div>
                <div class="card-body">
                <h5 class="card-title"><a class=" text-decoration-none" style='color: green' href="article.php?id=<?= $a['id'] ?>"><?= ucfirst($a['titre']) ?></a></h5>
                <p class="card-text"><small class="text-muted"><i class="fas fa-info"></i> <?= ucfirst($a['descript']) ?></small></p>
                <p class="card-text" style="text-overflow: ellipsis; overflow:hidden;white-space: nowrap;"><?= ucfirst($a['contenu']); ?>blahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblah</p>
                
                </div>
                <div class="uk-card-footer">
                <p class="font-weight-lighter" style='color: orange'><a style='color: orange' href="article.php?id=<?= $a['id'] ?>">Lire plus 
                <svg class="bi bi-chevron-double-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L9.293 8 3.646 2.354a.5.5 0 010-.708z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L13.293 8 7.646 2.354a.5.5 0 010-.708z" clip-rule="evenodd"/>
                </svg>
                
                </a></p>
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
                        elseif($diff>=1 AND $diff<60){
                    ?>
                   <svg class="bi bi-clock-history" width="1.4em" height="1.4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8.515 1.019A7 7 0 008 1V0a8 8 0 01.589.022l-.074.997zm2.004.45a7.003 7.003 0 00-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 00-.439-.27l.493-.87a8.025 8.025 0 01.979.654l-.615.789a6.996 6.996 0 00-.418-.302zm1.834 1.79a6.99 6.99 0 00-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 00-.214-.468l.893-.45a7.976 7.976 0 01.45 1.088l-.95.313a7.023 7.023 0 00-.179-.483zm.53 2.507a6.991 6.991 0 00-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 01-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 01-.401.432l-.707-.707z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M8 1a7 7 0 104.95 11.95l.707.707A8.001 8.001 0 118 0v1z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M7.5 3a.5.5 0 01.5.5v5.21l3.248 1.856a.5.5 0 01-.496.868l-3.5-2A.5.5 0 017 9V3.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                    </svg> Il y a environ <?=$diff ?> min
                    <?php
                    }
                    }
                    elseif($days>=1 AND $days<30){
                    ?>
                   <svg class="bi bi-clock-history" width="1.4em" height="1.4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8.515 1.019A7 7 0 008 1V0a8 8 0 01.589.022l-.074.997zm2.004.45a7.003 7.003 0 00-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 00-.439-.27l.493-.87a8.025 8.025 0 01.979.654l-.615.789a6.996 6.996 0 00-.418-.302zm1.834 1.79a6.99 6.99 0 00-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 00-.214-.468l.893-.45a7.976 7.976 0 01.45 1.088l-.95.313a7.023 7.023 0 00-.179-.483zm.53 2.507a6.991 6.991 0 00-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 01-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 01-.401.432l-.707-.707z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M8 1a7 7 0 104.95 11.95l.707.707A8.001 8.001 0 118 0v1z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M7.5 3a.5.5 0 01.5.5v5.21l3.248 1.856a.5.5 0 01-.496.868l-3.5-2A.5.5 0 017 9V3.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
</svg> Il y a <?=$days ?> jour<?php if($days>1){echo's';}?>
                    <?php }

                    elseif($days>=60){
                        ?>
                        <svg class="bi bi-clock-history" width="1.4em" height="1.4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8.515 1.019A7 7 0 008 1V0a8 8 0 01.589.022l-.074.997zm2.004.45a7.003 7.003 0 00-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 00-.439-.27l.493-.87a8.025 8.025 0 01.979.654l-.615.789a6.996 6.996 0 00-.418-.302zm1.834 1.79a6.99 6.99 0 00-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 00-.214-.468l.893-.45a7.976 7.976 0 01.45 1.088l-.95.313a7.023 7.023 0 00-.179-.483zm.53 2.507a6.991 6.991 0 00-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 01-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 01-.401.432l-.707-.707z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M8 1a7 7 0 104.95 11.95l.707.707A8.001 8.001 0 118 0v1z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M7.5 3a.5.5 0 01.5.5v5.21l3.248 1.856a.5.5 0 01-.496.868l-3.5-2A.5.5 0 017 9V3.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                        </svg> <?=date("d M",$time)?>, <?= date("h:i",$time) ?>
                    <?php }
                    elseif($days<60 AND $days>=30){
                        ?>
                        <svg class="bi bi-clock-history" width="1.4em" height="1.4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8.515 1.019A7 7 0 008 1V0a8 8 0 01.589.022l-.074.997zm2.004.45a7.003 7.003 0 00-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 00-.439-.27l.493-.87a8.025 8.025 0 01.979.654l-.615.789a6.996 6.996 0 00-.418-.302zm1.834 1.79a6.99 6.99 0 00-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 00-.214-.468l.893-.45a7.976 7.976 0 01.45 1.088l-.95.313a7.023 7.023 0 00-.179-.483zm.53 2.507a6.991 6.991 0 00-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 01-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 01-.401.432l-.707-.707z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M8 1a7 7 0 104.95 11.95l.707.707A8.001 8.001 0 118 0v1z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M7.5 3a.5.5 0 01.5.5v5.21l3.248 1.856a.5.5 0 01-.496.868l-3.5-2A.5.5 0 017 9V3.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                        </svg> Il y a <?=intval($days/30) ?> mois
                    <?php }?>
                    </small>
                    <small class="text-muted" style="float:right"><svg class="bi bi-eye-fill" width="1.4em" height="1.4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.5 8a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                        <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 100-7 3.5 3.5 0 000 7z" clip-rule="evenodd"/>
                        </svg> <?=$a['views'] ?>
                    </small></p>
                </div>
                
            </div>
            </div>



        

        <?php
        }}
        else{
        ?>
        <img src="assets/img/oops.jpg" alt="">
        <?php
        }
        ?>
            </div>
            </div>

    <nav class="uk-padding" aria-label="...">
  <ul class="pagination pagination-sm justify-content-center">
    
   
  
      <?php
      for($i=1;$i<=$pagesTotales;$i++) {
          if($pagesTotales > 1){
         if($i == $pageCourante) {
            echo '<li class="page-item shadow-sm" >
            <a class="page-link">'.$i.'</a>
          </li>';
         } else {
            echo ' <li class="page-item"><a class="page-link" href="Blog.php?';
            if(isset($_GET['q'])){
                echo'q='.$_GET['q'].'&';
            }
            echo'page='.$i.'">'.$i.'</a></li>';
         }
      }}
      ?>
    </ul>
    </nav>
<?php
include 'elements/footer.php';
?>









