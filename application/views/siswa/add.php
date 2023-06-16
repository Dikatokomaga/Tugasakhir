<div class="container mt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Siswa</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('siswa'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('siswa/add') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Nama" name="Nama" value=" <?= set_value('Nama'); ?>">
                                <?php echo form_error('Nama', '<div class="text-danger">', '</div>') ?>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Nama" class="col-sm-2 col-form-label">NIS</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="Nama" name="NIS" value=" <?= set_value('NIS'); ?>">
                                <?php echo form_error('Nama', '<div class="text-danger">', '</div>') ?>
                            </div>
                           </div>




                        <div class="form-group row">
                            <div class="col-sm-2">Gambar</div>
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="Gambar" name="Gambar">
                                            <label class="custom-file-label" for="Gambar">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">CV</div>
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="DokumenCV">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">Sertifikat</div>
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="Sertifikat">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Sekolah" class="col-sm-2 col-form-label">Sekolah</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="Sekolah" id="category" required>
                                    <option value=""> No Selected</option>
                                    <?php foreach ($dropdown as $row) : ?>
                                        <option value="<?php echo $row->id; ?>"><?php echo $row->nama_sekolah; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('Sekolah', '<div class="text-danger">', '</div>') ?>
                            </div>
                        </div>

                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="JenisKelamin" name="JenisKelamin" value="Laki-laki" <?php if (set_value('JenisKelamin') == "Laki-laki") : echo "checked";
                                                                                                                                                endif; ?>>
                                        <label class="form-check-label" for="JenisKelamin">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="JenisKelamin2" name="JenisKelamin" value="Perempuan" <?php if (set_value('JenisKelamin') == "Perempuan") : echo "checked";
                                                                                                                                                endif; ?>>
                                        <label class="form-check-label" for="JenisKelamin2">
                                            Perempuan
                                        </label>
                                    </div>
                                    <?php echo form_error('JenisKelamin', '<div class="text-danger">', '</div>') ?>
                                    </small>
                                </div>
                            </div>
                        </fieldset>

                        <div class="form-group row">
                            <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="Alamat" name="Alamat" rows="3"><?= set_value('Alamat'); ?></textarea>
                                <?php echo form_error('Alamat', '<div class="text-danger">', '</div>') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Alamat" class="col-sm-2 col-form-label">Agama</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="Agama" name="Agama">
                                    <option value="Islam" selected disabled>Pilih</option>
                                    <option value="Islam" <?php if (set_value('Agama') == "Islam") : echo "selected";
                                                            endif; ?>>Islam</option>
                                    <option value="Protestan" <?php if (set_value('Agama') == "Protestan") : echo "selected";
                                                                endif; ?>>Protestan</option>
                                    <option value="Katolik" <?php if (set_value('Agama') == "Katolik") : echo "selected";
                                                            endif; ?>>Katolik</option>
                                    <option value="Hindu" <?php if (set_value('Agama') == "Hindu") : echo "selected";
                                                            endif; ?>>Hindu</option>
                                    <option value="Buddha" <?php if (set_value('Agama') == "Buddha") : echo "selected";
                                                            endif; ?>>Buddha</option>
                                    <option value="Khonghucu" <?php if (set_value('Agama') == "Khonghucu") : echo "selected";
                                                                endif; ?>>Khonghucu</option>
                                </select>

                                <?php echo form_error('Agama', '<div class="text-danger">', '</div>') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="NoHp" class="col-sm-2 col-form-label">No Hp</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="NoHp" name="NoHp" value="<?= set_value('NoHp'); ?>">
                                <?php echo form_error('NoHp', '<div class="text-danger">', '</div>') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="Email" name="Email" value="<?= set_value('Email'); ?>">
                                <?php echo form_error('Email', '<div class="text-danger">', '</div>') ?>
                                </small>
                            </div>
                        </div>

                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="Status" name="Status" value="Aktif" <?php if (set_value('Status') == "Aktif") : echo "checked";
                                                                                                                                endif; ?>>
                                        <label class="form-check-label" for="Status">
                                            Aktif
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="Status" name="Status" value="Selesai" <?php if (set_value('Status') == "Selesai") : echo "checked";
                                                                                                                                endif; ?>>
                                        <label class="form-check-label" for="Status">
                                            Selesai
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="Status" name="Status" value="Menunggu" <?php if (set_value('Status') == "Menunggu") : echo "checked";
                                                                                                                                endif; ?>>
                                        <label class="form-check-label" for="Status">
                                            Menunggu
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="Status" name="Status" value="Pengajuan" <?php if (set_value('Status') == "Pengajuan") : echo "checked";
                                                                                                                                    endif; ?>>
                                        <label class="form-check-label" for="Status">
                                            Pengajuan
                                        </label>
                                    </div>

                                    <?php echo form_error('Status', '<div class="text-danger">', '</div>') ?>
                                    </small>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group row">
                            <label for="mulai" class="col-sm-2 col-form-label">Tanggal mulai</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="mulai" name="Mulai" value=" <?= $data_siswa->Mulai ?>">
                                <small class="text-danger">
                                    <?php echo form_error('mulai') ?>
                                </small>
                            </div>
                        </div>
            
                            <div class="form-group row">
                                <label for="selesai" class="col-sm-2 col-form-label">Tanggal selesai</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" id="selesai" name="Berakhir" value=" <?= $data_siswa->Berakhir ?>">
                                    <small class="text-danger">
                                        <?php echo form_error('selesai') ?>
                                    </small>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                            <label for="Nama" class="col-sm-2 col-form-label">Nilai Keseluruhan</label>
                            <div class="col-sm-10">
                                <input type="TEXT" class="form-control" id="Nama" name="NILAI" value=" <?= $data_siswa->nilai; ?>">
                                <?php echo form_error('Nama', '<div class="text-danger">', '</div>') ?>
                            </div>
                           </div>

                              
                          

                           



                            <!-- </div>
                            <div class="form-group row">
                            <label for="Nama" class="col-sm-2 col-form-label"> SD</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Nama" name="SD" value=" <?= set_value('SD'); ?>">
                                <?php echo form_error('Nama', '<div class="text-danger">', '</div>') ?>
                            </div>
                           </div>

                            <div class="form-group row">
                            <label for="Nama" class="col-sm-2 col-form-label"> SMP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Nama" name="SMP" value=" <?= set_value('SMP'); ?>">
                                <?php echo form_error('Nama', '<div class="text-danger">', '</div>') ?>
                            </div>
                        </div>

                            <div class="form-group row">
                            <label for="Nama" class="col-sm-2 col-form-label">SMA</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Nama" name="SMA" value=" <?= set_value('SMA'); ?>">
                                <?php echo form_error('Nama', '<div class="text-danger">', '</div>') ?>
                            </div>
                        </div> -->
                       
                        <h5 class="mt-4 mb-2">Riwayat Pendidikan</h5>
                        <div class="row" style="width:100%">
                       
                        <table class="table" id="myTable2">
                            <thead>  
                                <tr>
                                <th>Jejang </th>
                                <th>Asal Sekolah</th>
                                <!-- <th>Hasil </th> -->
                                </tr>
                            </thead>
                        </table>
                            <br>
                            <button type="button" onclick="addRow2()">Add Row</button>
                        </div> 

                        <h5 class="mt-4 mb-2">Portofolio </h5> 
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
                            <button type="button" onclick="addRow()">Add Row
                            </button>
                        </div>

                        

                            <div class="form-group row" style="width:100%">
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

 function addRow() {
      var table = document.getElementById("myTable");
      var row = table.insertRow(table.rows.length);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      cell1.innerHTML = '<input class="form-control" type="text" name="project[]" />';
      cell2.innerHTML = '<input class="form-control" type="text" name="tools[]" />';
      cell3.innerHTML = '<input class="form-control" type="file" name="hasil[]" multiple="multiple" />';
    }
 function addRow2() {
      var table = document.getElementById("myTable2");
      var row = table.insertRow(table.rows.length);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      cell1.innerHTML = '<input class="form-control" type="text" name="nama_sekolah[]" />';
      cell2.innerHTML = '<input class="form-control" type="text" name="jenjang[]" />';
    //   cell3.innerHTML = '<input class="form-control" type="file" name="hasil[]" multiple="multiple" />';
    }
    
    // Update label file input untuk menampilkan nama file yang di-upload
    $('.custom-file-input').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName);
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