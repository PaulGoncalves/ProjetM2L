<?php
include('connexionBdd.php');
session_start();

$type = 'Validée';

$reqValidForm = $bdd->prepare('UPDATE type_formation SET type = :type WHERE id_s = '.$_GET['id_salarie'].' AND id_f = '.$_GET['id_formation']);
$reqValidForm->execute(array('type' => $type));

header('Location: ../view/indexChef.php?id_s='.$_SESSION['id_s'].'#validFormations');

?>