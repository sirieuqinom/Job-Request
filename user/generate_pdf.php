<?php
    session_start();
    $sess = $_SESSION['EMAIL'];
    ob_end_clean();
    
    require_once 'FPDI/src/autoload.php';
    require_once 'FPDI/src/Fpdi.php';

    require_once 'fpdf/fpdf.php';
    require_once 'config.php';
    $sql = "SELECT * FROM requests where email ='$sess'";
    $data = mysqli_query($con,$sql);
    

    if(isset($_POST['btn_pdf']))
    {
        $row = mysqli_fetch_assoc($data);

        $pdf = new FPDI();
        $pdf->AddPage();
        
        $pagecount = $pdf->setSourceFile('request.pdf');
        
        $tplIdx = $pdf->importPage(1);
        $pdf->useTemplate($tplIdx);
        $pdf->useTemplate($tplIdx, 0, 0, 0, 0, true);   
        
        $pdf->SetFont('Arial','B','10');
        $pdf->cell('18','12', 'Request: ', '0');
        $pdf->cell('18','12', $row['request'], '0');
        $pdf->Ln(5);
        $pdf->cell('12','12', 'Date: ', '0', 'C');
        $pdf->cell('0','12', $row['dates'], '0');
        $pdf->Ln(5);
        $pdf->cell('14','12', 'Email: ', '0', 'C');
        $pdf->cell('0','12', $row['email'], '0');
        $pdf->Ln(5); 
        $pdf->Output("transaction_pdf", "F");
  }