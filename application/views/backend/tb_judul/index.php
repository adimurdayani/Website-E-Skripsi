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
              <?= validation_errors( '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						','</div>')?>
              <div class="table-responsive">
                <table id="table" class="table">
                  <thead>
                    <tr>
                      <th rowspan="2" class="text-center"></th>
                      <th rowspan="2" class="text-center">#</th>
                      <th rowspan="2" class="text-center">NIM</th>
                      <th rowspan="2" class="text-center">Nama</th>
                      <th colspan="2" class="text-center">Pendaftaran Skripsi</th>
                      <th rowspan="2" class="text-center">Status</th>
                      <th rowspan="2" class="text-center">Tanggal</th>
                    </tr>
                    <tr>
                      <th class="text-center">Judul Skripsi</th>
                      <th class="text-center">Tema Skripsi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $no = 1; foreach($get_judul as $data):?>
                    <tr>
                      <td class="text-center">
                        <a href="<?= base_url('backend/modul/detail/') . $data['id']?>" class="badge badge-success"><i
                            class=" feather icon-eye"></i></a>
                        <a href="" class="badge badge-warning" data-toggle="modal"
                          data-target="#modal-edit<?= $data['id']?>"><i class=" feather icon-edit"></i></a>
                        <a href="" class="badge badge-danger" data-toggle="modal"
                          data-target="#modal-hapus<?= $data['id']?>"><i class=" feather icon-trash"></i></a>
                      </td>
                      <td class="text-center"><?= $no++;?></td>
                      <td class="text-center"><?= $data['nim']?></td>
                      <td><?= $data['nama']?></td>
                      <td><?= $data['judul']?></td>
                      <td><?= $data['tema']?></td>
                      <td class="text-center">
                        <?php if($data['is_active'] == "Diterima"):?>
                        <div class="badge badge-success"><i class="feather icon-check"></i> <?= $data['is_active']?>
                          <?php elseif($data['is_active'] == "belum diterima"):?>
                          <div class="badge badge-danger"><i class="feather icon-check"></i> <?= $data['is_active']?>
                            <?php endif;?>
                          </div>
                      </td>
                      <td class="text-center"><?= $data['created_at']?></td>
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
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="<?= base_url('backend/modul')?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLiveLabel">Tambah Pendaftaran Judul Skripsi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="nim">NIM</label>
                <input type="number" class="form-control" id="nim" name="nim" value="<?= set_value('nim')?>">
                <?= form_error('nim', '<small class="text-danger">', '</small>')?>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama')?>">
                <?= form_error('nama', '<small class="text-danger">', '</small>')?>
              </div>
            </div>
          </div>


          <div class="form-group">
            <label class="floating-label" for="kelamin">Jenis Kelamin</label>
            <select name="kelamin" id="kelamin" class="form-control">
              <option value="Perempuan">Perempuan</option>
              <option value="Laki-Laki">Laki-Laki</option>
            </select>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email')?>">
                <?= form_error('email', '<small class="text-danger">', '</small>')?>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="no_hp">No. Handphone</label>
                <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= set_value('no_hp')?>">
                <?= form_error('no_hp', '<small class="text-danger">', '</small>')?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="jurusan">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= set_value('jurusan')?>">
                <?= form_error('jurusan', '<small class="text-danger">', '</small>')?>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="konsentrasi">Konsetrasi</label>
                <select name="konsentrasi" id="konsentrasi" class="form-control">
                  <?php foreach($get_konsentrasi as $konsentrasi):?>
                  <option value="<?= $konsentrasi['id']?>"><?= $konsentrasi['nama_kons']?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?= set_value('judul')?>">
                <?= form_error('judul', '<small class="text-danger">', '</small>')?>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="id_tema">Tema</label>
                <select name="id_tema" id="id_tema" class="form-control">
                  <?php foreach($get_tema as $tema):?>
                  <option value="<?= $tema['id_tema']?>"><?= $tema['tema']?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="pem_satu">Pembimbing 1</label>
                <select name="pem_satu" id="pem_satu" class="form-control basic-single">
                  <?php foreach($get_pembimbing as $pembimbing):?>
                  <option value="<?= $pembimbing['id_pem']?>"><?= $pembimbing['nama_pem']?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="pem_dua">Pembimbing 2</label>
                <select name="pem_dua" id="pem_dua" class="form-control">
                  <?php foreach($get_pembimbing as $pembimbing):?>
                  <option value="<?= $pembimbing['id_pem']?>"><?= $pembimbing['nama_pem']?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="floating-label" for="judul">Keterangan</label>
            <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"></textarea>
            <?= form_error('keterangan', '<small class="text-danger">', '</small>')?>
          </div>

          <div class="form-group">
            <label class="floating-label" for="judul">Keterangan</label>
            <input type="hidden" name="is_active" id="is_active" value="belum diterima">
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

<?php foreach($get_judul as $judul):?>
<div id="modal-edit<?= $judul['id']?>" class="modal fade" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('backend/modul/edit')?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLiveLabel">Edit Status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="id" value="<?= $judul['id']?>">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="nim">NIM</label>
                <input type="number" class="form-control" id="nim" name="nim" value="<?= $judul['nim']?>" readonly>
                <?= form_error('nim', '<small class="text-danger">', '</small>')?>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $judul['nama']?>" readonly>
                <?= form_error('nama', '<small class="text-danger">', '</small>')?>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="floating-label" for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?= $judul['judul']?>" readonly>
            <?= form_error('judul', '<small class="text-danger">', '</small>')?>
          </div>

          <div class="form-group">
            <label class="floating-label" for="judul">Status</label>
            <select name="is_active" id="is_active" class="form-control">
              <option value="belum diterima">belum diterima</option>
              <option value="Diterima">Diterima</option>
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

<?php foreach($get_judul as $hapus):?>
<div id="modal-hapus<?= $hapus['id']?>" class="modal fade" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLiveLabel">Hapus Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="id" value="<?= $hapus['id']?>">

          <p>
            Apakah anda ingin menghapus data dengan nama <b>"<?= $hapus['nama']?>"</b> ?
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
          <a href="<?= base_url('backend/modul/hapus/') . $hapus['id']?>" class="btn  btn-danger">Hapus</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach;?>