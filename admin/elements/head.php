<!DOCTYPE html>
<html style="overflow-x:hidden;scroll-behavior:smooth">
    <head>
        <title>AWAM • <?=$page ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../assets/img/logo.png">
        <link rel="stylesheet" style="text/css" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/uikit/css/uikit.min.css" />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="../assets/uikit/js/uikit.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
        <script src="../assets/uikit/js/uikit-icons.min.js"></script>
    </head>
    <body>
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
            content: '';
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