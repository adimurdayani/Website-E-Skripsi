<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
  <div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="page-header-title">
              <h5 class="m-b-10"><?= $judul;?></h5>
            </div>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('backend/dashboard')?>"><i
                    class="feather icon-home"></i></a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('backend/modul')?>">Data Judul</a></li>
              <li class="breadcrumb-item"><a href="#!"><?= $judul;?></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
      <!-- [ sample-page ] start -->
      <div class="col-sm-12">
        <div class="card">

          <div class="card-header">
            <h5>Tabel <?=$judul;?></h5>
            <div class="card-header-right">
              <div class="btn-group card-option">
                <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  <i class="feather icon-more-horizontal"></i>
                </button>
                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                  <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i>
                        maximize</span><span style="display:none"><i class="feather icon-minimize"></i>
                        Restore</span></a></li>
                  <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i>
                        collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a>
                  </li>
                  <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a>
                  </li>
                  <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="card-body table-border-style">
              <div class="row">
                <div class="col-md-7">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"><?= $get_id_judul['nama']?></h5>
                      <p class="card-text p-0"><b>Judul Skripsi</b></p>
                      <p><?= $get_id_judul['judul']?></p>
                      <p class="card-text p-0"><b>Tema Skripsi</b></p>
                      <p><?= $get_id_judul['tema']?></p>
                      <p class="card-text p-0"><b>Keterangan</b></p>
                      <blockquote class="blockquote mb-0 card-body">
                        <p><?= $get_id_judul['keterangan']?></p>
                      </blockquote>
                      <p class="card-text"><small class="text-muted"><?= $get_id_judul['created_at']?></small></p>
                    </div>
                  </div>
                </div>

                <div class="col">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Data Mahasiswa</h5>
                      <p class="card-text p-0"><b>Email</b></p>
                      <p><?= $get_id_judul['email']?></p>
                      <p class="card-text p-0"><b>No. Handphone</b></p>
                      <p><?= $get_id_judul['no_hp']?></p>
                      <p class="card-text p-0"><b>Jenis Kelamin</b></p>
                      <p><?= $get_id_judul['kelamin']?></p>

                      <p class="card-text p-0"><b>Jurusan</b></p>
                      <p><?= $get_id_judul['jurusan']?></p>

                      <p class="card-text p-0"><b>Konsentrasi</b></p>
                      <p><?= $get_id_judul['nama_kons']?></p>

                      <p class="card-text p-0"><b>Nama Pembimbing 1 dan 2</b></p>
                      <p><?= $get_id_judul['nama_pem']?>, <?= $get_id_judul['nama_pem']?></p>
                      <p class="card-text"><small class="text-muted"><?= $get_id_judul['created_at']?></small></p>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
  </div>
</div>
<!-- [ Main Content ] end -->