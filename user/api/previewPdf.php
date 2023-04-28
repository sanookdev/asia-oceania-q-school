<?php
// header('Content-Type: text/html; charset=utf-8');
session_start();

if (!isset($_SESSION['user'])) {
    echo "<script>
    alert('username or password is invalid. you dont have permission.');
    window.location.href = '../logout.php';
    </script>"; 
    exit();
}
if(isset($_GET['personal_id'])){
    $personal_id = $_GET['personal_id'];
    require('./services.php');

    $service = new DB_con();
    $data = array();
    $data = $service->viewRegister($personal_id);
    $data = $data['data'][0];
}else{
    echo "AccessDenied";
    exit();
}
require '../vendor/autoload.php';
use setasign\Fpdi\Fpdi;
/* initiate FPDI */
$pdf = new FPDI();
function writeToPdf($pdf,$x,$y,$data) {
    // $pdf => pdffile
    $pdf->SetXY($x,$y);
    if(!is_array($data)){
        $pdf->Write(0,$data);
    }
}

// $pdf->SetFont('cp874');

/* set the source file */
$pageCount = $pdf->setSourceFile("../../application.pdf");
for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
    $tplIdx = $pdf->importPage($pageNo);
    /* add a page */
    $pdf->AddPage();
    $pdf->useTemplate($tplIdx);
    $pdf->AddFont('SukhumvitSet-Medium','','SukhumvitSet-Medium.php');
    $pdf->AddFont('courier','','courier.php');
    $pdf->AddFont('THSarabunNew','','THSarabunNew.php');
    $pdf->SetFont('courier','B');
    $pdf->SetFontSize(8.5);
    $pdf->SetTextColor(32, 80, 110);
    if($pageNo == 1){
        writeToPdf($pdf,30,84.5,$data['prefix']);
        if ($data['id'] < 10) {
            $data['id'] = '00' . $data['id'];
        } else if ($data['id'] < 100) {
            $data['id'] = '0' . $data['id'];
        }
        writeToPdf($pdf,170,77,$data['id']);
        writeToPdf($pdf,30,105.5,$data['firstname']);
        writeToPdf($pdf,63,105.5,$data['middlename']);
        writeToPdf($pdf,105,105.5,$data['familyname']);
        writeToPdf($pdf,52,119,$data['gender']);
        writeToPdf($pdf,112,118.5,date('d-m-Y',strtotime($data['dateofbirth'])));
        writeToPdf($pdf,53,127,$data['age']);
        writeToPdf($pdf,103,126.5,$data['pob']);
        writeToPdf($pdf,52,134.5,$data['country']);
        writeToPdf($pdf,110,134,$data['nationality']);
        writeToPdf($pdf,53,127,$data['age']);
        writeToPdf($pdf,57,142,$data['passportNo']);
        writeToPdf($pdf,137,142,$data['idcard']);
        writeToPdf($pdf,55,150,date('d-m-Y',strtotime($data['issueddate'])));
        writeToPdf($pdf,117,150,date('d-m-Y',strtotime($data['expirydate'])));
        writeToPdf($pdf,66,158.5,$data['formerProfessional']);
        // writeToPdf($pdf,135.5,158.5,$data['highestWorldranking']);
        writeToPdf($pdf,64.5,167,$data['yearsactive']);
        writeToPdf($pdf,82,174.5,$data['highestWorldrankingPeryear']);
        writeToPdf($pdf,160,175,$data['lastestWorldrankingPeryear']);
        writeToPdf($pdf,64.5,182.5,$data['bestPracticebreak']);
        writeToPdf($pdf,132.5,182,$data['bestTournamentbreak']);
        if($data['dateofarrival'] != '0000-00-00'){
            writeToPdf($pdf,60,190.5,date('d-m-Y',strtotime($data['dateofarrival'])));
        }
        writeToPdf($pdf,107,190,$data['airline']);
        writeToPdf($pdf,158,190,$data['flightNo']);
        //  writeToPdf($pdf,65,239,$data['dateofdeparture']);
        writeToPdf($pdf,57,214,$data['partyNo']);
        writeToPdf($pdf,30,237.5,$data['firstnameParty1']);
        writeToPdf($pdf,66,237.5,$data['middlenameParty1']);
        writeToPdf($pdf,105,237.5,$data['familynameParty1']);
        writeToPdf($pdf,30,242.5,$data['firstnameParty2']);
        writeToPdf($pdf,66,242.5,$data['middlenameParty2']);
        writeToPdf($pdf,105,242.5,$data['familynameParty2']);

    }
    // end page 1
    else if($pageNo == 2){
      
        writeToPdf($pdf,79,78.5 + 16.2,$data['hotelReservation']);
        writeToPdf($pdf,139,78.5 + 16.2,$data['typeRoom']);
    }
    // end page 2
    else if($pageNo == 3){
        // session T-Shirt
        $blackNo = $data['tshirtblack'];
        writeToPdf($pdf,55,38.5,$blackNo);

        $blackDetails = $data['tshirtblack_details'];
        writeToPdf($pdf,81,38.5,$blackDetails);

        $blackPriceEuro = $blackNo * 10;
        $blackPriceTHB = $blackNo * 425; 
        writeToPdf($pdf,158,38.5,$blackPriceEuro.' EURO or '. $blackPriceTHB.' THB');

        
        $whiteNo = $data['tshirtwhite'];
        writeToPdf($pdf,55,46,$whiteNo);

        $whiteDetails = $data['tshirtwhite_details'];
        writeToPdf($pdf,81,46,$whiteDetails);

        $whitePriceEuro = $whiteNo * 10;
        $whitePriceTHB = $whiteNo * 425;
        writeToPdf($pdf,158,46,$whitePriceEuro.' EURO or '. $whitePriceTHB.' THB');



        $address = $data['homeAddress'];
        $address = preg_replace( "/\r|\n/", "", $address );
        $address = chunk_split($address,45,"******");
        $address = explode('******',$address);
        $startAddressY = 113+87; // 94
        for($i = 0 ; $i < count($address) ; $i++){
            writeToPdf($pdf,30,$startAddressY,$address[$i]);
            $startAddressY = $startAddressY + 5.1 ;
        }
        //  end home address

        writeToPdf($pdf,63,146.5+86.8,$data['email']);
        writeToPdf($pdf,143,146.5+86.8,$data['mobile']);
        writeToPdf($pdf,50,153.5+86.9,$data['facebook']);
        writeToPdf($pdf,113,153.5+86.9,$data['twitter']);
        writeToPdf($pdf,162,153.5+86.9,$data['line_id']);
        writeToPdf($pdf,45,161.5+86.9,$data['weibo_id']);
        writeToPdf($pdf,110,161+86.9,$data['whatsapp_id']);
        writeToPdf($pdf,163,161.5+86.9,$data['wechat_id']);
        // $applyDate = date('d-m-Y',strtotime($data['created']));
        // writeToPdf($pdf,55,238,$applyDate);
    }else if($pageNo == 4){
      
        $applyDate = date('d-m-Y',strtotime($data['created']));
        writeToPdf($pdf,55,84,$applyDate);
    }
}

$pdf->Output();
?>