<?php

require '../libraries/fpdf186/fpdf.php';


class PDF extends FPDF
{
    // Page header
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Recipe List', 0, 1, 'C');
        $this->Ln(10);
    }

    // Page footer
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }

    // Load data
    function LoadData()
    {
        return getAllRecipes(); // Assuming getAllRecipes() is a function in your recipe.php model
    }

    // Simple table
    function BasicTable($header, $data)
    {
        // Header
        foreach ($header as $col)
            $this->Cell(40, 7, $col, 1);
        $this->Ln();
        // Data
        foreach ($data as $row) {
            $this->Cell(40, 6, $row['name'], 1);
            $this->Cell(40, 6, $row['category'], 1);
            $this->Cell(40, 6, $row['ingredients'], 1);
            $this->Cell(40, 6, $row['instructions'], 1);
            $this->Ln();
        }
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$header = array('Name', 'Category', 'Ingredients', 'Instructions');
$data = $pdf->LoadData();
$pdf->SetFont('Arial', '', 14);
$pdf->AddPage();
$pdf->BasicTable($header, $data);
$pdf->Output('D', 'recipes.pdf'); // 'D' means download the file

exit();

?>