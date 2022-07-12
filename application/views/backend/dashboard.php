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
                <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#!"><?= $judul;?></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->
      <!-- [ Main Content ] start -->
      <div class="row">
        <div class="col-lg-7 col-md-12">
          <!-- support-section start -->
          <div class="row">
            <div class="col-sm-6">
              <div class="card support-bar overflow-hidden">
                <div class="card-body pb-0">
                  <h2 class="m-0"><?= $jml_menu?></h2>
                  <span class="text-c-blue">Data Menu Manajemen</span>
                  <p class="mb-3 mt-3">Total menu manajemen.</p>
                </div>
                <div class="card-footer bg-primary text-white">
                  <div class="row text-center">
                    <div class="col">
                      <h4 class="m-0 text-white"><?= $jml_menu?></h4>
                      <span>Menu</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card support-bar overflow-hidden">
                <div class="card-body pb-0">
                  <h2 class="m-0"><?= $jml_sub_menu?></h2>
                  <span class="text-c-green">Data Sub Menu Manajemen</span>
                  <p class="mb-3 mt-3">Total sub menu manajemen.</p>
                </div>
                <div class="card-footer bg-success text-white">
                  <div class="row text-center">
                    <div class="col">
                      <h4 class="m-0 text-white"><?= $jml_sub_menu?></h4>
                      <span>Sub Menu</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- support-section end -->
        </div>
        <div class="col-lg-5 col-md-12">
          <!-- page statustic card start -->
          <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h4 class="text-c-yellow"><?= $jml_judul;?></h4>
                      <h6 class="text-muted m-b-0">Judul Terkirim</h6>
                    </div>
                    <div class="col-4 text-right">
                      <i class="feather icon-bar-chart-2 f-28"></i>
                    </div>
                  </div>
                </div>
                <div class="card-footer bg-c-yellow">
                  <div class="row align-items-center">
                    <div class="col-9">
                      <p class="text-white m-b-0">Data</p>
                    </div>
                    <div class="col-3 text-right">
                      <i class="feather icon-trending-up text-white f-16"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h4 class="text-c-green"><?= $jml_tema;?></h4>
                      <h6 class="text-muted m-b-0">Data Tema</h6>
                    </div>
                    <div class="col-4 text-right">
                      <i class="feather icon-file-text f-28"></i>
                    </div>
                  </div>
                </div>
                <div class="card-footer bg-c-green">
                  <div class="row align-items-center">
                    <div class="col-9">
                      <p class="text-white m-b-0">Data</p>
                    </div>
                    <div class="col-3 text-right">
                      <i class="feather icon-trending-up text-white f-16"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h4 class="text-c-red"><?= $jml_pembimbing;?></h4>
                      <h6 class="text-muted m-b-0">Data Dosen</h6>
                    </div>
                    <div class="col-4 text-right">
                      <i class="feather icon-users f-28"></i>
                    </div>
                  </div>
                </div>
                <div class="card-footer bg-c-red">
                  <div class="row align-items-center">
                    <div class="col-9">
                      <p class="text-white m-b-0">Data</p>
                    </div>
                    <div class="col-3 text-right">
                      <i class="feather icon-trending-down text-white f-16"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h4 class="text-c-blue"><?= $jml_konsentrasi;?></h4>
                      <h6 class="text-muted m-b-0">Data Konsentrasi</h6>
                    </div>
                    <div class="col-4 text-right">
                      <i class="feather icon-list f-28"></i>
                    </div>
                  </div>
                </div>
                <div class="card-footer bg-c-blue">
                  <div class="row align-items-center">
                    <div class="col-9">
                      <p class="text-white m-b-0">Data</p>
                    </div>
                    <div class="col-3 text-right">
                      <i class="feather icon-trending-down text-white f-16"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- page statustic card end -->
        </div>
        <!-- prject ,team member start -->
        <div class="col-xl-6 col-md-12">
          <div class="card table-card">
            <div class="card-header">
              <h5>Data Judul Skripsi yang Terkirim</h5>
              <div class="card-header-right">
                <div class="btn-group card-option">
                  <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
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
                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i>
                        reload</a></li>
                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body p-4">
              <div class="table-responsive">
                <table id="table" class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Tema</th>
                      <th>Judul</th>
                      <th>Created At</th>
                      <th class="text-right">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($get_judul as $data_judul):?>
                    <tr>
                      <td> <?= $no++?> </td>
                      <td><?= $data_judul['nim']?></td>
                      <td><?= $data_judul['nama']?></td>
                      <td><?= $data_judul['id_tema']?></td>
                      <td><?= $data_judul['judul']?></td>
                      <td><?= $data_judul['created_at']?></td>
                      <td class="text-right"><label class="badge badge-light-danger">Low</label></td>
                    </tr>
                    <?php  endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-md-12">
          <div class="card latest-update-card">
            <div class="card-header">
              <h5>Data Tema</h5>
              <div class="card-header-right">
                <div class="btn-group card-option">
                  <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
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
                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i>
                        reload</a></li>
                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body p-4">
              <div class="table-responsive">
                <table id="table2" class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Konsentrasi</th>
                      <th>Tema</th>
                      <th>Created At</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($get_tema as $data_tema):?>
                    <tr>
                      <td><?= $no++?></td>
                      <td><?= $data_tema['nama_kons']?></td>
                      <td><?= $data_tema['tema']?></td>
                      <td><?= $data_tema['created_at']?></td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- prject ,team member start -->
      </div>
      <!-- [ Main Content ] end -->
    </div>
  </div>
  <!-- [ Main Content ] end -->