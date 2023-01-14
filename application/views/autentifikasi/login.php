<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Login</h3>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('pesan'); ?>
                    <form novalidate="" class="ng-untouched ng-pristine ng-valid" method="post" action="<?= base_url('autentifikasi'); ?>">
                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                            <input type="text" class="form-control form-control-user" value="<?=set_value('email'); ?>" id="email" 
                                placeholder="Masukkan Alamat Email" name="email">
                            <?= form_error('email','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="inputPassword">Password</label>
                            <input type="password" class="form-control form-control-user" id="password" placeholder="Password" 
                                name="password"><?= form_error('password','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox">
                                <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                            <a class="small" routerlink="/auth/forgot-password" href="/auth/forgot-password">Forgot Password?</a>
                            <button type="submit" class="btn btn-info">Masuk</button>
                            
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <div>
                        <a class="small" href="<?=base_url('autentifikasi/registrasi'); ?>">Daftar Member!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>