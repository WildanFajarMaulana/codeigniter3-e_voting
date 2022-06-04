
        <!-- Content Wrapper -->
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
                    .lay{
                      display: flex; 
                      justify-content: center; 
                      align-items: center; 
                      flex-direction: column;
                    }
                    .lay img{
                      max-width: 500px;
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

                <!-- Grafik -->
                <?php if (!$periode_grafik): ?>
                  <div class="container">
                    <div class="row lay">
                      <img src="<?= base_url('assets/img/grafik_not_found.svg') ?>">
                      <div class="text">
                        <h5>Data Grafik Tidak Dalam Kondisi Publik</h5>
                        <p>
                        Grafik pada halaman dashboard admin akan muncul bila status voting activ atau terdapat data grafik yang telah di publish. anda dapat melakukan publish pada halaman periode
                      </p>
                      </div>
                    </div>
                  </div>
                <?php else: ?>
                    <div class="container" style="width: 100%; min-height: 50vh; height: auto;">
                      <!-- <?php if ($layout_style_grafik > 1){echo"display: flex; justify-content: space-between; align-items: center;";} ?> -->
                  <?php foreach ($periode_grafik as $pg): ?>
                    <!-- <?php if ($layout_style_grafik > 1){echo"width : 40%;";} ?> -->
                      <div class="card mb-4" style="">
                       <div class="judul">
                            <p>Grafik <?= $pg['judul'] ?> Periode <?= $pg['periode_awal'].' / '.$pg['periode_akhir']; ?></p>
                        </div>
                        <div class="row">  
                          <div class="col-md-12">
                              <div class="grafik">
                                  <canvas id="grafik<?= $pg['id_periode']; ?>"></canvas>
                              </div>
                          </div>
                        </div>
                      </div>
                             <script>
                                var ctx = document.getElementById("grafik<?= $pg['id_periode']; ?>").getContext('2d');
                                var myChart = new Chart(ctx, {
                                  type: 'bar',
                                  data: {
                                    labels: [
                                      <?php 
                                        $grafik = $this->db->get_where('tb_kandidat',['periode_id' => $pg['id_periode']])->result_array();
                                        foreach ($grafik as $g): 
                                      ?>
                                          "<?= $g['nama_ketua'].' / '.$g['nama_wakil']; ?>",
                                      <?php endforeach ?>
                                    ],
                                    datasets: [{
                                      label: '# of Votes',
                                      data: [
                                        <?php 
                                          foreach ($grafik as $g): 
                                          $hitung = $this->db->get_where('tb_pilih',['kandidat_id' => $g['id_kandidat']])->num_rows();

                                        ?>
                                          <?= round($hitung,2); ?>,
                                        <?php endforeach ?>
                                      ],
                                      backgroundColor: [
                                      'rgba(255, 99, 132, 0.2)',
                                      'rgba(54, 162, 235, 0.2)',
                                      'rgba(255, 206, 86, 0.2)',
                                      'rgba(75, 192, 192, 0.2)',
                                      'rgba(153, 102, 255, 0.2)',
                                      'rgba(255, 159, 64, 0.2)'
                                      ],
                                      borderColor: [
                                      'rgba(255,99,132,1)',
                                      'rgba(54, 162, 235, 1)',
                                      'rgba(255, 206, 86, 1)',
                                      'rgba(75, 192, 192, 1)',
                                      'rgba(153, 102, 255, 1)',
                                      'rgba(255, 159, 64, 1)'
                                      ],
                                      borderWidth: 1
                                    }]
                                  },
                                  options: {
                                    scales: {
                                      yAxes: [{
                                        ticks: {
                                          beginAtZero:true
                                        }
                                      }]
                                    }
                                  }
                                });
                              </script>
                  <?php endforeach ?>
                <?php endif ?>
                  
                    
                <!-- End Grafik -->

                

            </div>
            <!-- End of Main Content -->

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

    