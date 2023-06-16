<!DOCTYPE html>
<html>
<head>
  <title>E-Certificate Template</title>
  <style>

@page {
      size: A4;
      margin: 0;
    }

    body {
      background-color: #fff;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .certificate {
      width: 660px;
      margin: 30px auto;
      padding: 15px;
      background-color: #fff;
      border: 4px solid #ef4423;
      outline: 4px solid #ef4423;
      outline-offset: -10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    h1 {
      font-family: 'Helvetica Neue', Arial, sans-serif;
      font-size: 36px;
      color: #5e8fbc;
      margin-bottom: 10px;
    }

    h6{
      font-family: 'Helvetica Neue', Arial, sans-serif;
      color: #333;
      
    }

    h2 {
      font-family: 'Helvetica Neue', Arial, sans-serif;
      font-size: 24px;
      color: #333;
      margin-top: 15px;
      margin-bottom: 10px;
    }

    p {
      font-size: 15px;
      color: #555;
      margin-bottom: 5px;
    }

    .logo {
      margin-top: 10px;
    }

    .logo img {
      width: 150px;
    }

    .signature {
      margin-top: 0px;
    }

     .signature img {
      width: 80px;
    }
  </style>
</head>
<body>
  <div class="certificate">
  <div class="logo">
    <img src="<?php echo base_url();?>assets/img/logo_hexa.png" alt="Logo HEXA">
    </div>
    <h2>Sertifikat Magang</h2>
    <p>Sertifikat ini diberikan kepada </p>
    <h2><?php echo $Nama; ?></h2>
    <h5>NIS : <?php echo $nis; ?>/<?php echo $nama_sekolah;?></h5>
    <p>Yang telah menyelasaikan magang di CV. Hexa Integra Mandiri pada : <br><?php 
    
    function tgl_indo($tanggal){
      $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
      $pecahkan = explode('-', $tanggal);
      
      // variabel pecahkan 0 = tanggal
      // variabel pecahkan 1 = bulan
      // variabel pecahkan 2 = tahun
     
      return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
    
    
    echo  tgl_indo($Mulai);    
    ?> hingga <?php
    echo  tgl_indo($Berakhir); 
    

    ?> </p>
    <p>&nbsp;</p>
    <div class="signature">
    <img src="<?php echo base_url();?>assets/img/tandatangan.PNG" alt="Tanda  Tangan">
    </div>
    <h6>Nama Terang</h6>

  </div>
</body>
</html>