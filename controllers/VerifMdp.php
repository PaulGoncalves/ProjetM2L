<?php

include('../model/connexionBdd.php');


if(isset($_POST['validFormMdp'])) {

    $mail = htmlspecialchars($_POST['mail']);
    $identifiant = htmlspecialchars($_POST['identifiant']);

    include('../model/RecupInfoSalarieMdp.php');

    if(!empty($mail) AND !empty($identifiant)) {

        if($mailexist) {

            include('../model/ReqMdp.php');

            if($mail == $donnees['email'] AND $identifiant == $donnees['identifiant']) {

                include('../controllers/envoiemail.php');


                include('../model/UpdateMdp.php');

                $message = 'Nouveau mot de passe envoyer sur votre boite mail';

            } else {
                $message = "L'adresse email et l'identifiant ne correspondent pas";
            }

        } else {
            $message = "L'adresse email n'existe pas";
        }
    } else {
        $message = "Veuillez remplir tous les champs";
    }
}

?>