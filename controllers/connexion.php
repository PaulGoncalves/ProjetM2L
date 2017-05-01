<?php
include('../model/connexionBdd.php');
session_start();

if(isset($_POST['formconnexion'])) {

    $identifiantconnect = htmlspecialchars($_POST['identifiant']);
    $mdpconnect = (md5(htmlspecialchars($_POST['mdp'])));

    if(!empty($identifiantconnect) AND !empty($mdpconnect)) {

        $requser = $bdd->prepare('SELECT * FROM salarie WHERE identifiant = ? AND mot_de_passe = ?');
        $requser->execute(array($identifiantconnect, $mdpconnect));
        $userexist = $requser->rowCount();

        if($userexist == 1) {

            $userinfo = $requser->fetch();

            $_SESSION['id_s'] = $userinfo['id_s'];
            $_SESSION['identifiant'] = $userinfo['identifiant'];
            $_SESSION['prenom'] = $userinfo['prenom'];
            $_SESSION['nom'] = $userinfo['nom'];
            $_SESSION['nbs_jour'] = $userinfo['nbs_jour'];
            $_SESSION['email'] = $userinfo['email'];
            $_SESSION['chef'] = $userinfo['chef'];
            $_SESSION['admin'] = $userinfo['admin'];

            if(isset($_POST['retenir_mdp'])) {
                setcookie('user_id', $userinfo['id_s'], time() + 10);
                header("Location: ../view/index.php?id_s=".$_SESSION['id_s']);
            } else {

                header("Location: ../view/index.php?id_s=".$_SESSION['id_s']);
                
                if($_SESSION['chef'] == 1) {

                    $userinfo = $requser->fetch();
                    header('Location: ../view/indexChef.php?id_s='.$_SESSION['id_s']);

                }elseif($_SESSION['admin'] == 1) {

                    $userinfo = $requser->fetch();
                    header('Location: ../view/dashboard.php?id_s='.$_SESSION['id_s']);
                }

            }

        } else {
            $message = '<p class="message_alerte">L\'identifiant ou le mot de passe est incorrect</p>';
        }

    } else {
        $message = '<p class="message_alerte">Tous les champs doivent être remplis</p>';

    }
}

?>