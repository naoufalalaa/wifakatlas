<?php
echo'

<nav  class="navbar navbar-expand-lg text-white shadow navbar-dark justify-content-center bg-dark" align="center">
  <a class="navbar-brand" href="../index.php"><img src="../assets/img/logo.png" width="30" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item">
        <a class="nav-link" href="../index.php"><i class="fas fa-home"></i> Acceuil</a>
      </li>
      ';
        echo "<li class=\"nav-item dropdown active\">
                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdownMenuLink\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">".
                $_SESSION['pseudo']."
                </a>
                <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">
                  <a class=\"dropdown-item\" href=\"profil.php?id=".$_SESSION['id']."\">Mon profil</a>
                  <a class=\"dropdown-item\" href=\"deconnexion.php\">Se déconnecter</a>
                </div>
              </li>";
            
      echo'
            </ul>
        </div>
</nav>';?>
<style> 
.sk-folding-cube {
    z-index:99999;
    top:45%;
    left:45%;
    margin: 20px auto;
    width: 100px;
    height: 100px;
    position: absolute;
    -webkit-transform: rotateZ(45deg);
            transform: rotateZ(45deg);
    }

.sk-folding-cube .sk-cube {
    float: left;
    width: 50%;
    height: 50%;
    position: relative;
    -webkit-transform: scale(1.1);
        -ms-transform: scale(1.1);
            transform: scale(1.1); 
    }
.sk-folding-cube .sk-cube:before {
    content: \'\';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: orange;
    -webkit-animation: sk-foldCubeAngle 2.4s infinite linear both;
            animation: sk-foldCubeAngle 2.4s infinite linear both;
    -webkit-transform-origin: 100% 100%;
        -ms-transform-origin: 100% 100%;
            transform-origin: 100% 100%;
    }
.sk-folding-cube .sk-cube2:before {
        background-color: green;
    }
.sk-folding-cube .sk-cube4:before {
        background-color: green;
    }
.sk-folding-cube .sk-cube2 {
    -webkit-transform: scale(1.1) rotateZ(90deg);
            transform: scale(1.1) rotateZ(90deg);
    }
.sk-folding-cube .sk-cube3 {
    -webkit-transform: scale(1.1) rotateZ(180deg);
            transform: scale(1.1) rotateZ(180deg);
}
.sk-folding-cube .sk-cube4 {
    -webkit-transform: scale(1.1) rotateZ(270deg);
            transform: scale(1.1) rotateZ(270deg);
}
.sk-folding-cube .sk-cube2:before {
    -webkit-animation-delay: 0.3s;
            animation-delay: 0.3s;
}
.sk-folding-cube .sk-cube3:before {
    -webkit-animation-delay: 0.6s;
            animation-delay: 0.6s; 
}
.sk-folding-cube .sk-cube4:before {
    -webkit-animation-delay: 0.9s;
            animation-delay: 0.9s;
    }
@-webkit-keyframes sk-foldCubeAngle {
    0%, 10% {
        -webkit-transform: perspective(140px) rotateX(-180deg);
                transform: perspective(140px) rotateX(-180deg);
        opacity: 0; 
} 25%, 75% {
        -webkit-transform: perspective(140px) rotateX(0deg);
                transform: perspective(140px) rotateX(0deg);
        opacity: 1; 
} 90%, 100% {
        -webkit-transform: perspective(140px) rotateY(180deg);
                transform: perspective(140px) rotateY(180deg);
        opacity: 0; 
} 
}

@keyframes sk-foldCubeAngle {
    0%, 10% {
        -webkit-transform: perspective(140px) rotateX(-180deg);
                transform: perspective(140px) rotateX(-180deg);
        opacity: 0; 
    } 25%, 75% {
        -webkit-transform: perspective(140px) rotateX(0deg);
                transform: perspective(140px) rotateX(0deg);
        opacity: 1; 
    } 90%, 100% {
        -webkit-transform: perspective(140px) rotateY(180deg);
                transform: perspective(140px) rotateY(180deg);
        opacity: 0; 
    }
}
</style> 
<div id="loader" class="sk-folding-cube">
<div class="sk-cube1 sk-cube"></div>
<div class="sk-cube2 sk-cube"></div>
<div class="sk-cube4 sk-cube"></div>
<div class="sk-cube3 sk-cube"></div>
</div>

<script> 
document.onreadystatechange = function() { 
    if (document.readyState !== "complete") { 
        document.querySelector( 
          "body").style.visibility = "hidden"; 
        document.querySelector( 
          "#loader").style.visibility = "visible"; 
    } else { 
        document.querySelector( 
          "#loader").style.display = "none"; 
        document.querySelector( 
          "body").style.visibility = "visible"; 
    } 
}; 
</script> 
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>