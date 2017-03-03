<?php
include('../model/connexionbdd.php');

$insertType = $bdd->prepare('INSERT INTO type_formation(type, id_f, id_s) VALUES(?, ?, ?)');
$insertType->execute(array($type, $idFormation, $idSalarie));

$reqCredit = $bdd->prepare('UPDATE salarie SET nbs_jour =:nbs_jour WHERE id_s = '.$_SESSION['id_s']);
$reqCredit->execute(array('nbs_jour' => $resteCredit));

$reqRecupFormation = $bdd->query('SELECT * FROM formation WHERE id_f = '.$idFormation);
$donnees = $reqRecupFormation->fetch();

$nb_place = $donnees['nb_place'];
$nb_placeNew = $nb_place - 1;


$reqRetirPlace = $bdd->prepare('UPDATE formation SET nb_place = :nb_place WHERE id_f = '.$idFormation);
$reqRetirPlace->execute(array('nb_place' => $nb_placeNew));

?>