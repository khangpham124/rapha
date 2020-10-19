<?php
include($_SERVER["DOCUMENT_ROOT"] . "/app_config.php");
include(LOAD_PATH."/wp-load.php");
if ( is_user_logged_in() ) {
    require('fpdf.php');
    $code = $_GET['code'];
    $mypost = get_page_by_title( $code ,OBJECT, 'booking');
    $company = 607;
    class PDF extends FPDF
    {
        function Header()
        {
            // Logo
            $this->Image('logo.png',10,6,60);
            // Arial bold 15
            $this->SetFont('Arial','B',14);
            // Move to the right
            $this->Cell(150);
            // Title
            $this->Cell(40,10,'RaphaTea',0,0,R);
            
            $this->Cell(0,25,"Phone:855-562-2532",0,0,R);
            
            $this->Cell(0,35,"Email:sales@raphatea.org",0,0,R);
            // Line break
            $this->Ln(20);   
        }

        function InfoInvoice($code)
        {
            $this->SetFont('Arial','',12);
            // Background color
            $this->SetFillColor(146,200,62);
            // Title
            $this->Ln(10);
            $this->Cell(0,6,"Invoice No:" . get_field('userid',$code) ,0,1,'L',true);
            // Line break
            $this->Ln(0);
            $this->Cell(0,6,"Date No:" . date("d-m-Y") ,0,1,'L',true);
            $this->Ln(0);
            $this->Cell(0,6,"Due Date: $number",0,1,'L',true);
            $this->Ln(1);
        }

        function UserInvoice($name,$email,$phone)
        {
            // Read text file
            $this->SetFont('Arial','',12);
            // Background color
            $this->SetFillColor(240,240,240);
            // Title
            $this->Ln(10);
            $this->Cell(0,6,"Bill to: $name",0,1,'L',true);
            // Line break
            $this->Ln(0);
            $this->Cell(0,6,"Email: $email",0,1,'L',true);
            $this->Ln(0);
            $this->Cell(0,6,"Phone: $phone",0,1,'L',true);
            $this->Ln(10);

        }

        function BodyInvoice($code)
        {
            
        }

        // Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
        

        // Simple table
        function BasicTable($header, $code,$company)
        {
            // Header
            foreach($header as $col)
                $this->Cell(62,10,$col,1);
            $this->Ln();
            // Data
            while(has_sub_field('order_detail',$code)):
                $this->Cell(62,10,get_sub_field('name_pro',$code),1);
                $this->Cell(62,10,get_sub_field('quantity',$code),1);
                $this->Cell(62,10,get_sub_field('price',$code) . "$",1);
                $this->Ln();
            endwhile;
            $this->SetFillColor(255,255,255);
            $this->Ln(10);
            $this->Cell(0,6,"Shipping and Tax Fee: $ " . get_field('shipping_fee',$code),0,1,'R',true);
            $this->Ln(0);
            $this->Cell(0,6,"Sub Total: $ " .get_field('sub_total',$code) ,0,1,'R',true);
            $this->Ln(10);
            $this->SetFillColor(240,240,240);
            $this->Cell(0,6,"Paymenth Instructions",0,1,'L',true);
            $this->Ln(0);
            $this->SetFontSize(12);
            $this->Cell(0,6,get_field('bank_brand',$company) ,0,1,'L',true);
            $this->Ln(0);
            $this->Cell(0,6,'BANK NAME' .get_field('bank_name',$company) ,0,1,'L',true);
            $this->Ln(0);
            $this->Cell(0,6,'BENEFICIARY' .get_field('beneficiary',$company) ,0,1,'L',true);
            $this->Ln(0);
            $this->Cell(0,6,'BANK ADD' .get_field('bank_add',$company) ,0,1,'L',true);
            $this->Ln(0);
            $this->Cell(0,6,'ROUTING NO' .get_field('routing_no',$company) ,0,1,'L',true);
            $this->Ln(0);
            $this->Cell(0,6,'A/C No' .get_field('ac_no',$company) ,0,1,'L',true);
            $this->Ln(0);
        }
    }

    $pdf = new PDF();
    // Column headings
    $header = array('Product name', 'Quantity', 'Rate');
    // Data loading
    $pdf->SetFont('Arial','',14);
    $pdf->AddPage();
    $pdf->InfoInvoice($mypost->ID);
    $pdf->UserInvoice(get_field('fullname',get_field('userid',$mypost)),get_the_title(get_field('userid',$mypost)),get_field('phone',get_field('userid',$mypost)));
    $pdf->BasicTable($header,$mypost->ID,$company);
    $pdf->Output();
} else {
    echo "<script>window.location.href='".APP_URL_USER."';</script>";
}
?>