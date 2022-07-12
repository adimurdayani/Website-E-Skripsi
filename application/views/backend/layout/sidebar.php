  <!-- [ navigation menu ] start -->
  <nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
      <div class="navbar-content scroll-div ">

        <div class="">
          <div class="main-menu-header">
            <img class="img-radius" src="<?= base_url()?>assets/images/user.png" alt="User-Profile-Image">
            <div class="user-details">
              <div><?= $user_ses['nama']?> </i></div>
            </div>
          </div>
        </div>

        <?php 
        $user_id = $this->session->userdata('user_id');
          $querymenu = "SELECT `tb_menu`.`id_menu`,`menu`
                      FROM `tb_menu`
                      JOIN `tb_akses_menu` ON `tb_menu`.`id_menu` = `tb_akses_menu`.`menu_id`
                      WHERE `tb_akses_menu`.`user_id` = $user_id
                    ORDER BY `tb_akses_menu`.`menu_id` ASC
                  ";
          $menu = $this->db->query($querymenu)->result_array();
        ?>

        <ul class="nav pcoded-inner-navbar ">
          <?php foreach($menu as $m):?>
          <li class="nav-item pcoded-menu-caption mb-0">
            <label><?= $m['menu']?></label>
          </li>
          <!-- data menu -->
          <?php 
            $menu_id = $m['id_menu'];
            $querysubmenu = "SELECT *
                        FROM `tb_sub_menu`
                        JOIN `tb_menu` ON `tb_sub_menu`.`menu_id` = `tb_menu`.`id_menu`
                        WHERE `tb_sub_menu`.`menu_id` = $menu_id
                        AND `tb_sub_menu`.`is_active` = 1
                    ";
            $submenu = $this->db->query($querysubmenu)->result_array();
          ?>
          <!-- end data menu -->
          <!-- data sub menu -->
          <?php foreach($submenu as $submenu):?>
          <li class="nav-item mb-0">
            <a href="<?= base_url($submenu['url'])?>" class="nav-link pb-0"><span class="pcoded-micon"><i
                  class="<?= $submenu['icon']?>"></i></span><span
                class="pcoded-mtext"><?= $submenu['judul']?></span></a>
          </li>
          <?php endforeach;?>
          <!-- end data sub menu -->
          <?php endforeach;?>

        </ul>

      </div>
    </div>
  </nav>
  <!-- [ navigation menu ] end -->