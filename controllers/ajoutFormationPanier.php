<?php
session_start();
include('../model/connexionbdd.php');

include('../model/reqAjoutPanier.php');

$coutformation = $donneesform['cout_jours'];
$creditdispo = $donneessalarie['nbs_jour'];
$idFormation = $_GET['id_f'];
$idSalarie = $_SESSION['id_s'];

$resteCredit = $creditdispo - $coutformation;

if($resteCredit >= 0) {
    
    $req = $bdd->query('SELECT * FROM type_formation WHERE id_f = '.$idFormation.' AND id_s = '.$idSalarie);
    $donneesType = $req->fetch();

    if(empty($donneesType['type'])) {

        $type = 'En attente';

        include('../model/reqCreditAjout.php');

        header('Location: ../view/Formations?id_s='.$_SESSION['id_s']);
    } else {
        $message = 'Formation déjà ajoutée';
        header('Location: ../view/Formations?id_s='.$_SESSION['id_s'].'&message='.$message);
    }

} else {
    echo 'Pas asser de credits';
}

?>