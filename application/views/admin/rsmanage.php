

                <!-- Tables Rules & Schedule -->

                    <div class="container">
                        <style type="text/css">
                          .removeRow
                            {
                             background-color: #4682B4;
                                color:#FFFFFF;
                            }
                            .container{
                                margin: 5% auto;
                            }

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

                            .judul-2{
                                display: flex;
                                justify-content: center;
                                align-items: center;
                            }

                            .judul-2 p{
                                font-family: 'Arvo', serif;
                                font-size: 25px;
                                color: #414141;
                            }

                            .penghalang{
                                width: 50px;
                                height: 50px;
                            }
                            #tableLoop tbody tr td{
                                width: 500px;
                            }
                            .buttonBox{
                                display: flex; 
                                justify-content: center; 
                                align-items: center;
                            }
                            .plus{
                                width: 40px; 
                                height: 40px; 
                                border-radius: 100%; 
                                border: 1px solid blue; 
                                background-color: #fff; 
                                outline: none;
                            }
                            .plus:hover{
                                background-color: blue;
                                color: #fff;
                                outline: none;
                            }
                            .lay img{
                                width: 30%;
                            }
                            .lay h5{
                                color: black;
                                margin-top: 30px;
                                font-weight: 400;
                            }
                        </style>
                        <div class="judul">
                            <p>Tabel Jadwal</p>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary mb-2 tambahJadwal" data-toggle="modal" data-target="#ui-jadwal">
                                        Tambah Jadwal
                                </button>
                                <?php if(!$jadwal){ ?>
                                    <div class="container">
                                        <div class="row lay">
                                          <img src="<?= base_url('assets/img/undraw_timeline_re_aw6g.svg') ?>">
                                          <div class="text">
                                            <h5>Jadwal Tidak Ada</h5>
                                            
                                          </div>
                                        </div>
                                      </div>
                                <?php }else{ ?>
                                     <button type="button" name="delete_jadwal_banyak" id="delete_jadwal_banyak" class="btn btn-danger btn-xs mb-2">Hapus Jadwal</button>
                                <div class="flash-data" data-flashdata_tambah="<?= $this->session->flashdata('message'); ?>"></div>
                                <div class="flash-data-hapus" data-flashdata_hapus="<?= $this->session->flashdata('message_delete'); ?>"></div>
                                <div class="flash-data-ubah" data-flashdata_ubah="<?= $this->session->flashdata('message_ubah'); ?>"></div>
                                <table class="table table-bordered">
                                  <thead class="table-dark">
                                    <tr>
                                      <th scope="col" class="justify-content-center" colspan="2">#</th>
                                      <th scope="col" class="justify-content-center">Waktu</th>
                                      <th scope="col" class="justify-content-center">Jadwal</th>
                                      <th scope="col" class="justify-content-center" colspan="2">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $no=1; foreach ($jadwal as $j): ?>
                                      <tr>
                                        <th scope="row"><input type="checkbox" class="delete_jadwal_checkbox" value="<?= $j['id']; ?>"></th>
                                        <th scope="row"><?= $no++; ?></th>
                                        <td><?= $j['date']; ?></td>
                                        <td><?= $j['jadwal']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning ubahJadwal" data-toggle="modal" data-target="#ui-jadwal" data-id="<?= $j['id']; ?>"><i class="fas fa-pen"></i></button>
                                        </td>
                                        <td>
                                          <a href="<?= base_url('admin/hapus_jadwal/'.$j['id']) ?>" class="btn btn-danger tombol-hapus"><i class="fas fa-trash"></i></a>
                                        </td>
                                      </tr>
                                      
                                    <?php endforeach ?>
                                  </tbody>
                                </table>
                                <?php } ?>
                               
                            </div>
                        </div>

                        <div class="penghalang"></div>

                        <div class="judul-2">
                            <p>Tabel Aturan</p>
                        </div>

                        <div class="row">
                            <div class="col-md-12"> 
                                <button class="btn btn-primary mb-2 tambahAturan" data-toggle="modal" data-target="#i-aturan">Tambah Aturan</button>
                                <?php if(!$aturan){ ?>
                                      <div class="container">
                                        <div class="row lay">
                                          <img src="<?= base_url('assets/img/undraw_grid_design_obmd.svg') ?>">
                                          <div class="text">
                                            <h5>Aturan Tidak Ada</h5>
                                            
                                          </div>
                                        </div>
                                      </div>
                                <?php }else{ ?>
                                     <button type="button" name="delete_aturan_banyak" id="delete_aturan_banyak" class="btn btn-danger btn-xs mb-2">Hapus Aturan</button>
                                <table class="table table-bordered">
                                  <thead class="table-dark">
                                    <tr>
                                      <th scope="col" colspan="2">#</th>
                                      <th scope="col">Aturan</th>
                                      <th scope="col" colspan="2">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $no = 1; foreach ($aturan as $a): ?>
                                      <tr>
                                        <th scope="row"><input type="checkbox" class="delete_aturan_checkbox" value="<?= $a['id']; ?>"></th>
                                        <th scope="row"><?= $no++; ?></th>
                                        <td><?= $a['aturan']; ?></td>
                                        <td>
                                           <button type="button" class="btn btn-warning ubahAturan" data-toggle="modal" data-target="#u-aturan" data-ida="<?= $a['id']; ?>"><i class="fas fa-pen"></i></button>
                                        </td>
                                        <td>
                                          <a href="<?= base_url('admin/hapus_aturan/'.$a['id']); ?>" class="btn btn-danger tombol-hapus" style="margin-left: 50px;"><i class="fas fa-trash"></i></a>
                                        </td>
                                      </tr>
                                    <?php endforeach ?>
                                  </tbody>
                                </table>
                                <?php } ?>
                               
                            </div>
                        </div>
                    </div>

                <!-- End Tables Rules & Schedule -->

            </div>
            <!-- End of Main Content -->


            <!-- MODAL MODAL -->
            <div id="ui-jadwal" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Jadwal</h4>
                  </div>
                  <div class="modal-body">
                    <form action="<?= base_url('admin/tambah_jadwal'); ?>" method="POST" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="hidden" name="id_jadwal" id="id_jadwal">
                            <input name="tanggal" type="date" class="form-control" placeholder="Name" id="date" required>
                        </div>
                        <div class="form-group">
                            <label>Jadwal</label>
                            <textarea name="jadwal" class="form-control" required="" id="jadwal"></textarea>
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

            <!-- Modal Tambah Aturan -->
            <div id="i-aturan" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Aturan</h4>
                  </div>
                  <div class="modal-body">
                    <div class="col-md-12">
                      <div id="notif"></div>
                  </div>
                    <form action="<?php echo base_url('admin/tambah_aturan'); ?>" method="post" id="SimpanData">
                              <div class="box-body">
                                  <table id="tableLoop">
                                      <tbody></tbody>
                                  </table>
                                  <div class="mb-3 buttonBox">
                                      <button class=" btn plus" id="BarisBaru"><i class="fa fa-plus"></i></button>
                                      
                                  </div>
                              </div>
                              <!-- <div class="box-footer">
                                  <div class="form-group text-right">
                                      <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Simpan</button>
                                  </div>
                              </div> -->
                              <div class="modal-footer">
                                <button type="" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                          </form>
                    </div>
                </div>
              </div>
            </div>
            <div id="u-aturan" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"></h4>
                  </div>
                  <div class="modal-body">
                    <form action="<?= base_url('admin/ubah_aturan') ?>" method="POST" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label>Aturan</label>
                            <input type="hidden" name="id_aturan" id="id_aturan">
                            <textarea name="aturan" class="form-control" id="aturan" required></textarea>
                        </div>
                        <div class="modal-footer">
                          <button type="" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary"></button>
                        </div>
                    </form>
                   </div>
                </div>
              </div>
            </div>
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

<script src="<?= base_url('assets/js/input.js') ?>"></script>
<script src="<?= base_url('assets/js/delete_multiple.js') ?>"></script>
<script type="text/javascript">
     $(function(){   
          $('.ubahJadwal').on('click',function(){
              const id=$(this).data('id');
              console.log(id);
             
              // $.ajax({
              //        method: "post",
              //        url: "<?= site_url('spmb/questionModal.html'); ?>",
              //        data: "id="+id,
              //        dataType: "json",
              //        success: function(result) {
              //           // for(var a=0;a<bnykSoal;a++){
              //           //     var jawaban=$('#jawabanSoal').text();
                           
              //           //     console.log(jawaban[a]);
              //           // }
              //           $('#jawabanSoal').each(function(i,v){
              //               console.log($(v).text());
              //           })
                      
              //           $('#pilihan1').html(result[0]["ANSWER_1"]);
              //           $('#pilihan2').html(result[0]["ANSWER_2"]);
              //           $('#pilihan3').html(result[0]["ANSWER_3"]);
              //           $('#pilihan4').html(result[0]["ANSWER_4"]);
              //           $('#pilihan5').html(result[0]["ANSWER_5"]);
              //           $('#id_soal').val(result[0]["ID"]);
              //           console.log(result);
              //        }
              //    });
          })
         })
</script>