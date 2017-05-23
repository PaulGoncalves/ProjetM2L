<?php

$reqMdp = $bdd->prepare('UPDATE salarie SET mot_de_passe = :mot_de_passe WHERE id_s = :id_s');
$reqMdp->execute(array('mot_de_passe' => $mdp, 'id_s' => $_SESSION['id_s']));

?>