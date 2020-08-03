<?php
    require('PDFPhieu.php');
    class PDF extends PDF_MySQL_Table
    {
        function Header()
        {
            // Title
            $this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
            $this->SetFont('DejaVu','',18);
            $this->Cell(0,6,'Báo cáo danh thu',0,1,'C');
            $this->Ln(10);
            // Ensure table header is printed
            parent::Header();
        }
    }

    // Connect to database
    include('../../connection.php');
    $pdf = new PDF();
    $pdf->AddPage();
    $timeF = "";
    $timeT = "";
    if (isset($_GET['time-from'])) {
        $timeF = $_GET['time-from'];
    }
    if (isset($_GET['time-to'])) {
        $timeT = $_GET['time-to'];
    }
    $pdf->Cell(0,10,'Thời gian: '.$timeF.' đến '.$timeT,0,0,'L');
    if ($timeF != "") {
            $timeF = date('Ymd', strtotime($timeF));
    }
    if ($timeT != "") {
            $timeT = date('Ymd', strtotime($timeT));
    }
    $pdf->Ln();

    $sql = "SELECT c.name as 'Sản phầm', sum(b.count) as 'Số lượng', (sum(b.count) * b.price) as 'Tổng tiền' FROM cart a inner join cart_detail b on a.id = b.id_cart inner join item c on b.id_item = c.id where `order_date` >= '$timeF' and `order_date` <= '$timeT' and a.status > -1 group by c.id";
    // First table: output all columns
    $pdf->Table($conn,$sql);
    $pdf->Output();
?>