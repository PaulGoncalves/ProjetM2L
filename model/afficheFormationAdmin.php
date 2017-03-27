<?php


if(isset($_POST['validRecherche'])) {

    $recherche = htmlspecialchars($_POST['search']);
    if(!empty($recherche)) {

        $req = $bdd->query('SELECT * FROM formation WHERE date_debut > CURDATE() AND titre LIKE "%'.$recherche.'%" OR date_debut > CURDATE() AND date_debut LIKE "%'.$recherche.'%" OR date_debut > CURDATE() AND nb_place LIKE "%'.$recherche.'%" OR date_debut > CURDATE() AND cout_jours LIKE "%'.$recherche.'%" OR date_debut > CURDATE() AND contenu LIKE "%'.$recherche.'%" ');

        if($donnee = $req->rowCount() > 0) {
            while($donnee = $req->fetch()) {
                echo '<tr id="'.$donnee['id_f'].'">
                        <td>'.$donnee['titre'].'</td>
                        <td align="center">'.$donnee['cout_jours'].'</td>
                        <td align="center">'.date("d/m/Y", strtotime($donnee['date_debut'])).'</td>
                        <td align="center">'.$donnee['nb_place'].'</td>
                        <td>'.$donnee['contenu'].'</td>
                        <td align="center"><a href="../view/detailFormationChef.php?id_s='.$_SESSION['id_s'].'.&id_f='.$donnee['id_f'].'">Afficher les details</a></td>
                        <td align="center"><a href="../controllers/ajoutFormationPanier.php?id_f='.$donnee['id_f'].'">Ajouter</a></td>
                        </tr>';
            }

            echo        '<tr>
                            <td align="center" colspan="7"><a href="../view/formationChef.php?id_s='.$_SESSION['id_s'].'">Réafficher toutes les formations</a></td>
                        </tr>';

        } else {
            echo '<tr>
                    <td align="center" colspan="7">Aucun résultat ne correspond à votre recherche<br /> <a href="../view/formationChef.php?id_s='.$_SESSION['id_s'].'">Réafficher toutes les formations</a></td>
                </tr>';
        } 
    } else {

        $reponse = $bdd->query('SELECT * FROM formation WHERE date_debut > CURDATE() AND nb_place >= 1 ORDER BY date_debut');

        while ($donneesformations = $reponse->fetch())
        { 

            echo '<tr id="'.$donneesformations['id_f'].'">
                    <td>'.$donneesformations['titre'].'</td>
                    <td align="center">'.$donneesformations['cout_jours'].'</td>
                    <td align="center">'.date("d/m/Y", strtotime($donneesformations['date_debut'])).'</td>
                    <td align="center">'.$donneesformations['nb_place'].'</td>
                    <td>'.$donneesformations['contenu'].'</td>
                    <td align="center"><a href="../view/detailFormationChef.php?id_s='.$_SESSION['id_s'].'.&id_f='.$donneesformations['id_f'].'">Afficher les details</a></td>
                    <td align="center"><a href="../controllers/ajoutFormationPanier.php?id_f='.$donneesformations['id_f'].'">Ajouter</a></td>
                </tr>';

        }
    }
} else {

    $reponse = $bdd->query('SELECT * FROM formation WHERE date_debut > CURDATE() AND nb_place >= 1 ORDER BY date_debut');

    while ($donneesformations = $reponse->fetch())
    { 

        echo '<tr id="'.$donneesformations['id_f'].'">
                <td>'.$donneesformations['titre'].'</td>
                <td align="center">'.$donneesformations['cout_jours'].'</td>
                <td align="center">'.date("d/m/Y", strtotime($donneesformations['date_debut'])).'</td>
                <td align="center">'.$donneesformations['nb_place'].'</td>
                <td>'.$donneesformations['contenu'].'</td>
                <td align="center"><a href="../view/detailFormationChef.php?id_s='.$_SESSION['id_s'].'.&id_f='.$donneesformations['id_f'].'">Afficher les details</a></td>
                <td align="center"><a href="../controllers/ajoutFormationPanier.php?id_f='.$donneesformations['id_f'].'">Ajouter</a></td>
            </tr>';

    }

}
?>