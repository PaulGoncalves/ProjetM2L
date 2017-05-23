<?php

$selectMdp = $bdd->prepare('SELECT COUNT(*) AS nbr FROM salarie WHERE mot_de_passe = :mot_de_passe AND id_s ='.$_SESSION['id_s']);
$selectMdp->bindValue('mot_de_passe',$mdp, PDO::PARAM_STR);
$selectMdp->execute();
$mdpDispo=($selectMdp->fetchColumn()==0)?1:0;
$selectMdp->CloseCursor();

?>