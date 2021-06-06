<?php
require_once 'controllers/connexion.php';
include 'controllers/controllerProduct.php';
$page=ucfirst($titre);
$slider=true;
include 'elements/head.php';
include 'elements/navbar.php';
if(isset($message)){
    echo $message;
}
$art=$bdd->query('SELECT * FROM article');
$exist=$art->rowCount();
if($exist>0){
$plus=$bdd->query('SELECT * FROM article ORDER BY views desc LIMIT 3');
}
?>

<a href="Store" style="font-size:16pt" class='btn btn-light uk-margin-left uk-margin-bottom'><i class="fas fa-angle-left"></i> Go Back</a>
<div align="center">
<section class="uk-width-7-8@m uk-margin" uk-grid>
<div class="uk-width-3-4@m uk-margin uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@m" align='left' uk-grid>
    <div class="uk-card-media-left uk-cover-container">
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: scale;ratio:1:1" align="center">

                    <ul class="uk-slideshow-items" uk-lightbox>
                        <?php
                        $filename='assets/produit/'.$_GET['id'].'p.jpg';
                        if(file_exists($filename)){?>
                        <li>
                            <div class="uk-position-cover">
                                <a href="assets/produit/<?= $_GET['id']?>p.jpg" class="uk-button uk-button-default"><img src="assets/produit/<?= $_GET['id'] ?>p.jpg" alt=""></a>
                            </div>
                        </li>
                        <?php }
                        $i=1;
                            while($i<5){
                                $filename='assets/produit/'.$_GET['id'].'p'.$i.'.jpg';
                                if(file_exists($filename)){
                                echo '<li>
                            <div class="uk-position-cover uk-transform-origin-top-right">
                                <a href="assets/produit/'.$_GET['id'].'p'.$i.'.jpg"  class="uk-button uk-button-default"><img src="assets/produit/'.$_GET['id'].'p'.$i.'.jpg" alt="" ></a>
                            </div>
                        </li>';
                        $i++;}
                        else{
                        break;
                        }
                            }
                        ?>
                    </ul>


                    <a class="uk-position-center-left uk-position-small " href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

                </div>
    </div>
    <div>
        <div class="uk-card-body">
            <h3 class="uk-card-title"><?= ucfirst($titre) ?></h3>
            <p class="card-text"><small class="text-muted"><i class="fas fa-info-circle"></i> <?= ucfirst($descript) ?></small></p>
            <p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong><i class="fas fa-expand-arrows-alt"></i> Tailles disponible:</strong></li>
                    <li class="list-group-item">Small <?php if($stock_s==0){echo'<span class="badge badge-pill badge-secondary">'.$stock_s.'</span>';}elseif($stock_s<5){echo'<span class="badge badge-pill badge-danger">'.$stock_s.'</span>
  ';}elseif($stock_s>=5){echo'<span class="badge badge-pill badge-success">'.$stock_s.'</span>
  ';} ?></li>
                      <li class="list-group-item">Medium <?php if($stock_m==0){echo'<span class="badge badge-pill badge-secondary">'.$stock_m.'</span>';}elseif($stock_m<5){echo'<span class="badge badge-pill badge-danger">'.$stock_m.'</span>
  ';}elseif($stock_m>=5){echo'<span class="badge badge-pill badge-success">'.$stock_m.'</span>
  ';} ?></li>
                      <li class="list-group-item">Large <?php if($stock_l==0){echo'<span class="badge badge-pill badge-secondary">'.$stock_l.'</span>';}elseif($stock_l<5){echo'<span class="badge badge-pill badge-danger">'.$stock_l.'</span>
  ';}elseif($stock_l>=5){echo'<span class="badge badge-pill badge-success">'.$stock_l.'</span>
  ';} ?></li>
                      <li class="list-group-item"><em><i class="fas fa-box-open"></i> Total</em>: <?=$stock?></li>
                </ul>
            </p>
            <p class="card-text" style="float:right">
                <a class=" btn btn-warning " href="#modal-full" uk-toggle><i class="fas fa-wallet"></i> <?=$prix ?>Dhs</a>

<div id="modal-full" class="uk-modal-full" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
        <div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
            <div class="uk-background-cover" style="background-image: url('assets/produit/<?=$_GET['id']?>p.jpg');" uk-height-viewport></div>
            <div class="uk-padding-large">
                <h1>Commander <em><?=ucfirst($titre)?></em></h1>
                <form class="needs-validation" novalidate method="post">
  <div class="form-row">
    <div class="col-md-5 mb-3">
      <label for="validationTooltip01">Prénom</label>
      
      <input name="prenom" type="text" class="form-control <?php if(isset($error0) AND $error0==1){echo'is-invalid'; } elseif(isset($error0)){echo'is-valid'; }?>" id="validationTooltip01" <?php if(isset($empty) AND $empty==1){echo'value="'.$prenom.'"';}?>  required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please provide a valid first name.
      </div>
    </div>
    <div class="col-md-5 mb-3">
      <label for="validationTooltip02">Nom</label>
      <input name="nom" type="text" class="form-control <?php if(isset($error1) AND $error1==1){echo'is-invalid'; } 
      elseif(isset($error1)){ echo'is-valid'; }?>" id="validationTooltip02" 
      <?php if(isset($empty) AND $empty==1){echo'value="'.$nom.'"';}?> required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please provide a valid name.
      </div>
    </div>
  </div>
  <div class="form-row">
  <div class="col-md-6 mb-3">
      <label for="validationTooltip06">E-mail</label>
      <input name="email" type="email" class="form-control <?php if(isset($error2) AND $error2==1){echo'is-invalid'; } elseif(isset($error2)){echo'is-valid'; }?>" <?php if(isset($empty) AND $empty==1){echo'value="'.$email.'"';}?> id="validationTooltip06" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please provide a valid email.
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationTooltip06">Téléphone</label>
      <input name="phone" type="email" class="form-control <?php if(isset($error3) AND $error3==1){echo'is-invalid'; } elseif(isset($error3)){echo'is-valid'; }?>" <?php if(isset($empty) AND $empty==1){echo'value="'.$phone.'"';}?> id="validationTooltip06" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please provide a valid Téléphone.
      </div>
    </div>
    </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationTooltip03">Adresse</label>
      <input name="adresse" type="text" class="form-control <?php if(isset($error4) AND $error4==1){echo'is-invalid'; } elseif(isset($error4)){echo'is-valid'; }?>" <?php if(isset($empty) AND $empty==1){echo'value="'.$adress.'"';}?> id="validationTooltip03" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please provide a valid address.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationTooltip04">Ville</label>
      <select class="custom-select <?php if(isset($error5) AND $error5==1){echo'is-invalid'; } elseif(isset($error5)){echo'is-valid'; }?>" name="ville" id="validationTooltip04" required>
        <option value="Agadir">Agadir</option>
        <option value="Béni Mellal">Béni Mellal</option>
        <option value="Berkane">Berkane</option>
        <option value="Casablanca">Casablanca</option>
        <option value="El Jadida">El Jadida</option>
        <option value="Fès">Fès</option>
        <option value="Kénitra">Kénitra</option>
        <option value="Khémisset">Khémisset</option>
        <option value="Khouribga">Khouribga</option>
        <option selected value="Marrakech">Marrakech</option>
        <option value="Meknès">Meknès</option>
        <option value="Mohammédia">Mohammédia</option>
        <option value="Oujda">Oujda</option>
        <option value="Rabat">Rabat</option>
        <option value="Safi">Safi</option>
        <option value="Salé">Salé</option>
        <option value="Tanger">Tanger</option>
        <option value="Taza">Taza</option>
        <option value="Témara">Témara</option>
        <option value="Tétouan">Tétouan</option>
      </select>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please select a valid city.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationTooltip05">Code Postal</label>
      <input name="code_postal" type="text" class="form-control" id="validationTooltip05" required>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>
  </div>

<div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationTooltip01">Quantité de S</label>
      <input name="qs" type="number" min="0" max="<?=$stock_s ?>" value="0" class="form-control" id="validationTooltip01" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltip02">Quantité de M</label>
      <input name="qm" type="number" min="0" max="<?=$stock_m ?>" value="0" class="form-control" id="validationTooltip02" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltip02">Quantité de L</label>
      <input name="ql" type="number" min="0" max="<?=$stock_l ?>" value="0" class="form-control" id="validationTooltip02" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>




            <input type="submit" value="Valider la commande" name="valider" class="btn btn-primary">
        </div>
        </div>
        </form>
            </div>
        </div>
    </div>
</div>
            </p>
            </div>
        



<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>


<div class="uk-margin uk-width-1-4@m uk-width-1-2@s" align='left'>
    <div class="uk-card-header">
        <div class="uk-grid-small uk-flex-middle" uk-grid>
            
            <div class="uk-width-expand">
                <h4 class="uk-card-title uk-margin-remove-bottom">Les articles les plus vu</h4>
                <hr class="uk-divider-small  uk-margin-remove-top uk-margin-remove-bottom">
            </div>
        </div>
    </div>
    <div class="uk-card-body">
    <?php 
    if($exist>0){while($ar=$plus->fetch()){?>
        <div>
        <div class="uk-card uk-card-default uk-margin-bottom">
            <div class="uk-card-media-top">
            <a href="article.php?id=<?=$ar['id'] ?>">
                <img src="assets/articles/<?=$ar['id'] ?>a.jpg" alt=""></a>
            </div>
            <div class="uk-card-body"style="word-wrap: break-word;">
                <h5 style="overflow-wrap: break-word; word-wrap: break-word;
  hyphens: auto;"><a href="article.php?id=<?=$ar['id'] ?>"><?=$ar['titre'] ?></a></h5>
                <p class="uk-article-meta"><?=$ar['descript'] ?></p>
            </div>
        </div>
    </div>
    
        
    <?php }}
    else{echo 'Pas d\'article';}?>
    </div>



</div></div></div>
<?php
include 'elements/footer.php';
?>