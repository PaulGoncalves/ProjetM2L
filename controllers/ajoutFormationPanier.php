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

    if(empty($donneesType['type']) || $donneesType['type'] == 'Refusée') {
        
        if($donneesform['nb_place'] > 0) {

            $type = 'En attente';

            include('../model/reqCreditAjout.php');
            
            $message = '<p class="vert-text font-18px"><b>La formation à bien été ajoutée</b></p>';

            header('Location: ../view/Formations?id_s='.$_SESSION['id_s'].'&message='.$message);
            
        } else {
            $message = '<p class="rouge-text font-18px"><b>Il n\'y a plus de place pour cette formation</b></p>';
            header('Location: ../view/Formations?id_s='.$_SESSION['id_s'].'&message='.$message);
        }
    } else {
        $message = '<p class="rouge-text font-18px"><b>Vous avez déjà ajouté cette formation</b></p>';
        header('Location: ../view/Formations?id_s='.$_SESSION['id_s'].'&message='.$message);
    }

} else {
    $message = '<p class="rouge-text font-18px"><b>Vous n\'avez pas assez de credits</b><p/>';
    header('Location: ../view/Formations?id_s='.$_SESSION['id_s'].'&message='.$message);
}

?>