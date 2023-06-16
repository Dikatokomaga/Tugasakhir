<!DOCTYPE html>
<html>
<head>
  <title>Curriculum Vitae</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f1f1f1;
    }

    h1 {
      text-align: left;
    }

    h2 {
      margin-top: 40px;
      margin-bottom: 20px;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    th, td {
      padding: 10px;
      border: 1px solid #ccc;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

   

  </style>

</head>
<body>

<div class="container">
  <div style="display: flex;">
      <img src="<?php echo base_url();?>assets/img/logo_hexa.png" style="width: 20%; float:right;" alt="">
    <h1 style="">Curriculum Vitae</h1>
    <div>
   
      <img class="row mt-2" src="<?php echo base_url();?>assets/img/<?php echo $magang->gambar ?>" style="width: 35%;" alt="">
    </div>
  </div>

 
    
    <h2>Data Diri</h2>
    <table>
      <tr>
        <th>Nama</th>
        <td><?php echo $magang->Nama;?></td>
      </tr>
      <tr>
        <th>NIS</th>
        <td><?php echo $magang->nis;?></td>
      </tr>
      <tr>
        <th>Sekolah</th>
        <td><?php echo $magang->nama_sekolah;?></td>
      </tr>
      <tr>
        <th>Jenis Kelamin</th>
        <td><?php echo $magang->JenisKelamin;?></td>
      </tr>

      <tr>
        <th>Alamat </th>
        <td><?php echo $magang->Alamat;?></td>
      </tr>

      <tr>
        <th>Agama</th>
        <td><?php echo $magang->Agama;?></td>
      </tr>
      <tr>
        <th>No HP</th>
        <td><?php echo $magang->NoHp;?></td>
      </tr>

      <tr>
        <th>Email</th>
        <td><?php echo $magang->Email;?></td>
      </tr>
    </table>
    
    <h2>Riwayat Pendidikan</h2>
    <table>
      <tr>
        <th>Jenjang</th>
        <th>Nama Sekolah</th>
      </tr>
      <!-- echo` -->
     <!-- <tr>
      <td>test</td>
      <td>pp</td>
     </tr> -->
  `;
  <?php foreach($riwayat_pendidikan as $key=>$value): ?>
    <tr>
        <td><?= $value->jenjang; ?></td>
        <td><?= $value->nama_sekolah; ?></td>
    </tr>
    <?php endforeach; ?>
      

      
    </table>
    
    <h2>Portofolio</h2>
    <table>
      <tr>
        <th>Proyek</th>
        <th>Deskripsi</th>
        <th>Hasil</th>
      </tr>
      <?php foreach($portofolio as $key=>$value): ?>
    <tr>
        <td><?= $value->jenis_tugas; ?></td>
        <td><?= $value->tools; ?></td>
        <td><img src="<?php echo base_url();?>assets/sertifikat/<?php echo $value->hasil ?>" style="width:30%" alt=""></td>
    </tr>
    <?php endforeach; ?>
    </table>
    
    <h2>Hasil Akhir</h2>
    <table>
      <tr>
        <th>Tanggal Mulai</th>
        <th>Tanggal Selesai</th>
        <th>Nilai</th>
      </tr>
      <tr>
        <td><?php echo $magang->Mulai;?></td>
        <td><?php echo $magang->Berakhir;?></td>
        <td><?php echo $magang->nilai;?></td>
      </tr>
    
