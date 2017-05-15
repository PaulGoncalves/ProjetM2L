
<?php
session_start();
require('../fpdf/fpdf.php');
include('../model/connexionBdd.php');

    $reqSalarie = $bdd->query('SELECT salarie.nom, salarie.prenom, salarie.nbs_jour, salarie.id_a, adresse.numero_rue, adresse.ville, adresse.rue, adresse.code_postal
                            FROM salarie
                            INNER JOIN adresse
                            ON salarie.id_a = adresse.id_a
                            WHERE salarie.id_s='.$_GET['id_s']);
$donneesSalarie = $reqSalarie->fetch();

    $reqFacture = $bdd->query('SELECT type_formation.id_f, type_formation.id_t, type_formation.type, type_formation.id_s, formation.titre,
                        formation.cout_jours,formation.date_debut, formation.nb_place, formation.contenu, formation.id_f, formation.id_a, salarie.nom, salarie.prenom, salarie.nbs_jour, adresse.numero_rue, adresse.ville, adresse.rue, adresse.code_postal
                        FROM formation 
                        INNER JOIN type_formation
                        ON formation.id_f = type_formation.id_f
                        INNER JOIN salarie
                        ON type_formation.id_s = salarie.id_s
                        INNER JOIN adresse
                        ON formation.id_a = adresse.id_a
                        WHERE salarie.id_s = '.$_GET['id_s'].' AND formation.id_f='.$_GET['id_f']);

$donnees = $reqFacture->fetch();

$nomFormation = $donnees['titre'];
$cout = $donnees['cout_jours'];
$numero = $donnees['numero_rue'];
$rue = $donnees['rue'];
$ville = $donnees['ville'];
$codePostal = $donnees['code_postal'];
$nomSalarie = $donneesSalarie['nom'];
$prenomSalarie = $donneesSalarie['prenom'];
$numeroSalarie = $donneesSalarie['numero_rue'];
$rueSalarie = $donneesSalarie['rue'];
$villeSalarie = $donneesSalarie['ville'];
$codePostalSalarie = $donneesSalarie['code_postal'];
$nbjoursSalarie = $donneesSalarie['nbs_jour'];




class PDF extends FPDF {
    // Header
    function Header() {

        global $nomFormation, $nomSalarie, $prenomSalarie, $cout, $ville, $codePostal, $rue, $numero, $numeroSalarie, $rueSalarie, $villeSalarie, $codePostalSalarie, $nbjoursSalarie;

        //Cadre Haut Gauche --> Prestataire
        $this->SetFont('Arial','',16); //Police
        $this->Cell(0,10, utf8_decode('Nom Prestataire'),0,0);
        $this->Ln(6);// Saut de ligne
        $this->SetFont('Arial','',12); //Police
        $this->Cell(0,10, utf8_decode($numero.' '.$rue),0,0);
        $this->Ln(5);// Saut de ligne
        $this->Cell(0,10, utf8_decode($codePostal.' '.$ville),0,0);
        $this->Ln(5);// Saut de ligne
        $this->Cell(0,10, utf8_decode('Tel : 06 06 06 06 06'),0,0);
        $this->Ln(5);// Saut de ligne
        $this->Cell(0,10, utf8_decode('Mail : nomprestataire@gmail.com'),0,0);
        $this->Ln(20);// Saut de ligne


        //Cadre droit nom salarie...
        $this->SetFont('Arial','',16);
        $this->SetDrawColor(0,0,0);
        $this->Cell(90); // Décalage
        $this->Cell(0,30,'',1,1);
        $this->Ln(-31);// Saut de ligne
        $this->Cell(100); // Décalage à droite
        $this->Cell(0,20,utf8_decode($nomSalarie.' '.$prenomSalarie),0,0);
        $this->Ln(12);// Saut de ligne
        $this->Cell(100); // Décalage à droite
        $this->SetFont('Arial','',12);
        $this->Cell(0,10,utf8_decode($numeroSalarie.' '.$rueSalarie),0,0);
        $this->Ln(6);// Saut de ligne
        $this->Cell(100); // Décalage à droite
        $this->Cell(0,10, utf8_decode($codePostalSalarie.' '.$villeSalarie),0,0);
        $this->Ln(30);// Saut de ligne


        //Tableau de la facture
        $this->SetFont('Arial','',14); //Police
        $this->Cell(0,10, utf8_decode('Désignation'),1,0);
        $this->Cell(-50); // Décalage à droite
        $this->Cell(0,10, utf8_decode('Prix (Total)'),1,0);
        $this->Line(150, 100, 150, 250);
        $this->Line(10, 100, 10, 250);
        $this->Line(200, 100, 200, 250);
        $this->Line(10, 250, 200, 250);

        //Texte de la facture
        $this->SetFont('Arial','',12); //Police
        $this->Ln(18);// Saut de ligne
        $this->Cell(5); // Décalage à droite
        $this->Cell(0,10, utf8_decode($nomFormation),0,0);
        $this->Cell(-48); // Décalage à droite
        $this->Cell(0,10, utf8_decode($cout.' credits'),0,0);

        //Cadre TOTAL
        $this->Ln(135);// Saut de ligne
        $this->Cell(100); // Décalage à droite
        $this->Cell(0,10, utf8_decode('Total (En Nb jour)'),1,0);
        $this->Line(150, 251, 150, 261);
        $this->Cell(-48); // Décalage à droite
        $this->Cell(0,10, utf8_decode($cout.' credits'),0,0);
        
        $this->Ln(12);// Saut de ligne
        $this->Cell(100); // Décalage à droite
        $this->Cell(0,10, utf8_decode('Solde actuel'),1,0);
        $this->Line(150, 263, 150, 273);
        $this->Cell(-48); // Décalage à droite
        $this->Cell(0,10, utf8_decode($nbjoursSalarie.' credits'),0,0);



    }

    function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->SetY(-15);
        // Select Arial italic 8
        $this->SetFont('Arial','I',8);
        // Print centered page number
        $this->Cell(0,10, utf8_decode('Cette Facture a été généré automatiquement par le site intranet de la M2L. En cas de problème contactez l\'administrateur du site.'),0,0,'C');
    }
}



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('');
$pdf->SetFont('Times','',12);
$pdf->Cell(40,10);
$pdf->Output();







echo $message;


?>
