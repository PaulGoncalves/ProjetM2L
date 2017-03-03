<?php
include('connexionBdd.php');
session_start();

$type = 'Refusée';

$reqValidForm = $bdd->prepare('UPDATE type_formation SET type = :type WHERE id_s = '.$_GET['id_salarie'].' AND id_f = '.$_GET['id_formation']);
$reqValidForm->execute(array('type' => $type));

$idFormation = $_GET['id_formation'];

$reqRecupFormation = $bdd->query('SELECT * FROM formation WHERE id_f = '.$idFormation);
$donnees = $reqRecupFormation->fetch();

$nb_place = $donnees['nb_place'];
$nb_placeNew = $nb_place + 1;

$reqRetirPlace = $bdd->prepare('UPDATE formation SET nb_place = :nb_place WHERE id_f = '.$idFormation);
$reqRetirPlace->execute(array('nb_place' => $nb_placeNew));

header('Location: ../view/indexChef.php?id_s='.$_SESSION['id_s'].'#validFormations');

?>