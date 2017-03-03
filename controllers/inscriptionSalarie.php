<?php

try{
    $bdd = new PDO('mysql:host=localhost;dbname=m2l;charset=utf8', 'root', '');
}catch(PDOException $e){
    die('Erreur : '.$e->getMessage());
}

session_start();

if(isset($_POST['ValidInscription'])) {
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['identifiant']) AND !empty($_POST['mot_de_passe']) AND !empty($_POST['nb_jours'])) {

        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $identifiant = htmlspecialchars($_POST['identifiant']);
        $mdp = (md5(htmlspecialchars($_POST['mot_de_passe'])));
        $nb_jours = htmlspecialchars($_POST['nb_jours']);
        $chefEquipe = $_POST['ChefEquipe'];
        $Admin = $_POST['Admin'];

        $insertsalarie = $bdd->prepare('INSERT INTO salarie (nom, prenom, email, identifiant, mot_de_passe, nbs_jour, chef, admin)VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
        $insertsalarie->execute(array($nom, $prenom, $email, $identifiant, $mdp, $nb_jours, $chefEquipe, $Admin));
        $_SESSION['message'] = '<p align="center" style="color:green;">L\'utilisateur a bien été ajouté.</p>';
        /*header('Location: ../view/indexAdmin?id_s='.$_SESSION['id_s']);*/
        
        echo $chefEquipe;
        echo $Admin;

    } else {
        $_SESSION['message'] = '<p align="center" style="color:red;">Vous devez remplir tous les champs.</p>';
        /*header('Location: ../view/indexAdmin?id_s='.$_SESSION['id_s']);*/
    }
}

?>