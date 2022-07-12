  <!-- [ Header ] start -->
  <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">


    <div class="m-header">
      <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
      <a href="#!" class="b-brand">
        <!-- ========   change your logo hear   ============ -->
        <img src="<?= base_url()?>assets/images/logo-skripsi.png" alt="" class="logo">
        <img src="<?= base_url()?>assets/images/logo-icon.png" alt="" class="logo-thumb">
      </a>
      <a href="#!" class="mob-toggler">
        <i class="feather icon-more-vertical"></i>
      </a>
    </div>
    <div class="collapse navbar-collapse">

      <ul class="navbar-nav ml-auto">

        <li>
          <div class="dropdown drp-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="feather icon-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-notification">
              <div class="pro-head">
                <img src="<?= base_url()?>assets/images/user.png" class="img-radius" alt="User-Profile-Image">
                <span><?= $user_ses['nama']?></span>
                <a href="#" class="dud-logout" title="Logout" data-toggle="modal" data-target="#modal-logout">
                  <i class="feather icon-log-out"></i>
                </a>
              </div>
              <ul class="pro-body">
                <li><a href="<?= base_url('backend/user')?>" class="dropdown-item"><i class="feather icon-user"></i>
                    Profile</a></li>
        </li>
      </ul>
    </div>
    </div>
    </li>
    </ul>
    </div>


  </header>
  <!-- [ Header ] end -->

  <div id="modal-logout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLiveLabel">Tambah Grup User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

          <p>
            Apakah anda yakin ingin keluar?
          </p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
          <a href="<?= base_url('login/logout')?>" class="btn  btn-danger">Logout</a>
        </div>
      </div>
    </div>
  </div>