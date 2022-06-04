
               <!-- Cards Periode -->

               <style type="text/css">

                    .judul{
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }

                    .judul p{
                        font-family: 'Arvo', serif;
                        font-size: 25px;
                        color: #414141;
                    }

                    .row{
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }
                    .card{
                        margin: 10px;
                    }
                    .content{
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        width: 250px;
                        height: 70px;
                    }

                    .content button{
                        width: 75px;
                        height: 35px;
                        margin: 10%;
                    }
                    .lay{
                      display: flex; 
                      justify-content: center; 
                      align-items: center; 
                      flex-direction: column;
                    }
                    .lay img{
                      max-width: 400px;
                    }
                    .text{
                      max-width: 600px; 
                      display: flex;
                      justify-content: center; 
                      align-items: center; 
                      flex-direction: column; 
                      margin-top: 20px;
                    }
                    .text h5{
                      font-family: 'Arvo', serif;
                      font-size: 20px;
                    }
                    .text p{
                      text-align: center;
                    }
               </style>
               <?php if (!$pemilihan): ?>
               <div class="container">
                    <div class="row lay">
                      <img src="<?= base_url('assets/img/kandidat_not_found.svg') ?>">
                      <div class="text">
                        <h5>Data Pemilihan Tidak Ditemukan</h5>
                        <p>
                         Kategori Pemilihan Masih Kosong Silahkan Menambah Kategori Pemilihan Dengan Menekan Tombol Tambah Kategory Pemilihan Di Bawah!
                      </p>
                      <button class="btn btn-primary mb-2 mr-2 tambahPemilihan" data-toggle="modal" data-target="#ui-pemilihan">
                              Tambah Kategori Pemilihan
                            </button>
                      </div>
                    </div>
                  </div>
               <?php else: ?>
                <div class="container">
                    <div class="judul">
                        <p>Kelola Kategori Pemilihan</p>
                    </div>
                    <div class="flash-data" data-flashdata_tambah="<?= $this->session->flashdata('message'); ?>"></div>
                    <div class="flash-data-hapus" data-flashdata_hapus="<?= $this->session->flashdata('message_delete'); ?>"></div>
                    <div class="flash-data-gagal" data-flashdata_gagal="<?= $this->session->flashdata('message_gagal'); ?>" data-flashdata_alasan_gagal="<?= $this->session->flashdata('message_alasan_gagal'); ?>"></div>
                    <div class="flash-data-ubah" data-flashdata_ubah="<?= $this->session->flashdata('message_ubah'); ?>"></div>
                    <div class="row ">
                      <?php foreach ($pemilihan as $p): ?>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title" style="display: flex; justify-content: center; align-items: center; color: #000; font-size: 25px; margin-bottom: -2px; font-family: 'Arvo', serif; text-align: center;"><?= $p['judul'];?></h5>                                 
                            </div>
                            <div class="card-footer" style="display: flex; justify-content: space-between;">

                                    <a class="btn btn-primary" href="<?= base_url('admin/pemilihan/').$p['id'];?>"><i class="fas fa-users-cog"></i></a>
                                    <button class="btn btn-warning ubahPemilihan" data-toggle="modal" data-target="#ui-pemilihan" data-id="<?= $p['id']; ?>"><i class="fas fa-pen"></i></button>
                                    <a class="btn btn-danger tombol-hapus" href="<?= base_url('admin/hapus_pemilihan/').$p['id']; ?>"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                      <?php endforeach ?>
                    </div>
                </div>
                <?php endif ?>

               <!-- End Cards -->

            </div>
            <!-- End of Main Content -->

            <!-- StartModal Modal -->
            <div id="ui-pemilihan" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Judul Kategori Pemilihan</h4>
                  </div>
                  <div class="modal-body">
                    <form action="<?= base_url('admin/tambah_pemilihan');?>" method="POST" enctype="multipart/form-data" >
                      <div class="form-group">
                        <input name="id_judul" id="id_judul" type="hidden" class="form-control"required>
                        <input name="pemilihan" id="pemilihan" type="text" class="form-control" placeholder="Judul Pemilihan..." required>
                      </div>
                      <div class="modal-footer">
                        <button type="" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                    </div>
                </div>
              </div>
            </div>

            <!-- End Modal Modal -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
