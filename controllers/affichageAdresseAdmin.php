<?php
$reqq = $bdd->query('SELECT * FROM adresse');


        while($adresse = $reqq->fetch()) {
            echo '<option value="'.$adresse['id_a'].'">'.$adresse['numero_rue'].' '.$adresse['rue'].', '.$adresse['code_postal'].' '.$adresse['ville'].'</option>';
        }
?>