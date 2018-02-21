<?php

require('assets/fpdf/fpdf.php');

$req = recup_pour_facture_pdf($_GET['id_s'], $_GET['id_f']);

$donnees = $req->fetch();

$nomFormation = $donnees['titre'];
$cout = $donnees['nb_jour'];
$numero = $donnees['numero'];
$rue = $donnees['rue'];
$ville = $donnees['ville'];
$codePostal = $donnees['code_postal'];
$nomSalarie = $donnees['nom'];
$prenomSalarie = $donnees['prenom'];
$nbjoursSalarie = $donnees['credits'];
$PrestTel = $donnees['tel'];
$PrestMail = $donnees['mail'];
$PrestNom = $donnees['p_nom'];

class PDF extends FPDF {
    // Header
    function Header() {
        global $nomFormation, $nomSalarie, $prenomSalarie, $cout, $ville, $codePostal, $rue, $numero, $numeroSalarie, $rueSalarie, $villeSalarie, $codePostalSalarie, $nbjoursSalarie, $PrestMail, $PrestNom, $PrestTel;
        //Cadre Haut Gauche --> Prestataire
        $this->SetFont('Arial','',16); //Police
        $this->Cell(0,10, utf8_decode($PrestNom),0,0);
        $this->Ln(6);// Saut de ligne
        $this->SetFont('Arial','',12); //Police
        $this->Cell(0,10, utf8_decode($numero.' '.$rue),0,0);
        $this->Ln(5);// Saut de ligne
        $this->Cell(0,10, utf8_decode($codePostal.' '.$ville),0,0);
        $this->Ln(5);// Saut de ligne
        $this->Cell(0,10, utf8_decode('Tel : '.$PrestTel),0,0);
        $this->Ln(5);// Saut de ligne
        $this->Cell(0,10, utf8_decode('Mail : '.$PrestMail),0,0);
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
        $this->Cell(0,10, utf8_decode($cout.' crédits'),0,0);
        //Cadre TOTAL
        $this->Ln(135);// Saut de ligne
        $this->Cell(100); // Décalage à droite
        $this->Cell(0,10, utf8_decode('Total (En Nb jour)'),1,0);
        $this->Line(150, 251, 150, 261);
        $this->Cell(-48); // Décalage à droite
        $this->Cell(0,10, utf8_decode($cout.' crédits'),0,0);

        $this->Ln(12);// Saut de ligne
        $this->Cell(100); // Décalage à droite
        $this->Cell(0,10, utf8_decode('Solde actuel'),1,0);
        $this->Line(150, 263, 150, 273);
        $this->Cell(-48); // Décalage à droite
        $this->Cell(0,10, utf8_decode($nbjoursSalarie.' crédits'),0,0);
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

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->SetTitle('Facture');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Output('Facture-'.utf8_decode($nomSalarie.'-'.$prenomSalarie.'-Formation-'.$nomFormation.'-'.$_GET['date']), 'I');

?>