<?php
session_start();
include('../model/connexionBdd.php');

$titre = htmlspecialchars($_POST['titre']);
$cout = htmlspecialchars($_POST['cout_jours']);
$date_debut = htmlspecialchars($_POST['date_debut']);
$nb_place = htmlspecialchars($_POST['nb_place']);
$contenu = htmlspecialchars($_POST['contenu']);

if(isset($_POST['validForm'])) {
    if(!empty($titre) AND ($cout) AND ($date_debut) AND ($nb_place) AND ($contenu)) {
        
        $dateActuelle = date('Y-m-d');
        
        if($dateActuelle < $date_debut){
            
        $req = $bdd->prepare('INSERT INTO formation(titre, cout_jours, date_debut, nb_place, contenu) VALUES(:titre, :cout_jours, :date_debut, :nb_place, :contenu)');
        $req->execute(array('titre' => $titre,'cout_jours' => $cout, 'date_debut' => $date_debut, 'nb_place' => $nb_place, 'contenu' => $contenu));
        $req->closeCursor();

        $message = 'La formation à bien été ajoutée';

        header('Location: ../view/formationChef.php?id_s='.$_SESSION['id_s']);
    } else {
        $message = 'La date d\'ajout de la formation n\'est pas valide';
    }

    } else {
        $message = 'Tous les champs doivent être remplis';
    }



}

echo $message;

?>