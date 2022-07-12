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
                      <th class="text-center">Judul Sub Menu</th>
                      <th class="text-center">Nama Menu</th>
                      <th class="text-center">Url</th>
                      <th class="text-center">Icon</th>
                      <th class="text-center">Aktivasi</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $no = 1; foreach($get_submenu as $data):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $data['judul']?></td>
                      <td><?= $data['menu']?></td>
                      <td><?= $data['url']?></td>
                      <td><?= $data['icon']?></td>
                      <td class="text-center">
                        <?php if($data['is_active'] != 0): ?>
                        <div class="badge badge-success"><i class="feather icon-check"></i></div>
                        <?php else:?>
                        <div class="badge badge-danger"><i class="feather icon-x"></i></div>
                        <?php endif;?>
                      </td>
                      <td class="text-center">
                        <a href="" class="badge badge-warning" data-toggle="modal"
                          data-target="#modal-edit<?= $data['sub_id']?>"><i class=" feather icon-edit"></i></a>
                        <a href="" class="badge badge-danger" data-toggle="modal"
                          data-target="#modal-hapus<?= $data['sub_id']?>"><i class=" feather icon-trash"></i></a>
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
      <form action="<?= base_url('backend/menu/submenu')?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLiveLabel">Tambah Sub Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="judul">Pilih Menu</label>
                <select name="menu_id" id="menu_id" class="form-control">
                  <?php foreach($get_menu as $menu):?>
                  <option value="<?= $menu['id_menu']?>"><?= $menu['menu']?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="judul">Nama Sub Menu</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?= set_value('judul')?>">
                <?= form_error('judul', '<small class="text-danger">', '</small>')?>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="floating-label" for="url">Url Sub Menu</label>
            <input type="text" class="form-control" id="url" name="url" value="<?= set_value('url')?>">
            <?= form_error('url', '<small class="text-danger">', '</small>')?>
          </div>

          <div class="form-group">
            <label class="floating-label" for="icon">Icon Sub Menu</label>
            <input type="text" class="form-control" id="icon" name="icon" value="<?= set_value('icon')?>">
            <?= form_error('icon', '<small class="text-danger">', '</small>')?>
          </div>

          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" checked>
            <label class="form-check-label" for="is_active">Aktif?</label>
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

<?php foreach($get_submenu as $submenu):?>
<div id="modal-edit<?= $submenu['sub_id']?>" class="modal fade" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('backend/menu/edit_submenu')?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLiveLabel">Tambah Sub Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

          <input type="hidden" name="sub_id" value="<?= $submenu['sub_id']?>">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="judul">Pilih Menu</label>
                <select name="menu_id" id="menu_id" class="form-control">
                  <?php foreach($get_menu as $menu):?>
                  <option value="<?= $menu['id_menu']?>"
                    <?php if($submenu['menu_id'] != $menu['id_menu']):?><?php else:?> selected <?php endif;?>>
                    <?= $menu['menu']?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="judul">Nama Sub Menu</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?= $submenu['judul']?>">
                <?= form_error('judul', '<small class="text-danger">', '</small>')?>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="floating-label" for="url">Url Sub Menu</label>
            <input type="text" class="form-control" id="url" name="url" value="<?= $submenu['url']?>">
            <?= form_error('url', '<small class="text-danger">', '</small>')?>
          </div>

          <div class="form-group">
            <label class="floating-label" for="icon">Icon Sub Menu</label>
            <input type="text" class="form-control" id="icon" name="icon" value="<?= $submenu['icon']?>">
            <?= form_error('icon', '<small class="text-danger">', '</small>')?>
          </div>

          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" checked>
            <label class="form-check-label" for="is_active">Aktif?</label>
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

<?php foreach($get_submenu as $hapus):?>
<div id="modal-hapus<?= $hapus['sub_id']?>" class="modal fade" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLiveLabel">Hapus Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        <input type="hidden" name="id_menu" value="<?= $hapus['sub_id']?>">

        <p>Apakah anda ingin menghapus menu "<b><?= $hapus['judul']?></b>"?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
        <a href="<?= base_url('backend/menu/hapus_submenu/') . $hapus['sub_id']?>" class="btn  btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>