<?php 

        $this->load->library('pdf');
        $pdf = new FPDF('p','mm','A4');
        $pdf->AddPage();
        $pdf->SetTitle('Cetak - Surat Pengantar');
        $pdf->SetMargins(10, 10, 10, 10);
        $pdf->SetFont('Times','B',14);

        foreach($surat as $surat){
        $pdf->Cell(195,6,'RT '.strtoupper($surat->rt),0,1,'C');
        $pdf->Cell(195,6,'KELURAHAN '.$surat->kelurahan,0,1,'C');
        $pdf->Cell(195,6,'KECAMATAN '.$surat->kecamatan,0,1,'C');
        $pdf->Cell(195,6,'KOTA '.$surat->kota,0,1,'C');
        $pdf->Cell(195,6,'PROVINSI '.$surat->provinsi,0,1,'C');
        

        $pdf->SetLineWidth(1);
        $pdf->Line(10, 40, 210-10, 40);
        $pdf->SetLineWidth(0);
        $pdf->ln(5);
        $pdf->Cell(195,6,'SURAT PENGANTAR',0,1,'C');




        $pdf->SetFont('Times','',12);
        $pdf->Cell(195,6,'No. '.$surat->no_surat,0,1,'C');

        

        $pdf->ln();
        $pdf->Cell(82,5,'Yang bertanda tangan di bawah ini Ketua RT. '.$surat->rt,0,0);
        $pdf->Cell(30,5,'Desa '.$surat->kelurahan,0,0);
        $pdf->Cell(42,5,'Kecamatan '.$surat->kecamatan,0,0);
        $pdf->Cell(30,5,'Kota '.$surat->kota,0,1);
        $pdf->Cell(10,5,',Menerangkan bahwa:',0,1);






        $pdf->ln();
        $pdf->cell(10);
        $pdf->Cell(40,5,'1. Nama Lengkap',1,0);
        $pdf->Cell(5,5,':',0,0);
        $pdf->Cell(30,5,$surat->nama,0,0);


        $pdf->ln();
        $pdf->cell(10);
        $pdf->Cell(40,5,'2. Alamat',1,0);
        $pdf->Cell(5,5,':',0,0);
        $pdf->Cell(30,5,$surat->alamat,0,0);

        $pdf->ln();
        $pdf->cell(10);
        $pdf->Cell(40,5,'3. Tempat Lahir',1,0);
        $pdf->Cell(5,5,':',0,0);
        $pdf->Cell(30,5,$surat->tmpt_lahir,0,0);

        $pdf->ln();
        $pdf->cell(10);
        $pdf->Cell(40,5,'4. Tanggal Lahir',1,0);
        $pdf->Cell(5,5,':',0,0);
        $pdf->Cell(30,5,$surat->tgl_lahir,0,0);

        $pdf->ln();
        $pdf->cell(10);
        $pdf->Cell(40,5,'5. Agama',1,0);
        $pdf->Cell(5,5,':',0,0);
        $pdf->Cell(30,5,$surat->agama,0,0);

        $pdf->ln();
        $pdf->cell(10);
        $pdf->Cell(40,5,'5. Keperluan',1,0);
        $pdf->Cell(5,5,':',0,0);
        $pdf->Cell(30,5,$surat->keperluan,0,1);

        $pdf->ln(5);
        $pdf->Cell(20,5,'Demikian Surat keterangan ini dibuat untuk dapat dipergunakan sesuai dengan keperluannya',0,0);
        $pdf->Cell(2,5,':',0,0);
        $pdf->Cell(50,5,' - ',0,0);

        $pdf->ln();
        $pdf->setY(215);
        $pdf->setX(20);
        $pdf->Cell(20,5,"Pemohon,",0,0);
        
        $pdf->ln();
        $pdf->setY(255);
        $pdf->setX(20);
        $pdf->Cell(20,5,"Bpk. ".$surat->nama,0,0);

        $pdf->setY(215);
        $pdf->setX(150);
        $pdf->Cell(20,5,"Ketua RT,",0,0);
        
        $pdf->ln();
        $pdf->setY(255);
        $pdf->setX(150);
        $pdf->Cell(20,5,"Bpk.",0,0);

       
    }
$pdf->Output();
?>