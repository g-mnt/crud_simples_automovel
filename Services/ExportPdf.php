<?php
require('fpdf/fpdf.php');

class PDF extends FPDF{
    function BasicTable($header, $data){
        // Header
        foreach($header as $col){
            if($col == '#'){
                $this->Cell(10,7,$col,1,0,'C');
            }else{
                $this->Cell(38,7,$col,1,0,'C');
            }
        }
        $this->Ln();
        // Data
        foreach($data as $row)
        {
            foreach($row as $key => $col)
            if($key == 'AutoMovelId'){
                $this->Cell(10,6,$col,1,0,'C');
            }else{
                $this->Cell(38,6,$col,1,0,'C');
            }
            $this->Ln();
        }
    }
}

?>
