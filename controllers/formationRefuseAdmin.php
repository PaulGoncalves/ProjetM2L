<?php
include('../model/connexionBdd.php');

include('../model/formationRefuseAdmin.php');

if($donnees = $reqValid->fetch() > 0) {

    while($donnees = $reqValid->fetch()) {
        echo '<tr>
            <td>'.$donnees['titre'].'</td>
            <td>'.date("d/m/Y", strtotime($donnees['date_debut'])).'</td>
            <td>'.$donnees['nom'].'</td>
            <td>'.$donnees['prenom'].'</td>
            <td><p class="rouge-text"><i class="fa fa-window-close-o" aria-hidden="true"></i> '.$donnees['type'].'</p></td>
        </tr>';
    }

} else {

    $message = '<p  class="textFormationNone"  align="center">Vous n\'avez refusé aucune formation</p>';
    echo '<tr>
            <td class="textFormationNone" COLSPAN=4>'.$message.'</td>
        </tr>';

}

?>