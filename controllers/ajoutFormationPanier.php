<?php
session_start();
include('../model/connexionBdd.php');

include('../model/reqAjoutPanier.php');

$coutformation = $donneesform['cout_jours'];
$creditdispo = $donneessalarie['nbs_jour'];
$idFormation = $_GET['id_f'];
$idSalarie = $_SESSION['id_s'];

$resteCredit = $creditdispo - $coutformation;

if($resteCredit >= 0) {

    $req = $bdd->query('SELECT * FROM type_formation WHERE id_f = '.$idFormation.' AND id_s = '.$idSalarie.' ORDER BY type ASC');
    $donneesType = $req->fetch();

    if(empty($donneesType['type']) || $donneesType['type'] == 'Refusée') {

        if($donneesform['nb_place'] > 0) {

            $type = 'En attente';

            include('../model/reqCreditAjout.php');

            $message = 'La formation à bien été ajoutée';

            header('Location: ../Formations/'.$_SESSION['id_s'].'-'.$message);

            if($donneessalarie['chef'] == 1) {

                header('Location: ../Formations-Chef/'.$_SESSION['id_s'].'-'.$message);

            }

        } else {
            $message = 'Il n\'y a plus de place pour cette formation';
            header('Location: ../Formations/'.$_SESSION['id_s'].'-'.$message);

            if($donneessalarie['chef'] == 1) {

                header('Location: ../Formations-Chef/'.$_SESSION['id_s'].'-'.$message);

            }
        }
    } elseif( $donneesType['type'] == 'Effectuée' ) {

        $message = 'Vous avez déjà effectué cette formation';
        header('Location: ../Formations/'.$_SESSION['id_s'].'-'.$message);

        if($donneessalarie['chef'] == 1) {

            header('Location: ../Formations-Chef/'.$_SESSION['id_s'].'-'.$message);

        }

    } elseif( $donneesType['type'] == "En attente" || $donneesType['type'] == "Validée" ) {
        $message = 'Vous avez déjà ajouté cette formation';
        header('Location: ../Formations/'.$_SESSION['id_s'].'-'.$message);

        if($donneessalarie['chef'] == 1) {

            header('Location: ../Formations-Chef/'.$_SESSION['id_s'].'-'.$message);

        }
    } else { 
        $message = 'Vous avez déjà ajouté cette formation';
        header('Location: ../Formations/'.$_SESSION['id_s'].'-'.$message);

        if($donneessalarie['chef'] == 1) {

            header('Location: ../Formations-Chef/'.$_SESSION['id_s'].'-'.$message);
        }
    }

} else {
    $message = 'Vous n\'avez pas assez de credits';
    header('Location: ../Formations'.$_SESSION['id_s'].'/'.$message);

    if($donneessalarie['chef'] == 1) {

        header('Location: ../Formations-Chef/'.$_SESSION['id_s'].'-'.$message);

    }
}

?>