<div class="msg" style="display:none;">
    <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="container-fluid">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Siswa</a></li>
            <li class="breadcrumb-item active" aria-current="page">List Data</li>
        </ol>

    

        
    </nav>
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-primary mb-2" href="<?= base_url('siswa/add'); ?>">Tambah Data</a>
            <div mb-2>
                <!-- Menampilkan flashh data (pesan saat data berhasil disimpan)-->
                <?php if ($this->session->flashdata('message')) :
                    echo $this->session->flashdata('message');
                endif; ?>
            </div>


            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tableSiswa">
                            <thead>
                                <tr class="table-success">
                                    <th>ID</th>
                                    <th>NAMA</th>
                                    <th>PROFILE</th>
                                    <th>SEKOLAH</th>
                                    <th>ALAMAT</th>
                                    <th>STATUS</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = +1; ?>
                                <?php foreach ($data_siswa as $row) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>

                                        <td><?= $row->Nama ?></td>
                                        <td><img src="<?= base_url('assets/img/') . $row->gambar ?>" alt="..." width="100px"></td>
                                        <td><?= $row->nama_sekolah ?></td>
                                        <td><?= $row->Alamat ?></td>
                                        <td><?php if ($row->Status == 'Aktif') : echo "<div class='text-center rounded p-1 bg-warning text-white'>Aktif</div>" ?>

                                            <?php elseif ($row->Status == 'Selesai') : echo "<div class='text-center rounded p-1 bg-success text-white'>Selesai</div>" ?>

                                            <?php elseif ($row->Status == 'Menunggu') : echo "<div class='text-center rounded p-1 bg-danger text-white'>Menunggu</div>"  ?>

                                            <?php elseif ($row->Status == 'Pengajuan') : echo "<div class='-center rounded p-1 bg-primary text-white'>Pengajuan</div>"  ?>

                                            <?php endif; ?></td>
                                        <td>
                                            <?php if ($row->Status == 'Selesai') : ?>
                                                <a href="<?= site_url('siswa/edit/' . $row->Id) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> </a>

                                                <a href="<?= base_url('siswa/pdf/' . $row->Id) ?>" class="btn btn-primary btn-sm"><i class='bx bx-cloud-download'></i></a>

                                                <a href="<?= site_url('siswa/detail/' . $row->Id) ?>" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i> </a>

                                                <a href="javascript:void(0);" data="<?= $row->Id ?>" class="btn btn-danger btn-sm item-delete"><i class="fa fa-trash"></i> </a>

                                            <?php else : ?>
                                                <a href="<?= site_url('siswa/edit/' . $row->Id) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> </a>

                                                <a href="<?= site_url('siswa/detail/' . $row->Id) ?>" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i> </a>

                                                <a href="javascript:void(0);" data="<?= $row->Id ?>" class="btn btn-danger btn-sm item-delete"><i class="fa fa-trash"></i> </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    //menampilkan data ketabel dengan plugin datatables
    $('#tableSiswa').DataTable();

    //menampilkan modal dialog saat tombol hapus ditekan
    $('#tableSiswa').on('click', '.item-delete', function() {
        //ambil data dari atribute data 
        var id = $(this).attr('data');
        $('#myModalDelete').modal('show');
        //ketika tombol lanjutkan ditekan, data id akan dikirim ke method delete 
        //pada controller siswa
        $('#btdelete').unbind().click(function() {
            $.ajax({
                type: 'ajax',
                method: 'get',
                async: false,
                url: '<?php echo base_url() ?>siswa/delete/',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('#myModalDelete').modal('hide');
                    location.reload();
                }
            });
        });
    });
</script>


<!-- Modal dialog hapus data-->
<div class="modal fade" id="myModalDelete" tabindex="-1" aria-labelledby="myModalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalDeleteLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="btdelete">Lanjutkan</button>
            </div>
        </div>
    </div>
</div>