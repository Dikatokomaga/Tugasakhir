<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Siswa</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('sekolah'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo base_url() . 'Sekolah/add'; ?>" method="POST">
                        <div class="form-group row">
                            <label for="Sekolah" class="col-sm-2 col-form-label">Sekolah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Sekolah" name="nama_sekolah" value="<?= set_value('nama_sekolah'); ?>">
                                    <?php echo form_error('nama_sekolah','<div class="text-danger">', '</div>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat_sekolah" class="col-sm-2 col-form-label">Alamat Sekolah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat_sekolah" name="alamat_sekolah" value="<?= set_value('alamat_sekolah'); ?>">
                                    <?php echo form_error('alamat_sekolah','<div class="text-danger">', '</div>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="web" class="col-sm-2 col-form-label">Web Sekolah</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control" id="web" name="web" value="<?= set_value('web'); ?>">
                                    <?php echo form_error('web','<div class="text-danger">', '</div>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_wa" class="col-sm-2 col-form-label">Nomer WA Sekolah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_wa" name="no_wa" value="<?= set_value('no_wa'); ?>">
                                    <?php echo form_error('no_wa','<div class="text-danger">', '</div>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nomer" class="col-sm-2 col-form-label">Nomer Kontak Sekolah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_kontak" name="no_kontak" value="<?= set_value('no_kontak'); ?>">
                                    <?php echo form_error('no_kontak','<div class="text-danger">', '</div>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email Sekolah</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
                                    <?php echo form_error('email','<div class="text-danger">', '</div>') ?>
                            </div>
                        </div>
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
