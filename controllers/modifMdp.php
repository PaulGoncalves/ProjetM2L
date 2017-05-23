<?php
session_start();

include('../model/connexionBdd.php');

if($_POST['validFormMdp']) {

    $ancienMdp = htmlspecialchars($_POST['ancienMdp']);
    $mdp = htmlspecialchars($_POST['mdp']);
    $mdp2 = htmlspecialchars($_POST['mdp2']);

    if(!empty($mdp) AND !empty($ancienMdp) AND !empty($mdp2)) {

        include('../model/infoSalarie.php');

        $mdpBdd = $userinfo['mot_de_passe'];

        $ancienMdp = md5($ancienMdp);

        if($ancienMdp == $mdpBdd) {

            if($mdp == $mdp2) {

                if (preg_match("#^[a-zA-ZéèêëùàîïöôËÄÖÜÊÂÔÛ0-9]{6,24}+$#", $mdp)) {

                    $mdp = md5($mdp);

                    include('../model/verifMdpExist.php');

                    if($mdpDispo) {

                        include('../model/MAJMdp.php');
                        $message = 'Votre mot de passe a bien été mise a jour';
                        header('Location: ../view/profil.php?id_s='.$_SESSION['id_s'].'&message='.$message);

                    } else {

                        $message = 'Votre nouveau mot de passe ne peut pas être identique à l\'ancien';
                        header('Location: ../view/profil.php?id_s='.$_SESSION['id_s'].'&message='.$message);

                    }

                } else {

                    $message = 'Le mot de passe n\'est pas valide ( Il doit comporter entre 6 et 24 caractères, les caractères spéciaux ne sont pas autorisés )';
                    header('Location: ../view/profil.php?id_s='.$_SESSION['id_s'].'&message='.$message);

                }

            } else {

                $message = 'Les deux nouveaux mot de passe ne sont pas identiques';
                header('Location: ../view/profil.php?id_s='.$_SESSION['id_s'].'&message='.$message);
            }

        } else {

            $message = 'L\'ancien mot de passe n\'est pas correct';
            header('Location: ../view/profil.php?id_s='.$_SESSION['id_s'].'&message='.$message);

        }

    } else {

        $message = 'Vous n\'avez pas remplis tous les champs';
        header('Location: ../view/profil.php?id_s='.$_SESSION['id_s'].'&message='.$message);
    }

}


?>