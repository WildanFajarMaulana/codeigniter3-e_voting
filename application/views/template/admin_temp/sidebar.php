    

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book-reader"></i>
                </div>
                <div class="sidebar-brand-text mx-3">e-voting</div>
            </a>

            <!-- Heading -->
            <br><hr class="sidebar-divider my-0">
                <div class="sidebar-heading">
                Administrator
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item 
            <?php if ( $page == "Dashboard"){
                 echo "active";
            }?>">
                <a class="nav-link" href="<?= base_url('admin'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengelolaan
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item 
            <?php if ( $page == "Aturan & Jadwal"){
                 echo "active";
            }?>">
                <a class="nav-link" href="<?= base_url('admin/rsmanage'); ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span> Kelola Aturan & Jadwal</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item 
            <?php if ( $page == "Periode"){
                 echo "active";
            }else if( $page == "Kandidat"){
                echo "active";
            }else if( $page == "Pemilihan"){
                echo "active";
            }?>">
                <a class="nav-link" href="<?= base_url('admin/periode'); ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span> Kelola Pemilihan</span></a>
            </li>
            <?php 
                @$periode_aktif = $this->db->get_where('tb_periode',['gate' => 1])->row_array();
                @$link_aktif = $periode_aktif['id_periode'].'/'.$periode_aktif['periode_awal'].'/'.$periode_aktif['periode_akhir'];
            ?>
            <?php if (!empty($periode_aktif)): ?>
                <li class="nav-item 
                <?php if ( $page == $periode_aktif['judul']){
                     echo "active";
                }?>">
                    <a class="nav-link" href="<?= base_url('admin/kandidat/'.$link_aktif); ?>">
                        <i class="fas fa-fw fa-user-check"></i>
                        <span><?= $periode_aktif['judul']; ?></span></a>
                </li>
                
            <?php endif ?>
             
            


            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Action
            </div>
            <li class="nav-item">
                <a class="nav-link tombol-logout" href="<?= base_url('auth/logout'); ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span> Keluar</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->