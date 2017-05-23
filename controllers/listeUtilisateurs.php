<?php

include('../model/listeUtilisateurs.php');

while($donnees = $reqUtilisateurs->fetch()) {

   
    
    echo '<tr>
        <td>'.$donnees['nom'].'</td>
        <td>'.$donnees['prenom'].'</td>
        <td>'.$donnees['identifiant'].'</td>
        <td>'.$donnees['email'].'</td>
        <td>'.$donnees['nbs_jour'].'</td>
        <td>';?> <?php if($donnees['chef'] == 1) { echo 'chef'; } elseif($donnees['admin'] == 1) { echo 'administatreur'; } else { echo 'salarié'; } ?> <?php echo '</td>
    </tr>';

}

?>