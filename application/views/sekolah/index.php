<div class="msg" style="display:none;">
    <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="container">
  <h3><?= $title ?></h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb ">
      <li class="breadcrumb-item"><a>Siswa</a></li>
      <li class="breadcrumb-item active" aria-current="page">List Data</li>
    </ol>
  </nav>
  <div class="row">
    <div class="col-md-115">
      <a class="btn btn-primary mb-2" href="<?= base_url('sekolah/add'); ?>">Tambah Data</a>
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
                  <th>NAMA SEKOLAH</th>
                  <th>ALAMAT SEKOLAH</th>
                  <th>WEB</th>
                  <Th>NO WA</Th>
                  <th>NO KONTAK</th>
                  <th>EMAIL</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = +1; ?>
                <?php foreach ($data_sekolah as $row) : ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row->nama_sekolah ?></td>
                    <td><?= $row->alamat_sekolah ?></td>
                    <td class=" text-success"><a href="<?= site_url("$row->web"); ?>">LINK</a></td>
                    <td><?= $row->no_wa ?></td>
                    <td><?= $row->no_kontak ?></td>
                    <td><?= $row->email ?></td>
                    <td>
                      <a href="<?= site_url('sekolah/edit/' . $row->id) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> </a>
                      <a href="<?= site_url('sekolah/detail/' . $row->id) ?>" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i> </a>
                      <button type="button" data-id="<?php echo $row->id; ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash"></i>
                      </button></a>
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
  $('#tableSekolah').DataTable();

  //menampilkan modal dialog saat tombol hapus ditekan
  $('#tableSekolah').on('click', '.item-delete', function() {
    //ambil data dari atribute data 
    var id = $(this).attr('data');
    $('#myModalDelete').modal('show');
    //ketika tombol lanjutkan ditekan, data id akan dikirim ke method delete 
    //pada controller Sekolah
    $('#btdelete').unbind().click(function() {
      $.ajax({
        type: 'ajax',
        method: 'get',
        async: false,
        url: '<?php echo base_url() ?>sekolah/delete/',
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
<div id="tempat-modal"></div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Ini?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Pastikan Sudah Menghapus Data Pada Isi Sekolah Sebelum Menghapus
      </div>
      <div class="modal-footer">
        <button class="form-control btn btn-primary" data id="hapus"> <i class="glyphicon glyphicon-ok-sign"></i>Ya, Hapus Data Ini</button>
        <button class="form-control btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i>Tidak</button>
      </div>
    </div>
  </div>
</div>

<script>
  var a = 0;
  $('.btn-sm').click(function() {
    a = $(this).attr("data-id");
  });
  $('#hapus').click(function() {

    // console.log(a)
    $.get("<?= base_url() ?>" + 'Sekolah/delete/' + a, function(response) {
      console.log(response);
      window.location.reload('Sekolah');
    })

  })
</script>