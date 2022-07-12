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
              <?= form_error('tema', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						','</div>')?>
              <div class="table-responsive">
                <table id="table" class="table">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Konsentrasi</th>
                      <th class="text-center">Tema Skripsi</th>
                      <th class="text-center">Tanggal</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $no = 1; foreach($get_tema as $data):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $data['nama_kons']?></td>
                      <td><?= $data['tema']?></td>
                      <td class="text-center"><?= $data['created_at']?></td>
                      <td class="text-center">
                        <a href="" class="btn btn-warning" data-toggle="modal"
                          data-target="#modal-edit<?= $data['id_tema']?>"><i class=" feather icon-edit"></i></a>
                        <a href="" class="btn btn-danger" data-toggle="modal"
                          data-target="#modal-hapus<?= $data['id_tema']?>"><i class=" feather icon-trash"></i></a>
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
      <form action="<?= base_url('backend/modul/tema')?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLiveLabel">Tambah Tema</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="floating-label" for="tema">Nama Tema</label>
            <input type="text" class="form-control" id="tema" name="tema" value="<?= set_value('tema')?>">
            <?= form_error('tema', '<small class="text-danger">', '</small>')?>
          </div>

          <div class="form-group">
            <label class="floating-label" for="tema">Konsentrasi</label>
            <select name="id_konsentrasi" id="id_konsentrasi" class="form-control">
              <?php foreach($get_konsentrasi as $konsentrasi):?>
              <option value="<?= $konsentrasi['id']?>"><?= $konsentrasi['nama_kons']?></option>
              <?php endforeach;?>
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

<?php foreach($get_tema as $tema):?>
<div id="modal-edit<?= $tema['id_tema']?>" class="modal fade" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('backend/modul/edit_tema')?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLiveLabel">Ubah Tema</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_tema" id="id_tema" value="<?= $tema['id_tema']?>">

          <div class="form-group">
            <label class="floating-label" for="tema">Nama Tema</label>
            <input type="text" class="form-control" id="tema" name="tema" value="<?= $tema['tema']?>">
            <?= form_error('tema', '<small class="text-danger">', '</small>')?>
          </div>

          <div class="form-group">
            <label class="floating-label" for="tema">Konsentrasi</label>
            <select name="id_konsentrasi" id="id_konsentrasi" class="form-control">
              <?php foreach($get_konsentrasi as $konsentrasi):?>
              <option value="<?= $konsentrasi['id']?>" <?php if($tema['id_konsentrasi'] != $konsentrasi['id']):?>
                <?php else:?> selected <?php endif;?>>
                <?= $konsentrasi['nama_kons']?></option>
              <?php endforeach;?>
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

<?php foreach($get_tema as $hapus):?>
<div id="modal-hapus<?= $hapus['id_tema']?>" class="modal fade" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLiveLabel">Ubah Tema</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id_tema" id="id_tema" value="<?= $hapus['id_tema']?>">

        <p>
          Apakah anda ingin menghapus data dengan nama "<?= $hapus['tema']?>"?.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
        <a href="<?= base_url('backend/modul/hapus_tema/') . $hapus['id_tema']?>" class="btn  btn-warning">Ubah</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>