<?php

$reqUpdatemdp = $bdd->prepare('UPDATE salarie SET mot_de_passe = :mot_de_passe WHERE identifiant = "'.$identifiant.'" AND email = "'.$mail.'" ');
$reqUpdatemdp->execute(array('mot_de_passe' => md5($mdp)));

?>