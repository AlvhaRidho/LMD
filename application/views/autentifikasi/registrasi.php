 <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                </div>
                <div class="card-body">
                    <form class="user" class="ng-untouched ng-pristine ng-valid" method="post" action="<?= base_url('autentifikasi/registrasi'); ?>">
                        <div class="">
                            <div class="">
                                <div class="form-group">
                                    <input type="text" class="form-control py-4" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>"></div>
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" aria-describedby="emailHelp" class="form-control py-4" id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>" >
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" aria-describedby="emailHelp" class="form-control py-4" id="no_hp" name="no_hp" placeholder="No Handphone" value="<?= set_value('no_hp'); ?>" >
                                <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control py-4" id="password1" name="password1" placeholder="Password">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control py-4" id="password2" name="password2" placeholder="Ulangi Password">
                                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-4 mb-0">
                                <button type="submit" a class="btn btn-info btn-block" >Create Account</a></button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <div>
                            <a class="small" href="<?=base_url('autentifikasi'); ?>">Sudah Punya Akun? login aja </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


   