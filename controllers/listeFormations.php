<?php

include('../model/listeFormations.php');

while($donnees = $reqFormations->fetch()) {

   
    
    echo '<tr>
        <td>'.$donnees['titre'].'</td>
        <td>'.$donnees['nb_place'].'</td>
        <td>'.$donnees['cout_jours'].'</td>
        <td>'.$donnees['contenu'].'</td>
        <td>'.$donnees['date_debut'].'</td>
    </tr>';

}

?>