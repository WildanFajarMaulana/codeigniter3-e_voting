
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
                        width: 300px;
                        height: 250px;
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
               <?php if (!$periode): ?>
                <div class="container">
                    <div class="row lay">
                      <img src="<?= base_url('assets/img/periode_not_found.svg') ?>">
                      <div class="text">
                        <h5>Data Periode Tidak Ditemukan</h5>
                        <p>
                          Anda tidak memiliki data periode saat ini, silahkan lakukan tambah data untuk menambahkan data periode!
                      </p>
                      <button class="btn btn-primary mb-2 mr-2 tambahPeriode" data-toggle="modal" data-target="#mi-periode">
                              Tambah Periode
                      </button>
                      </div>
                    </div>
                  </div>
               <?php else: ?>
                <div class="container">
                    <div class="judul">
                        <p>Periode</p>
                    </div>
                    <div class="flash-data" data-flashdata_tambah="<?= $this->session->flashdata('message'); ?>"></div>
                    <div class="flash-data-hapus" data-flashdata_hapus="<?= $this->session->flashdata('message_delete'); ?>"></div>
                    <div class="flash-data-gagal" data-flashdata_gagal="<?= $this->session->flashdata('message_gagal'); ?>" data-flashdata_alasan_gagal="<?= $this->session->flashdata('message_alasan_gagal'); ?>"></div>
                    <div class="flash-data-ubah" data-flashdata_ubah="<?= $this->session->flashdata('message_ubah'); ?>"></div>
                    <div class="row ">
                      <?php foreach ($periode as $p): ?>
                        <div class="col">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <p style="text-align: center; min-height: 100px; height: auto;"><?= $p['judul']; ?></p>
                                <h5 class="card-title" style="display: flex; justify-content: center; align-items: center; color: #000; font-size: 25px; margin-bottom: -2px; font-family: 'Arvo', serif;"><?= $p['periode_awal'].' / '.$p['periode_akhir']; ?></h5>
                                <!-- <a href="user.html" class="card-titler text-secondary">Manage Kandidat Masa Jabatan Periode <?= $p['periode_awal'].' / '.$p['periode_akhir']; ?></a> -->
                                 
                            </div>
                            <div class="card-footer" style="display: flex; justify-content: space-between;">

                                    <a class="btn btn-primary" href="<?= base_url('admin/kandidat/').$p['id_periode'].'/'.$p['periode_awal'].'/'.$p['periode_akhir'] ;?>"><i class="fas fa-users-cog"></i></a>
                                    <button class="btn btn-warning ubahPeriode" data-toggle="modal" data-target="#mi-periode" data-id="<?= $p['id_periode']; ?>"><i class="fas fa-pen"></i></button>
                                    <a class="btn btn-danger tombol-hapus" href="<?= base_url('admin/hapus_periode/').$p['id_periode']; ?>"><i class="fas fa-trash"></i></a>
                            </div>
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
            <div id="mi-periode" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Periode</h4>
                  </div>
                  <div class="modal-body">
                    <form action="<?= base_url('admin/tambah_periode');?>" method="POST" enctype="multipart/form-data" >
                      <div class="form-group">
                        <label>Periode Awal</label>
                        <input type="hidden" name="id_periode" id="id_periode">
                        <input type="hidden" name="judul" value="<?= $this->uri->segment(3); ?>">
                        <input name="paw" id="paw" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Periode Akhir</label>
                        <input name="pak" id="pak" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Judul Pemilihan</label>
                        <textarea name="judul" class="form-control" id="judul"></textarea>
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
