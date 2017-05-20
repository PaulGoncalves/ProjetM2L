<?php
$reqq = $bdd->query('SELECT * FROM prestataire');


        while($prestataire = $reqq->fetch()) {
            echo '<option value="'.$prestataire['id_p'].'">'.$prestataire['raison_social'].', Tel: '.$prestataire['telephone'].', Mail: '.$prestataire['mail'].'</option>';
        }
?>