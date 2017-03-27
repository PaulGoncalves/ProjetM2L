<?php

include('../model/listeSalaries.php');

while($donnees = $requser->fetch()) {
    echo '<tr>
            <td>'.$donnees['nom'].'</td>
            <td>'.$donnees['prenom'].'</td>
            <td>'.$donnees['identifiant'].'</td>
            <td>'.$donnees['email'].'</td>
            <td>'.$donnees['nbs_jour'].' jours</td>
            <td> Salarié </td>
        <tr>';
}

?>