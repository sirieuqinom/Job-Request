<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    session_start();
    ob_end_clean();
    require_once('vendor/autoload.php');
    require_once 'config.php';
    $ayedee = $_SESSION['ID'];
    
    use setasign\Fpdi\Fpdi;

    
    $query  = "SELECT * FROM users WHERE id = $ayedee ";
    $result = $con->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
        
      $uid =  $row['user_id'];
      $uoc =  $row['user_office_course'];
      if(empty($row['bio_num'])){
          $bm = "";
      }
      else{
          $bm = $row['bio_num'];
      }
      
    }

if(isset($_POST['btn_pdf']))
    {

    $id = $_POST['hidden-id'];

    $sql = "SELECT * FROM requests where id = '$id'";
    $data = mysqli_query($con,$sql);

 
        $row = mysqli_fetch_assoc($data);
        $pdf = new Fpdi('P','mm', array(330,220));
        $pdf->AddPage();
        $pdf->setSourceFile("request.pdf");
        $tplId = $pdf->importPage(1);
        $pdf->useTemplate($tplId);
        $pdf->SetFont('Arial','B','10');
        
        $pdf->Cell(143);
        $pdf->cell('0','77', $row["date_submitted"], '0');
        $pdf->Ln(); 

        switch($row["request"]){
            case 1:
                $pdf->Cell(21.5);
                $pdf->cell('0','1', "/", '0');
                $pdf->Ln();
                $pdf->Cell(100);
                $pdf->cell('0','-3', $row["dates"], '0');
                $pdf->Ln(88);
                $pdf->Cell(23);
                $pdf->cell('0','0', $_SESSION["NAME"], '0');
                $pdf->Ln(12);
                $pdf->Cell(32);
                $pdf->cell('0','0', $uid, '0');
                $pdf->Ln(4.5);
                $pdf->Cell(40);
                $pdf->cell('0','0', $uoc, '0');
                $pdf->Ln(8);
                $pdf->Cell(60);
                $pdf->cell('0','0', $bm, '0');
                $pdf->Ln(49);
                $pdf->Cell(125);
                $pdf->cell('0','0', $row["accepted_by"], '0');
                $pdf->Ln(9);
                $pdf->Cell(130);
                $pdf->cell('0','0', $row["date_accepted"], '0');
                $pdf->Ln(33);
                $pdf->Cell(20);
                $pdf->cell('0','0', $row["accepted_by"], '0');
                $pdf->Ln();
                $pdf->Cell(125);
                $pdf->cell('0','0', $_SESSION["NAME"], '0');
                $pdf->Ln(8.5);
                $pdf->Cell(25);
                $pdf->cell('0','0', $row["date_modified"], '0');
                $pdf->Ln();
                $pdf->Cell(125);
                $pdf->cell('0','0', $row["date_modified"], '0');
                break;
            case 2:
                $pdf->Cell(21.5);
                $pdf->cell('0','9', "/", '0');
                $pdf->Ln();
                $pdf->Cell(104);
                $pdf->cell('0','-10', $row["dates"], '0');
                $pdf->Ln(80);
                $pdf->Cell(23);
                $pdf->cell('0','0', $_SESSION["NAME"], '0');
                $pdf->Ln(12);
                $pdf->Cell(32);
                $pdf->cell('0','0', $uid, '0');
                $pdf->Ln(4.5);
                $pdf->Cell(40);
                $pdf->cell('0','0', $uoc, '0');
                $pdf->Ln(8);
                $pdf->Cell(60);
                $pdf->cell('0','0', $bm, '0');
                $pdf->Ln(49);
                $pdf->Cell(125);
                $pdf->cell('0','0', $row["accepted_by"], '0');
                $pdf->Ln(9);
                $pdf->Cell(130);
                $pdf->cell('0','0', $row["date_accepted"], '0');
                $pdf->Ln(33);
                $pdf->Cell(20);
                $pdf->cell('0','0', $row["accepted_by"], '0');
                $pdf->Ln();
                $pdf->Cell(125);
                $pdf->cell('0','0', $_SESSION["NAME"], '0');
                $pdf->Ln(8.5);
                $pdf->Cell(25);
                $pdf->cell('0','0', $row["date_modified"], '0');
                $pdf->Ln();
                $pdf->Cell(125);
                $pdf->cell('0','0', $row["date_modified"], '0');
                break;
            case 3:
                $pdf->Cell(21.5);
                $pdf->cell('0','17', "/", '0');
                $pdf->Ln();
                switch($row["account_type"]){
                    case 'TUP Portal':
                        $pdf->Cell(33);
                        $pdf->cell('0','-9', "/", '0');
                        break;
                    case 'TUP Official Email':
                        $pdf->Cell(58.5);
                        $pdf->cell('0','-9', "/", '0');
                        break;
                    case 'TUP Web ERS':
                        $pdf->Cell(96.5);
                        $pdf->cell('0','-9', "/", '0');
                        break;
                    default:
                        $pdf->Cell(147.3);
                        $pdf->cell('0','-9', "/", '0');
                        break;
                }
                $pdf->Ln(72);
                $pdf->Cell(23);
                $pdf->cell('0','0', $_SESSION["NAME"], '0');
                $pdf->Ln(12);
                $pdf->Cell(32);
                $pdf->cell('0','0', $uid, '0');
                $pdf->Ln(4.5);
                $pdf->Cell(40);
                $pdf->cell('0','0', $uoc, '0');
                $pdf->Ln(8);
                $pdf->Cell(60);
                $pdf->cell('0','0', $bm, '0');
                $pdf->Ln(49);
                $pdf->Cell(125);
                $pdf->cell('0','0', $row["accepted_by"], '0');
                $pdf->Ln(9);
                $pdf->Cell(130);
                $pdf->cell('0','0', $row["date_accepted"], '0');
                $pdf->Ln(33);
                $pdf->Cell(20);
                $pdf->cell('0','0', $row["accepted_by"], '0');
                $pdf->Ln();
                $pdf->Cell(125);
                $pdf->cell('0','0', $_SESSION["NAME"], '0');
                $pdf->Ln(8.5);
                $pdf->Cell(25);
                $pdf->cell('0','0', $row["date_modified"], '0');
                $pdf->Ln();
                $pdf->Cell(125);
                $pdf->cell('0','0', $row["date_modified"], '0');
                break;
            case 4:
                $pdf->Cell(21.5);
                $pdf->cell('0','41.5', "/", '0');
                $pdf->Ln();
                $pdf->Cell(95);
                $pdf->cell('0','-41.5', $row["dept"], '0');
                $pdf->Ln(47.5);
                $pdf->Cell(23);
                $pdf->cell('0','0', $_SESSION["NAME"], '0');
                $pdf->Ln(12);
                $pdf->Cell(32);
                $pdf->cell('0','0', $uid, '0');
                $pdf->Ln(4.5);
                $pdf->Cell(40);
                $pdf->cell('0','0', $uoc, '0');
                $pdf->Ln(8);
                $pdf->Cell(60);
                $pdf->cell('0','0', $bm, '0');
                $pdf->Ln(49);
                $pdf->Cell(125);
                $pdf->cell('0','0', $row["accepted_by"], '0');
                $pdf->Ln(9);
                $pdf->Cell(130);
                $pdf->cell('0','0', $row["date_accepted"], '0');
                $pdf->Ln(33);
                $pdf->Cell(20);
                $pdf->cell('0','0', $row["accepted_by"], '0');
                $pdf->Ln();
                $pdf->Cell(125);
                $pdf->cell('0','0', $_SESSION["NAME"], '0');
                $pdf->Ln(8.5);
                $pdf->Cell(25);
                $pdf->cell('0','0', $row["date_modified"], '0');
                $pdf->Ln();
                $pdf->Cell(125);
                $pdf->cell('0','0', $row["date_modified"], '0');
                break;
            case 5:
                $pdf->Cell(21.5);
                $pdf->cell('0','50', "/", '0');
                $pdf->Ln();
                $pdf->Cell(60);
                $pdf->cell('0','-26.5', $row["software"], '0');
                $pdf->Ln();
                $pdf->Cell(105);
                $pdf->cell('0','35', $row["dept"], '0');
                $pdf->Ln(65.5);
                $pdf->Cell(23);
                $pdf->cell('0','0', $_SESSION["NAME"], '0');
                $pdf->Ln(12);
                $pdf->Cell(32);
                $pdf->cell('0','0', $uid, '0');
                $pdf->Ln(4.5);
                $pdf->Cell(40);
                $pdf->cell('0','0', $uoc, '0');
                $pdf->Ln(8);
                $pdf->Cell(60);
                $pdf->cell('0','0', $bm, '0');
                $pdf->Ln(49);
                $pdf->Cell(125);
                $pdf->cell('0','0', $row["accepted_by"], '0');
                $pdf->Ln(9);
                $pdf->Cell(130);
                $pdf->cell('0','0', $row["date_accepted"], '0');
                $pdf->Ln(33);
                $pdf->Cell(20);
                $pdf->cell('0','0', $row["accepted_by"], '0');
                $pdf->Ln();
                $pdf->Cell(125);
                $pdf->cell('0','0', $_SESSION["NAME"], '0');
                $pdf->Ln(8.5);
                $pdf->Cell(25);
                $pdf->cell('0','0', $row["date_modified"], '0');
                $pdf->Ln();
                $pdf->Cell(125);
                $pdf->cell('0','0', $row["date_modified"], '0');
                break;
            case 6:
                $pdf->Cell(21.5);
                $pdf->cell('0','98', "/", '0');
                $pdf->Ln();
                $pdf->Cell(70);
                $pdf->cell('0','-98', $row["dept"], '0');
                $pdf->Ln(-9);
                $pdf->Cell(23);
                $pdf->cell('0','0', $_SESSION["NAME"], '0');
                $pdf->Ln(12);
                $pdf->Cell(32);
                $pdf->cell('0','0', $uid, '0');
                $pdf->Ln(4.5);
                $pdf->Cell(40);
                $pdf->cell('0','0', $uoc, '0');
                $pdf->Ln(8);
                $pdf->Cell(60);
                $pdf->cell('0','0', $bm, '0');
                $pdf->Ln(49);
                $pdf->Cell(125);
                $pdf->cell('0','0', $row["accepted_by"], '0');
                $pdf->Ln(9);
                $pdf->Cell(130);
                $pdf->cell('0','0', $row["date_accepted"], '0');
                $pdf->Ln(33);
                $pdf->Cell(20);
                $pdf->cell('0','0', $row["accepted_by"], '0');
                $pdf->Ln();
                $pdf->Cell(125);
                $pdf->cell('0','0', $_SESSION["NAME"], '0');
                $pdf->Ln(8.5);
                $pdf->Cell(25);
                $pdf->cell('0','0', $row["date_modified"], '0');
                $pdf->Ln();
                $pdf->Cell(125);
                $pdf->cell('0','0', $row["date_modified"], '0');
                break;
            case 7:
                $pdf->Cell(21.5);
                $pdf->cell('0','106', "/", '0');
                $pdf->Ln(89);
                $pdf->Cell(23);
                $pdf->cell('0','0', $_SESSION["NAME"], '0');
                $pdf->Ln(12);
                $pdf->Cell(32);
                $pdf->cell('0','0', $uid, '0');
                $pdf->Ln(4.5);
                $pdf->Cell(40);
                $pdf->cell('0','0', $uoc, '0');
                $pdf->Ln(8);
                $pdf->Cell(60);
                $pdf->cell('0','0', $bm, '0');
                $pdf->Ln(49);
                $pdf->Cell(125);
                $pdf->cell('0','0', $row["accepted_by"], '0');
                $pdf->Ln(9);
                $pdf->Cell(130);
                $pdf->cell('0','0', $row["date_accepted"], '0');
                $pdf->Ln(33);
                $pdf->Cell(20);
                $pdf->cell('0','0', $row["accepted_by"], '0');
                $pdf->Ln();
                $pdf->Cell(125);
                $pdf->cell('0','0', $_SESSION["NAME"], '0');
                $pdf->Ln(8.5);
                $pdf->Cell(25);
                $pdf->cell('0','0', $row["date_modified"], '0');
                $pdf->Ln();
                $pdf->Cell(125);
                $pdf->cell('0','0', $row["date_modified"], '0');
                break;
            case 8:
                $pdf->Cell(21.5);
                $pdf->cell('0','114', "/", '0');
                $pdf->Ln();
                $pdf->Cell(95);
                $pdf->cell('0','-106', $row["problem"], '0');
                $pdf->Ln(-25);
                $pdf->Cell(23);
                $pdf->cell('0','0', $_SESSION["NAME"], '0');
                $pdf->Ln(12);
                $pdf->Cell(32);
                $pdf->cell('0','0', $uid, '0');
                $pdf->Ln(4.5);
                $pdf->Cell(40);
                $pdf->cell('0','0', $uoc, '0');
                $pdf->Ln(8);
                $pdf->Cell(60);
                $pdf->cell('0','0', $bm, '0');
                $pdf->Ln(49);
                $pdf->Cell(125);
                $pdf->cell('0','0', $row["accepted_by"], '0');
                $pdf->Ln(9);
                $pdf->Cell(130);
                $pdf->cell('0','0', $row["date_accepted"], '0');
                $pdf->Ln(33);
                $pdf->Cell(20);
                $pdf->cell('0','0', $row["accepted_by"], '0');
                $pdf->Ln();
                $pdf->Cell(125);
                $pdf->cell('0','0', $_SESSION["NAME"], '0');
                $pdf->Ln(8.5);
                $pdf->Cell(25);
                $pdf->cell('0','0', $row["date_modified"], '0');
                $pdf->Ln();
                $pdf->Cell(125);
                $pdf->cell('0','0', $row["date_modified"], '0');
                break;
            default:
                $pdf->Cell(21.5);
                $pdf->cell('0','139', "/", '0');
                $pdf->Ln();
                $pdf->Cell(68);
                $pdf->cell('0','-141', $row["problem"], '0');
                $pdf->Ln(-50);
                $pdf->Cell(23);
                $pdf->cell('0','0', $_SESSION["NAME"], '0');
                $pdf->Ln(12);
                $pdf->Cell(32);
                $pdf->cell('0','0', $uid, '0');
                $pdf->Ln(4.5);
                $pdf->Cell(40);
                $pdf->cell('0','0', $uoc, '0');
                $pdf->Ln(8);
                $pdf->Cell(60);
                $pdf->cell('0','0', $bm, '0');
                $pdf->Ln(49);
                $pdf->Cell(125);
                $pdf->cell('0','0', $row["accepted_by"], '0');
                $pdf->Ln(9);
                $pdf->Cell(130);
                $pdf->cell('0','0', $row["date_accepted"], '0');
                $pdf->Ln(33);
                $pdf->Cell(20);
                $pdf->cell('0','0', $row["accepted_by"], '0');
                $pdf->Ln();
                $pdf->Cell(125);
                $pdf->cell('0','0', $_SESSION["NAME"], '0');
                $pdf->Ln(8.5);
                $pdf->Cell(25);
                $pdf->cell('0','0', $row["date_modified"], '0');
                $pdf->Ln();
                $pdf->Cell(125);
                $pdf->cell('0','0', $row["date_modified"], '0');
                break;
        }


        $pdf->Output();
  }?>
</body>
</html>

