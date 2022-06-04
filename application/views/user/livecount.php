
      <style type="text/css">
          
.bulet-1, .bulet-2, .bulet-3{
  width: 250px;
  height: 250px;
  border-radius: 100%;
  position: absolute;
  background-color: #6C63FF;
  opacity: 15%;
  z-index: -1;
}

.bulet-1{
  right: -10%;
  top: -10%;
}

.bulet-2{
  right: 15%;
  bottom: 0%;
}

.bulet-3{
  top: -5%;
  left: -5%;
}

.bulet-4, .bulet-5{
  width: 500px;
  height: 500px;
  border-radius: 100%;
  position: absolute;
  background-color: #6C63FF;
  opacity: 15%;
  z-index: -2;
}

.bulet-4{
  top: -20%;
  right: -5%;
}

.bulet-5{
  bottom: -5%;
  left: -5%;
}
      </style>
      <div class="bulet-1"></div>
        <div class="bulet-2"></div>
        <div class="bulet-3"></div>

        <div class="bulet-4"></div>
        <div class="bulet-5"></div>
        <div class="bulet-3"></div>
      <?php if (!$periode_grafik): ?>
        <div class="container">
          <div class="row lay" style="height: auto; min-height: 75vh;">
            <img src="<?= base_url('assets/img/grafik_not_found.svg') ?>">
            <div class="text">
              <h5>Public Chart Data Is Not Found</h5>
              <p>
                Hasil Voting Telah di Tutup! hubungi admin jika anda memiliki keperluan yang khusus!
              </p>
            </div>
          </div>
        </div>
      <?php else: ?>
      <?php foreach ($periode_grafik as $pg): ?>
       

        <div class="container" style="width: auto; min-height: 100vh;">
          <!-- <div class="row" style="display: flex; justify-content: center;align-items: center;">
            <div class="judul">
              <p>Grafik Pemilihan Kandidat Ketua dan Wakil BEM Periode <?= $pg['periode_awal'].' / '.$pg['periode_akhir']; ?></p>
            </div>
            <div class="seperator"></div>
          </div> -->
          <div class="row" style=" display: flex; justify-content: center; align-items: center; flex-direction: column;">  
            <div class="card" style="max-width: 1000px;">
              <div class="row" style="display: flex; justify-content: center;align-items: center;">
                <div class="judul">
                  <p>Grafik Pemilihan Kandidat Ketua dan Wakil BEM Periode <?= $pg['periode_awal'].' / '.$pg['periode_akhir']; ?></p>
                </div>
                <div class="seperator"></div>
              </div>
              <div class="col-md-12 mt-2" style="display: flex; justify-content: center; align-items: center;">
                  <div class="grafik">
                      <canvas id="grafik<?= $pg['id_periode']; ?>"></canvas>
                  </div>
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
</html>