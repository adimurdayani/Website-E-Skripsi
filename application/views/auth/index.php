<!-- [ auth-signup ] start -->
<div class="auth-wrapper">
  <div class="auth-content">
    <div class="card">
      <div class="row align-items-center text-center">
        <div class="col-md-12">
          <div class="card-body">
            <img src="<?= base_url()?>assets/images/logo-login.png" alt="" class="img-fluid mb-4">
            <h4 class="mb-3 f-w-400"><?= $judul;?></h4>
            <?= $this->session->flashdata('message');
            ?>
            <form action="<?= base_url('login')?>" method="POST">
              <div class="form-group mb-3">
                <label class="floating-label" for="Username">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                  value="<?= set_value('username')?>">
                <?= form_error('username', '<small class="text-danger">','</small>')?>
              </div>
              <div class="form-group mb-4">
                <label class="floating-label" for="Password">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                  value="<?= set_value('password')?>">
                <?= form_error('password', '<small class="text-danger">','</small>')?>
              </div>
              <button type="submit" class="btn btn-success btn-block mb-4">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- [ auth-signup ] end -->