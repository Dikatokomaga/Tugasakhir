<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Siswa</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('siswa'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <?= $data_siswa ?>
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('id' => 'FrmEditSiswa', 'method' => "post", "autocomplete" => "off", "enctype" => "multipart/form-data");
                    echo form_open('', $attributes);
                    ?>
                    <!-- <form action="<?= base_url('siswa/edit') ?>" method="POST" enctype="multipart/form-data"> -->
                    <div class="form-group row">
                        <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="Id" name="Id" value=" <?= $data_siswa->Id; ?>">
                            <input type="text" class="form-control" id="Nama" name="Nama" value="<?= $data_siswa->Nama; ?>">
                            <small class="text-danger">
                                <?php echo form_error('Nama') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Nama" class="col-sm-2 col-form-label">NIS</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="NIS" name="NIS" value="<?= $data_siswa->nis; ?>">
                            <small class="text-danger">
                                <?php echo form_error('nis') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2">Gambar</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <?php if (file_exists('assets/img/' . $gambar['gambar'])) : ?>
                                        <img src="<?= base_url('assets/img/') . $gambar['gambar'] ?>" alt="..." class="img-thumbnail">
                                    <?php else : ?>
                                        <img src="<?= base_url('assets/img/default.jpg') ?>" alt="..." class="img-thumbnail">
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-5">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="Gambar">
                                        <label class="custom-file-label" for="customFile"><?= file_exists('assets/img/' . $gambar['gambar']) ? basename($gambar['gambar']) : 'Choose file' ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2">DokumenCV</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <?php if (file_exists('assets/img1/' . $gambar['DokumenCV'])) : ?>
                                        <img src="<?= base_url('assets/img1/') . $gambar['DokumenCV'] ?>" alt="..." class="img-thumbnail">
                                    <?php else : ?>
                                        <img src="<?= base_url('assets/img1/default.jpg') ?>" alt="..." class="img-thumbnail">
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-5">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="DokumenCV">
                                        <label class="custom-file-label" for="customFile"><?= file_exists('assets/img1/' . $gambar['DokumenCV']) ? basename($gambar['DokumenCV']) : 'Choose file' ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2">Sertifikat</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <?php if (file_exists('assets/sertifikat/' . $gambar['Sertifikat'])) : ?>
                                        <img src="<?= base_url('assets/sertifikat/') . $gambar['Sertifikat'] ?>" alt="..." class="img-thumbnail">
                                    <?php else : ?>
                                        <img src="<?= base_url('assets/sertifikat/default.jpg') ?>" alt="..." class="img-thumbnail">
                                    <?php endif; ?>

                                </div>
                                <div class="col-sm-5">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="Sertifikat">
                                        <label class="custom-file-label" for="customFile"><?= file_exists('assets/sertifikat/' . $gambar['Sertifikat']) ? basename($gambar['Sertifikat']) : 'Choose file' ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   

                    <div class="form-group row">
                        <label for="Sekolah" class="col-sm-2 col-form-label">Sekolah</label>
                        <div class="col-sm-10">

                            <small class="text-danger">
                                <?php echo form_error('Sekolah') ?>
                                <select class="form-control" name="Sekolah" id="category" required>
                                    <option value=""> No Selected</option>
                                    <?php foreach ($dropdown as $row) : ?>
                                        <option value="<?php echo $row->id; ?>" <?php if ($row->id == $data_siswa->Sekolah) {
                                                                                    echo "selected='selected'";
                                                                                } ?>><?php echo $row->nama_sekolah; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </small>
                        </div>
                    </div>

                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="JenisKelamin" name="JenisKelamin" value="Laki-laki" <?php if ($data_siswa->JenisKelamin == "Laki-laki") : echo "checked";
                                                                                                                                            endif; ?>>
                                    <label class="form-check-label" for="JenisKelamin">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="JenisKelamin2" name="JenisKelamin" value="Perempuan" <?php if ($data_siswa->JenisKelamin == "Perempuan") : echo "checked";
                                                                                                                                            endif; ?>>
                                    <label class="form-check-label" for="JenisKelamin2">
                                        Perempuan
                                    </label>
                                </div>
                                <small class="text-danger">
                                    <?php echo form_error('JenisKelamin') ?>
                                </small>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group row">
                        <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="Alamat" name="Alamat" rows="3"><?= $data_siswa->Alamat; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('Alamat') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Alamat" class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="Agama" name="Agama">
                                <option value="Islam" selected disabled>Pilih</option>
                                <option value="Islam" <?php if ($data_siswa->Agama == "Islam") : echo "selected";
                                                        endif; ?>>Islam</option>
                                <option value="Protestan" <?php if ($data_siswa->Agama == "Protestan") : echo "selected";
                                                            endif; ?>>Protestan</option>
                                <option value="Katolik" <?php if ($data_siswa->Agama == "Katolik") : echo "selected";
                                                        endif; ?>>Katolik</option>
                                <option value="Hindu" <?php if ($data_siswa->Agama == "Hindu") : echo "selected";
                                                        endif; ?>>Hindu</option>
                                <option value="Buddha" <?php if ($data_siswa->Agama == "Buddha") : echo "selected";
                                                        endif; ?>>Buddha</option>
                                <option value="Khonghucu" <?php if ($data_siswa->Agama == "Khonghucu") : echo "selected";
                                                            endif; ?>>Khonghucu</option>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('Agama') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="NoHp" class="col-sm-2 col-form-label">No Hp</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="NoHp" name="NoHp" value="<?= $data_siswa->NoHp; ?>">
                            <small class="text-danger">
                                <?php echo form_error('NoHp') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Email" name="Email" value="<?= $data_siswa->Email; ?>">
                            <small class="text-danger">
                                <?php echo form_error('Email') ?>
                            </small>
                        </div>

                    </div>


                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Status </legend>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="Status" name="Status" value="Aktif" <?php if ($data_siswa->Status == "Aktif") : echo "checked";
                                                                                                                            endif; ?>>
                                    <label class="form-check-label" for="Status">
                                        Aktif
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="Status2" name="Status" value="Selesai" <?php if ($data_siswa->Status == "Selesai") : echo "checked";
                                                                                                                            endif; ?>>
                                    <label class="form-check-label" for="Status2">
                                        Selesai
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="Status3" name="Status" value="Menunggu" <?php if ($data_siswa->Status == "Menunggu") : echo "checked";
                                                                                                                                endif; ?>>
                                    <label class="form-check-label" for="Status3">
                                        Menunggu
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="Status4" name="Status" value="Pengajuan" <?php if ($data_siswa->Status == "Pengajuan") : echo "checked";
                                                                                                                                endif; ?>>
                                    <label class="form-check-label" for="Status4">
                                        Pengajuan
                                    </label>
                                </div>
                                <small class="text-danger">
                                    <?php echo form_error('Status') ?>
                                </small>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <label for="mulai" class="col-sm-2 col-form-label">Tanggal mulai</label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="mulai" name="Mulai" value="<?= $data_siswa->Mulai ?>">
                            <small class="text-danger">
                                <?php echo form_error('mulai') ?>
                            </small>
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="form-group row">
                            <label for="selesai" class="col-sm-2 col-form-label">Tanggal selesai</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="selesai" name="Berakhir" value="<?= $data_siswa->Berakhir ?>">
                                <?php echo form_error('selesai') ?>
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label for="Nama" class="col-sm-2 col-form-label"> SD</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Nama" name="SD" value=" <?= $data_siswa->sd; ?>">
                                <?php echo form_error('Nama', '<div class="text-danger">', '</div>') ?>
                            </div>
                           </div>

                            <div class="form-group row">
                            <label for="Nama" class="col-sm-2 col-form-label"> SMP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Nama" name="SMP" value=" <?= $data_siswa->smp; ?>">
                                <?php echo form_error('Nama', '<div class="text-danger">', '</div>') ?>
                            </div>
                        </div>

                            <div class="form-group row">
                            <label for="Nama" class="col-sm-2 col-form-label">SMA</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="Nama" name="SMA" value=" <?= $data_siswa->sma; ?>">
                                <?php echo form_error('Nama', '<div class="text-danger">', '</div>') ?>
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label for="Nama" class="col-sm-2 col-form-label">Nilai Keseluruhan</label>
                            <div class="col-sm-10">
                                <input type="TEXT" class="form-control" id="Nama" name="NILAI" value=" <?= $data_siswa->nilai; ?>">
                                <?php echo form_error('Nama', '<div class="text-danger">', '</div>') ?>
                            </div>
                           </div>

                        <h5 class="mt-4 mb-2">Riwayat Pendidikan</h5>
                        <div class="row" style="width:100%">
                       
                        <table class="table" id="myTable2" >
                            <thead>  
                                <tr>
                                <th>Jejang </th>
                                <th>Asal Sekolah</th>
                                <!-- <th>Hasil </th> -->
                                </tr>
                            </thead>
                            </table>
                            <br>
                            <button type="button" onclick="addRow2()"  >Add Row</button>
                        </div> 

                        <h5 class="mt-4 mb-2">Portofolio</h5>
                        <div class="row" style="width:100%">
                           <table class="table" id="myTable">
                            <thead>  
                                <tr>
                                <th>Project</th>
                                <th>Tools</th>
                                <th>Hasil </th>
                                </tr>
                            </thead>
                            </table>
                            <br>
                            <button type="button" onclick="addRow()">Add Row</button>

                            </div>
                            <!-- <?php foreach ($data_riwayat_pendidikan as $key => $value) {
                                echo "$value<br/>";
                            }?> -->

<h2><?php echo $data_riwayat_pendidikan[0]; ?></h2>
                        

                        <div class="form-group row">
                            <div class="col-sm-10 offset-md-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                            </div>
                        </div>
                        </form>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
 $('#FrmEditSiswa').on('change', function(e) {
    e.preventDefault();

 })
// var $form = $('#FrmEditSiswa');
// $form.on('submit', function(e) {
//     e.preventDefault();
    
// })

 function addRow() {
      var table = document.getElementById("myTable");
      var row = table.insertRow(table.rows.length);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      cell1.innerHTML = '<input class="form-control" type="text" name="project[]">';
      cell2.innerHTML = '<input class="form-control" type="text" name="tools[]">';
    //   cell3.innerHTML = '<input class="form-control" type="file" name="hasil[]">';
      cell3.innerHTML = `<label class="btn btn-default btn-file">
      Browse <input type="file" style="display: none;" name="hasil[]">
      </label>`;
      
    }

    var data_portofolio = <?php echo json_encode($data_portofolio); ?>;
    // console.log(data_riwayat_pendidikan);
    data_portofolio.map(function(item){
        var table = document.getElementById("myTable");
        var row = table.insertRow(table.rows.length);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
        cell1.innerHTML = '<input class="form-control" value="'+item.jenis_tugas+'" type="text" name="project[]" />';

        cell2.innerHTML = '<input class="form-control" value="'+item.tools+'" type="text" name="tools[]" />';

        // cell3.innerHTML = '<input class="form-control" value="'+item.hasil+'" type="file" name="hasil[]" />';
        // console.log(item);
        cell3.innerHTML = `<label class="btn btn-default btn-file">
        `+item.hasil+` <input type="file" style="display: none;" name="hasil[]">
        </label>`;
    })

    function addRow2() {
      var table = document.getElementById("myTable2");
      var row = table.insertRow(table.rows.length);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
    //   var cell3 = row.insertCell(2);
      cell1.innerHTML = '<input class="form-control" type="text" name="nama_sekolah[]" />';
      cell2.innerHTML = '<input class="form-control" type="text" name="jenjang[]" />';
    //   cell3.innerHTML = '<input class="form-control" type="file" name="hasil[]" multiple="multiple" />';
    }

    var data_riwayat_pendidikan = <?php echo json_encode($data_riwayat_pendidikan); ?>;
    // console.log(data_riwayat_pendidikan);
    data_riwayat_pendidikan.map(function(item){
        var table = document.getElementById("myTable2");
        var row = table.insertRow(table.rows.length);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        //   var cell3 = row.insertCell(2);
        cell1.innerHTML = '<input class="form-control" value="'+item.jenjang+'" type="text" name="nama_sekolah[]" />';
        cell2.innerHTML = '<input class="form-control" value="'+item.nama_sekolah+'" type="text" name="jenjang[]" />';
        console.log(item);
    })

   





    $('.custom-file-input').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName);
    });
    $(document).ready(function() {
        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $(this).next('.custom-file-label').html(fileName);
        });
    });

    $(document).ready(function() {
        $(function() {
            $("#mulai").datepicker({
                dateFormat: 'yy-mm-dd'
            });
            format: 'yyyy-mm-dd'
        });
        $(function() {
            $("#selesai").datepicker({
                dateFormat: 'yy-mm-dd'
            });
            format: 'yyyy-mm-dd'
        });

    });
</script>