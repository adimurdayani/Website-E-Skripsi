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
              <li class="breadcrumb-item"><a href="<?= base_url()?>"><i class="feather icon-home"></i></a></li>
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
              <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal-add"><i
                  class="feather icon-plus"></i> Tambah</a>
              <?= $this->session->flashdata('msg');?>
              <?= validation_errors( '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						','</div>')?>
              <div class="table-responsive">
                <table id="table" class="table">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Username</th>
                      <th class="text-center">Grup</th>
                      <th class="text-center">Aktivasi</th>
                      <th class="text-center">Created At</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $no = 1; foreach($get_user as $data):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $data['nama']?></td>
                      <td><?= $data['email']?></td>
                      <td><?= $data['username']?></td>
                      <td><?= $data['nama_grup']?></td>
                      <td class="text-center">
                        <?php if($data['user_active'] != 0): ?>
                        <div class="badge badge-success"><i class="feather icon-check"></i></div>
                        <?php else:?>
                        <div class="badge badge-danger"><i class="feather icon-x"></i></div>
                        <?php endif;?>
                      </td>
                      <td class="text-center"><?= $data['created_at']?></td>
                      <td class="text-center">
                        <a href="" class="btn btn-warning" data-toggle="modal"
                          data-target="#modal-edit<?= $data['id']?>"><i class=" feather icon-edit"></i></a>
                        <a href="" class="btn btn-danger" data-toggle="modal"
                          data-target="#modal-hapus<?= $data['id']?>"><i class=" feather icon-trash"></i></a>
                      </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
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

<div id="modal-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('backend/setting')?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLiveLabel">Tambah User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama')?>">
                <?= form_error('nama', '<small class="text-danger">', '</small>')?>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                  value="<?= set_value('username')?>">
                <?= form_error('username', '<small class="text-danger">', '</small>')?>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="floating-label" for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email')?>">
            <?= form_error('email', '<small class="text-danger">', '</small>')?>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                  value="<?= set_value('password')?>">
                <?= form_error('password', '<small class="text-danger">', '</small>')?>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="konf_pass">Konfirmasi Password</label>
                <input type="password" class="form-control" id="konf_pass" name="konf_pass">
                <?= form_error('konf_pass', '<small class="text-danger">', '</small>')?>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="floating-label" for="user_id">Pilih Grup</label>
            <select name="user_id" id="user_id" class="form-control">
              <?php foreach($get_grup as $grup):?>
              <option value="<?= $grup['user_id']?>"><?= $grup['nama_grup']?></option>
              <?php endforeach;?>
            </select>
          </div>

          <div class="form-group">
            <label class="floating-label" for="user_active">Pilih Aktivasi</label>
            <select name="user_active" id="user_active" class="form-control">
              <option value="0">Tidak Aktif</option>
              <option value="1">Aktif</option>
            </select>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn  btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php foreach($get_user as $user):?>
<div id="modal-edit<?= $user['id']?>" class="modal fade" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('backend/setting/edit')?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLiveLabel">Edit User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

          <input type="hidden" name="id" value="<?= $user['id']?>">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']?>" readonly>
                <?= form_error('nama', '<small class="text-danger">', '</small>')?>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']?>"
                  readonly>
                <?= form_error('username', '<small class="text-danger">', '</small>')?>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="floating-label" for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']?>" readonly>
            <?= form_error('email', '<small class="text-danger">', '</small>')?>
          </div>

          <div class="form-group">
            <label class="floating-label" for="user_active">Pilih Aktivasi</label>
            <select name="user_active" id="user_active" class="form-control">
              <option value="0" <?php if($user['user_active'] != 0):?><?php else:?> selected <?php endif;?>>Tidak Aktif
              </option>
              <option value="1" <?php if($user['user_active'] != 1):?><?php else:?> selected <?php endif;?>>Aktive
            </select>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn  btn-warning">Ubah</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach;?>

<?php foreach($get_user as $hapus):?>
<div id="modal-hapus<?= $hapus['id']?>" class="modal fade" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLiveLabel">Tambah Grup User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        <input type="hidden" name="id" value="<?= $hapus['id']?>">

        <p>
          Apakah anda yakin ingin menghapus data <b><?= $hapus['nama']?></b>?
        </p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
        <a href="<?= base_url('backend/setting/hapus/') . $hapus['id']?>" class="btn  btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>