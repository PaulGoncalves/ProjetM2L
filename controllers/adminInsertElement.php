<?php
session_start();
include('../model/connexionBdd.php');

$titre = htmlspecialchars($_POST['titre']);
$cout = htmlspecialchars($_POST['cout_jours']);
$date_debut = htmlspecialchars($_POST['date_debut']);
$nb_place = htmlspecialchars($_POST['nb_place']);
$contenu = htmlspecialchars($_POST['contenu']);
$numero = htmlspecialchars($_POST['numero']);
$rue = htmlspecialchars($_POST['rue']);
$ville = htmlspecialchars($_POST['ville']);
$codePostal = htmlspecialchars($_POST['codePostal']);
$id_a = htmlspecialchars($_POST['adresse_complete']);

if(isset($_POST['validFormAdresseNew'])) {
    if(!empty($titre) AND ($cout) AND ($date_debut) AND ($nb_place) AND ($contenu) AND ($numero) AND ($rue) AND ($ville) AND ($codePostal)) {

        $dateActuelle = date('Y-m-d');

        if($dateActuelle < $date_debut){

            $reqAdresse = $bdd->prepare('INSERT INTO adresse(ville, rue, numero_rue, code_postal) VALUES(:ville, :rue, :numero_rue, :code_postal)');
            $reqAdresse->execute(array('ville' => $ville, 'rue' => $rue, 'numero_rue' => $numero, 'code_postal' => $codePostal));
            $id_a = $bdd->lastInsertId();

            $req = $bdd->prepare('INSERT INTO formation(titre, cout_jours, date_debut, nb_place, contenu, id_a) VALUES(:titre, :cout_jours, :date_debut, :nb_place, :contenu, :id_a)');
            $req->execute(array('titre' => $titre,'cout_jours' => $cout, 'date_debut' => $date_debut, 'nb_place' => $nb_place, 'contenu' => $contenu, 'id_a' => $id_a));
            $req->closeCursor();

            $message = 'La formation à bien été ajoutée';

            header('Location: ../view/indexAdmin.php?id_s='.$_SESSION['id_s']);
        } else {
            $message = 'La date d\'ajout de la formation n\'est pas valide';
        }

    } else {
        $message = 'Tous les champs doivent être remplis';
    }

}

if(isset($_POST['validFormAdresseExist'])) {

    if(!empty($titre) AND ($cout) AND ($date_debut) AND ($nb_place) AND ($contenu)) {

        $dateActuelle = date('Y-m-d');

        if($dateActuelle < $date_debut) {

            $req = $bdd->prepare('INSERT INTO formation(titre, cout_jours, date_debut, nb_place, contenu, id_a) VALUES(:titre, :cout_jours, :date_debut, :nb_place, :contenu, :id_a)');
            $req->execute(array('titre' => $titre,'cout_jours' => $cout, 'date_debut' => $date_debut, 'nb_place' => $nb_place, 'contenu' => $contenu, 'id_a' => $id_a));
            $req->closeCursor();

            $message = '<p class="vert-text font-18px" align="center">La formation à bien été ajoutée.</p>';

            header('Location: ../view/indexAdmin.php?id_s='.$_SESSION['id_s'].'&message='.$message);

        } else {
            $message = '<p class="rouge-text font-18px" align="center">La date d\'ajout de la formation n\'est pas valide.</p>';
            header('Location: ../view/indexAdmin.php?id_s='.$_SESSION['id_s'].'&message='.$message);
        }

    }  else {

        $message = '<p class="rouge-text font-18px" align="center">Tous les champs doivent être remplis.</p>';
        header('Location: ../view/indexAdmin.php?id_s='.$_SESSION['id_s'].'&message='.$message);
    }
}

?>