<div class="container pt-5">
    <h3><?= $title ?></h3>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo base_url('Password/edit/') .$edit->id ?>" method="POST">
                        <?= $this->session->flashdata('message'); ?>
                        <fieldset class="form-group">
                            <div class="form-group row">
                                <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" value="<?=$edit->username?>">
                                    <small class="text-danger">
                                        <?php echo form_error('Username')?>
                                        
                                    </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Nama" class="col-sm-2 col-form-label">Paswword</label>
                                <div class="col-sm-5 ">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" />
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="ulangi Password" />
                                </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="form-group row">
                                <div class="col-sm-10 offset-md-2">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                                </div>
                            </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>