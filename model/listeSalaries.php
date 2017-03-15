<?php

$requser = $bdd->query('SELECT * FROM salarie WHERE chef = 0 AND admin = 0 ORDER BY id_s');


while($donnees = $requser->fetch()) {
    echo '<tr>
            <td>'.$donnees['nom'].'</td>
            <td>'.$donnees['prenom'].'</td>
            <td>'.$donnees['identifiant'].'</td>
            <td>'.$donnees['email'].'</td>
            <td>'.$donnees['nbs_jour'].' jours</td>
        <tr>';
}

?>