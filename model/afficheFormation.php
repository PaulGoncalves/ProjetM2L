<?php

$reponse = $bdd->query('SELECT * FROM formation WHERE date_debut > CURDATE() AND nb_place >= 1 ORDER BY date_debut');

while ($donneesformations = $reponse->fetch())
{ 
  
 echo '<tr id="'.$donneesformations['id_f'].'">
        <td>'.$donneesformations['titre'].'</td>
        <td align="center">'.$donneesformations['cout_jours'].'</td>
        <td align="center">'.date("d/m/Y", strtotime($donneesformations['date_debut'])).'</td>
        <td align="center">'.$donneesformations['nb_place'].'</td>
        <td>'.$donneesformations['contenu'].'</td>
        <td align="center"><a href="../Détail-Formation/'.$_SESSION['id_s'].'/Formation-'.$donneesformations['id_f'].'">Afficher les details</a></td>
        <td align="center"><a href="../controllers/ajoutFormationPanier.php?id_f='.$donneesformations['id_f'].'">Ajouter</a></td>
    </tr>';
    
}
$reponse->closeCursor();
?>