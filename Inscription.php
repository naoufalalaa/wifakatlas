<?php
require_once 'controllers/connexion.php';
$page='Inscription';
$slider=true;
include 'elements/head.php';
include 'elements/navbar.php';
include 'controllers/controllerInscription.php';
?>
<svg xmlns="http://www.w3.org/2000/svg" style="z-index:0;position:absolute;top:0px" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="1" d="M0,128L120,149.3C240,171,480,213,720,218.7C960,224,1200,192,1320,176L1440,160L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"></path></svg>
<div class="w-75" align="center" style="z-index:999;margin-left:12.5%">

  <?php if(isset($errorage)){
    echo $errorage;
  }
  if(isset($errorphoto)){
    echo $errorphoto;
  }
  if(isset($errormail)){
    echo $errormail;
  }?> 
  <H1 class="uk-padding" style="z-index:999;position:relative;">S'inscrire</H1>
<form class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
<div class="col-md-6 mb-3" uk-margin>
        <div uk-form-custom="target: true">
          <h5><u>Choisir une photo d'identité:</u></h5>
            <input name="avatar" style="border-radius:3px" id="imgInp" required type="file">
            <img id="blah" class="rounded-circle" src="assets/img/social.png" alt="your image" width="200px">
        </div>
  </div>
  <div class="form-row" align='center'>
    <div class="col-md-6 mb-3" align='center'>
      <input name="nom" placeholder="Nom" type="text" class="form-control" id="validationCustom01" <?php if(isset($_POST['sign']) AND !empty($nom)){?>value="<?=$nom?>"<?php }?> required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 mb-3" align='center'>
      <input name="prenom" placeholder="Prenom" type="text" class="form-control" id="validationCustom02" <?php if(isset($_POST['sign']) AND !empty($prenom)){?>value="<?=$prenom?>"<?php }?> required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <input name="email" placeholder="Email" type="email" class="form-control" id="validationCustom01" <?php if(isset($_POST['sign']) AND !empty($email)){?>value="<?=$email?>"<?php }?> required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <input name="phone" placeholder="Téléphone" type="text" class="form-control" id="validationCustom02" <?php if(isset($_POST['sign']) AND !empty($phone)){?>value="<?=$phone?>"<?php }?> required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <input name="adresse" placeholder="Adresse" type="text" class="form-control" id="validationCustom01" <?php if(isset($_POST['sign']) AND !empty($adresse)){?>value="<?=$adresse?>"<?php }?> required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <input name="taille" placeholder="Taille en Cm" min="120" max="230" type="number" class="form-control" id="validationCustom01" <?php if(isset($_POST['sign']) AND !empty($taille)){?>value="<?=$taille?>"<?php }?> required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <input name="poids" placeholder="Poids en Kg" min="25" max="100" type="number" class="form-control" id="validationCustom02" <?php if(isset($_POST['sign']) AND !empty($poids)){?>value="<?=$poids?>"<?php }?> required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <input name="datenaiss" placeholder="Date de naissance" type="date" class="form-control" id="validationCustom01" <?php if(isset($_POST['sign']) AND !empty($datenaiss)){?>value="<?=$datenaiss?>"<?php }?> required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    
  </div>
  


<script>
  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp").change(function() {
  readURL(this);
}
);
</script>















  

  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
  <button class="btn btn-primary uk-margin-bottom" name="sign" type="submit">Submit form</button>
</form>
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
<script>

    var bar = document.getElementById('js-progressbar');

    UIkit.upload('.js-upload', {

        url: '',
        multiple: true,

        beforeSend: function () {
            console.log('beforeSend', arguments);
        },
        beforeAll: function () {
            console.log('beforeAll', arguments);
        },
        load: function () {
            console.log('load', arguments);
        },
        error: function () {
            console.log('error', arguments);
        },
        complete: function () {
            console.log('complete', arguments);
        },

        loadStart: function (e) {
            console.log('loadStart', arguments);

            bar.removeAttribute('hidden');
            bar.max = e.total;
            bar.value = e.loaded;
        },

        progress: function (e) {
            console.log('progress', arguments);

            bar.max = e.total;
            bar.value = e.loaded;
        },

        loadEnd: function (e) {
            console.log('loadEnd', arguments);

            bar.max = e.total;
            bar.value = e.loaded;
        },

        completeAll: function () {
            console.log('completeAll', arguments);

            setTimeout(function () {
                bar.setAttribute('hidden', 'hidden');
            }, 1000);

            alert('Upload Completed');
        }

    });

</script>
<?php
include 'elements/footer.php'
?>