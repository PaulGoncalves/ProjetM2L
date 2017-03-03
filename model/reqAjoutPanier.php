<?php
$reqajout = $bdd->query('SELECT * FROM formation WHERE id_f = '.$_GET['id_f']);
$donneesform = $reqajout->fetch();

$reqsalarie = $bdd->query('SELECT * FROM salarie WHERE id_s = '.$_SESSION['id_s']);
$donneessalarie = $reqsalarie->fetch();
?>