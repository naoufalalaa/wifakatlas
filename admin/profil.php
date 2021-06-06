<?php
include_once 'controllers/controllerProfil.php';
$page='Profil';
include 'elements/head.php';
include 'elements/navbar.php';

?>
<div align="center" style="margin-top:20px;">
<div align="left" class='uk-width-2-3'>
<ul uk-tab uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
    <li><a href="#">Information</a></li>
    <li><a href="#">Inscriptions <?php if($nRows>0){?> <span class="badge badge-pill badge-warning"><?=$nRows ?></span><?php }?></a></li>
    <li><a href="#">Commandes <?php if($nRowsC>0){?> <span class="badge badge-pill badge-warning"><?=$nRowsC ?></span><?php }?></a></li>
</ul>

<ul class="uk-switcher uk-margin">
    <li>
        <div class="card text-white bg-dark" align="center">
        <div class="card-header">Profil de <?php echo $user['prenom'];echo " "; echo $user['nom']; ?></div>
        <div class="card-body">
        <img src="avatar/<?= $user['avatar'] ?>" class="rounded-circle" width="150px">
        <br>
        <br>
            <h5 class="card-title text-white">Bienvenue<strong> <?php echo $user['prenom']; ?></strong></h5>
            <p class="card-text"><?php echo $user['email']; ?></p>
            <?php
                if(isset($_SESSION['id']) AND $user['id'] == $_SESSION['id']) {
                ?>
                <a href="editerprofil.php" class="btn btn-outline-success">Éditer le profile</a>
                <a href="ajouterarticle.php" class="btn btn-outline-success">Ajouter un article</a>
                <a href="membre.php" class="btn btn-outline-success">Ajouter un membre</a>
                <a href="ajouterproduit.php" class="btn btn-outline-success">Ajouter un produit</a><br><br>
                <a href="ajouterslider.php" class="btn btn-outline-success">Ajouter au slider</a><br><br>
                <br><br>
                <a href="deconnexion.php" class="btn btn-outline-danger">Se déconnecter</a>
            </div>
        
                <?php
                }
                ?>
        </div>
    </li>
    <li>
        <table  class="table table-hover w-100" align="center">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col"><a href="profil.php?id=<?=$getid?>&c=nom&o=<?php if(isset($o) AND isset($c) AND $c=="nom" AND $o=="ASC"){echo'DESC';} else{?>ASC<?php }?>#new"> Nom et Prénom<?php if(isset($o) AND isset($c) AND $c=="nom" AND $o=="DESC" ){echo' <i class="fas fa-sort-up"></i>';} else{echo' <i class="fas fa-sort-down"></i>';} ?></a></th>
                <th scope="col"><a href="profil.php?id=<?=$getid?>&c=email&o=<?php if(isset($o) AND isset($c) AND $c=="email" AND $o=="DESC"){echo'ASC';} else{?>DESC<?php }?>#new">E-mail<?php if(isset($o) AND isset($c) AND $c=="email"  AND $o=="DESC" ){echo' <i class="fas fa-sort-up"></i>';} else{echo' <i class="fas fa-sort-down"></i>';} ?></a></th>
                <th scope="col"><a href="profil.php?id=<?=$getid?>&c=phone_eleve&o=<?php if(isset($o) AND isset($c) AND $c=="phone_eleve" AND $o=="DESC"){echo'ASC';} else{?>DESC<?php }?>#new">Téléphone<?php if(isset($o) AND isset($c) AND $c=="phone_eleve" AND $o=="DESC" ){echo' <i class="fas fa-sort-up"></i>';} else{echo' <i class="fas fa-sort-down"></i>';} ?></a></th>
                <th scope="col"><a href="profil.php?id=<?=$getid?>&c=age_eleve&o=<?php if(isset($o) AND isset($c) AND $c=="age_eleve" AND $o=="DESC"){echo'ASC';} else{?>DESC<?php }?>#new">Age<?php if(isset($o) AND isset($c) AND $c=="age_eleve" AND $o=="DESC" ){echo' <i class="fas fa-sort-up"></i>';} else{echo' <i class="fas fa-sort-down"></i>';} ?></a></th>
                <th scope="col"><a href="profil.php?id=<?=$getid?>&c=poids&o=<?php if(isset($o) AND isset($c) AND $c=="poids"  AND$o=="DESC"){echo'ASC';} else{?>DESC<?php }?>#new">Poids<?php if(isset($o) AND isset($c) AND $c=="poids" AND $o=="DESC" ){echo' <i class="fas fa-sort-up"></i>';} else{echo' <i class="fas fa-sort-down"></i>';} ?></a></th>
                <th scope="col"><a href="profil.php?id=<?=$getid?>&c=taille&o=<?php if(isset($o) AND isset($c) AND $c=="taille" AND $o=="DESC"){echo'ASC';} else{?>DESC<?php }?>#new">Taille<?php if(isset($o) AND isset($c) AND $c=="taille" AND $o=="DESC" ){echo' <i class="fas fa-sort-up"></i>';} else{echo' <i class="fas fa-sort-down"></i>';} ?></a></th>
                <th scope="col"><a href="profil.php?id=<?=$getid?>&c=date_insc&o=<?php if(isset($o) AND isset($c) AND $c=="date_insc" AND $o=="DESC"){echo'ASC';} else{?>DESC<?php }?>#new">Date Inscription<?php if(isset($o) AND isset($c) AND $c=="date_insc" AND $o=="DESC" ){echo' <i class="fas fa-sort-up"></i>';} else{echo' <i class="fas fa-sort-down"></i>';} ?></a></th>
                <th scope="col"><a href="profil.php?id=<?=$getid?>&c=verify&o=<?php if(isset($o) AND isset($c) AND $c=="verify" AND $o=="ASC"){echo'DESC';} else{?>ASC<?php }?>#new">Verifier<?php if(isset($o) AND isset($c) AND $c=="verify" AND $o=="DESC" ){echo' <i class="fas fa-sort-up"></i>';} else{echo' <i class="fas fa-sort-down"></i>';} ?></a></th>
                </tr>
            </thead>
            <tbody>
            <?php
                while($insc=$inscript->fetch()){
                if($insc['verify']==0){
                    echo '<tr class="alert alert-primary">';
                }
                else{
                    echo '<tr>';
                }
            ?>
                <?php
                if($insc['verify']==0){

                ?>
                <th scope="row"><img src="../assets/img/soccer.png" width="50px" alt=""></th>
                <?php   
                }else{
                echo '<th scope="row">'.$insc['id'].'</th>';
                }
                ?>
                <td><a href="eleve.php?id=<?=$insc['id'] ?>"><?=ucfirst($insc['nom']) ?> <?=ucfirst($insc['prenom']) ?></a></td>
                <td><?=$insc['email'] ?></td>
                <td><?=$insc['phone_eleve'] ?></td>
                <td><?=$insc['age_eleve'] ?></td>
                <td><?=$insc['poids'] ?> kg</td>
                <td><?=$insc['taille'] ?> cm</td>
                <td><?=date("d M Y",strtotime($insc['date_insc'])) ?></td>
                <td><?php
                if($insc['verify']==0){
                    echo '<a class="btn btn-success" href="verify.php?id='.$insc['id'].'">Valider</a>';
                }
                else{
                    echo '<a href="inverify.php?id='.$insc['id'].'" class="btn btn-outline-danger">Invalider</a>';
                }
                ?></td>
                </tr>
                <?php   
                }
                ?>
                </tbody>
            </table>

    </li>
    <li>
        <table class="table" id="Commande">
            <thead class="thead-light">
                <tr>
                <th scope="col">#</th>
                <th scope="col"><a href="profil.php?id=<?=$getid?>&com=nom&O1=<?php if(isset($O1) AND isset($C1) AND $C1=="nom" AND $O1=="ASC"){echo'DESC';} else{?>ASC<?php }?>#Commande"> Nom et Prénom<?php if(isset($O1) AND isset($C1) AND $C1=="nom" AND $O1=="DESC" ){echo' <i class="fas fa-sort-up"></i>';} else{echo' <i class="fas fa-sort-down"></i>';} ?></a></th>
                <th scope="col"><a href="profil.php?id=<?=$getid?>&com=email&O1=<?php if(isset($O1) AND isset($C1) AND $C1=="email" AND $O1=="ASC"){echo'DESC';} else{?>ASC<?php }?>#Commande"> E-mail<?php if(isset($O1) AND isset($C1) AND $C1=="email" AND $O1=="DESC" ){echo' <i class="fas fa-sort-up"></i>';} else{echo' <i class="fas fa-sort-down"></i>';} ?></a></th>      
                <th scope="col"><a href="profil.php?id=<?=$getid?>&com=quantity&O1=<?php if(isset($O1) AND isset($C1) AND $C1=="quantity" AND $O1=="ASC"){echo'DESC';} else{?>ASC<?php }?>#Commande"> Qantité<?php if(isset($O1) AND isset($C1) AND $C1=="quantity" AND $O1=="DESC" ){echo' <i class="fas fa-sort-up"></i>';} else{echo' <i class="fas fa-sort-down"></i>';} ?></a></th>      
                <th scope="col"><a href="profil.php?id=<?=$getid?>&com=montant&O1=<?php if(isset($O1) AND isset($C1) AND $C1=="montant" AND $O1=="ASC"){echo'DESC';} else{?>ASC<?php }?>#Commande"> Montant<?php if(isset($O1) AND isset($C1) AND $C1=="montant" AND $O1=="DESC" ){echo' <i class="fas fa-sort-up"></i>';} else{echo' <i class="fas fa-sort-down"></i>';} ?></a></th>
                <th scope="col"><a href="profil.php?id=<?=$getid?>&com=id_prod&O1=<?php if(isset($O1) AND isset($C1) AND $C1=="id_prod" AND $O1=="ASC"){echo'DESC';} else{?>ASC<?php }?>#Commande"> Produit Commandé<?php if(isset($O1) AND isset($C1) AND $C1=="id_prod" AND $O1=="DESC" ){echo' <i class="fas fa-sort-up"></i>';} else{echo' <i class="fas fa-sort-down"></i>';} ?></a></th>
                <th scope="col">Consulter commande</th>
                <th scope="col"><a href="profil.php?id=<?=$getid?>&com=id&O1=<?php if(isset($O1) AND isset($C1) AND $C1=="id" AND $O1=="ASC"){echo'DESC';} else{?>ASC<?php }?>#Commande"> Date Commande<?php if(isset($O1) AND isset($C1) AND $C1=="id" AND $O1=="DESC" ){echo' <i class="fas fa-sort-up"></i>';} else{echo' <i class="fas fa-sort-down"></i>';} ?></a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($c=$commande->fetch()){  
                    $prod=$bdd->prepare('SELECT * FROM produit WHERE id=?');
                    $prod->execute(array($c['id_prod']));
                    $p=$prod->fetch();
                    $titre=$p['titre'];
                    $prix=$p['prix'];
                    if($c['validate']==0){
                    echo '<tr class="alert alert-primary">';
                    
                }
                else{
                    echo '<tr>';
                }
            ?>
                <?php
                if($c['validate']==0){
            
                ?>
                <th scope="row"><img src="../assets/img/box.png" width="50px" alt=""></th>
                <?php   
                }
                else{
                echo '<th scope="row">'.$c['id'].'</th>';
                }
                ?>
                <td><?=ucfirst($c['nom']) ?> <?=ucfirst($c['prenom']) ?></td>
                <td><?=$c['email'] ?></td>
                <td><?=$c['qS']+$c['qM']+$c['qL'] ?></td>
                <td><em><strong><?=$c['montant'] ?></strong></em> Dh</td>
                <td><?=$c['id_prod'] ?> - > <strong> <?=ucfirst($titre) ?></strong></td>
                <td><a class="btn btn-primary" href="commande.php?id=<?=$c['id'] ?>">Voir</a></td>
                <td><?=date("d M, h:i",strtotime($c['date_commande'])) ?></td>
            </tr>
                <?php }?>
            </tbody>
        </table>
    </li>
</ul>
</div>
</div>
