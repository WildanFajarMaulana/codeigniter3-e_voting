  
               <!-- Cards Periode -->

               <style type="text/css">
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

                        .collom{
                          width: 100%;
                          height: 100%;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                        }
                        .collom .gambar{
                          width: 40%;
                          height: 100%;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                          flex-direction: column;
                        }
                        .collom .gambar img{
                          width: 200px;
                        }
                        .collom .vm{
                          width: 60%;
                          height: 100%;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                          flex-direction: column;
                        }
                        .collom .vm .visi{
                          width: 450px;
                          min-height: 150px;
                        }
                        .collom .vm .misi{
                          width: 450px;
                          min-height: 150px;
                        }
                        .vm h5{
                          font-size: 20px;
                        }
                        .vm li{
                          min-width: 350px; 
                          max-width: 450px;
                        }
                        .cardd{
                          width: auto;
                          height: auto;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                          flex-direction: column;
                          margin-bottom: 10px;
                          background-color: #d3d3d3;
                          border-radius: 10px;
                          overflow: hidden;

                        }
                        .gambar h5{
                          color: black;
                          font-size: 15px;
                          margin-top: 10px;
                        }

                        .kotak-search{
                          width: 100%;
                          height: auto;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                          border-radius: 10px 10px 0 0;
                          overflow: hidden;
                          border: 1px solid #d3d3d3;
                        }
                        .kotak-search .gambar-search{
                          width: 30%;
                          height: auto;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                        }
                        .kotak-search .gambar-search img{
                          max-width: 90px;
                        }
                        .kotak-search .detail-search{
                          width: 70%;
                          display: flex;
                          justify-content: center;
                          flex-direction: column;
                        }
                        .kotak-search .detail-search h4{
                            color: #000000;
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
                    .nengah{
                      display: flex;
                      justify-content: center;
                      align-items: center;
                    }
                    .yeay{
                      display: flex; 
                      justify-content: center; 
                      align-items: center; 
                      min-height: 100px; 
                      height: auto;
                    }
               </style>
               <?php if (!$kandidat): ?>
                <div class="container">
                    <div class="row lay">
                      <img src="<?= base_url('assets/img/kandidat_not_found.svg') ?>">
                      <div class="text">
                        <h5>Kandidat Tidak Ditemukan</h5>
                        <p>
                          Kandidat Pada Periode <?= $dt['periode_awal'].' / '.$dt['periode_akhir']; ?> Masih Kosong Silahkan Menambah Kandidat dengan menekan tombol Tambah Kandidat Di Bawah!
                      </p>
                      <button class="btn btn-primary mb-2 mr-2 tambahKandidat" data-toggle="modal" data-target="#ui-kandidat">
                              Tambah Kandidat
                            </button>
                      </div>
                    </div>
                  </div>
               <?php else: ?>
                <div class="container">
                    <div class="judul">
                        <p>Daftar Kandidat <?= $dt['judul']; ?> Periode <?= $dt['periode_awal'].' / '.$dt['periode_akhir']; ?></p>
                    </div>
                      <div class="flash-data" data-flashdata_tambah="<?= $this->session->flashdata('message'); ?>"></div>
                    <div class="flash-data-hapus" data-flashdata_hapus="<?= $this->session->flashdata('message_delete'); ?>"></div>
                    <div class="flash-data-ubah" data-flashdata_ubah="<?= $this->session->flashdata('message_ubah'); ?>"></div>
                    <div class="row">
                          <div class="btn"> 
                            <button class="btn btn-primary mb-2 mr-2 tambahKandidat" data-toggle="modal" data-target="#ui-kandidat">
                              Tambah Kandidat
                            </button>
                            <?php if (@$access_active['id_periode'] == $dt['id_periode']): ?>
                              <a class="btn <?= $style_gate; ?> mb-2" href="<?= base_url($link_gate); ?>">
                                <?= $gate; ?>
                              </a>
                            <?php elseif (!$access_active) : ?>
                              <a class="btn <?= $style_gate; ?> mb-2" href="<?= base_url($link_gate); ?>">
                                <?= $gate; ?>
                              </a>
                            <?php else: ?>
                              <button class="btn <?= $style_gate; ?> mb-2 access_voting" data-id="<?= $dt['id_periode'] ?>" data-voting="Voting kandidat periode <?= $access_active['periode_awal'].' / '.$access_active['periode_akhir']; ?> Masih Active. Apakah anda ingin menutup voting pada periode <?= $access_active['periode_awal'].' / '.$access_active['periode_akhir']; ?> dan membuka voting baru pada periode <?= $dt['periode_awal'].' / '.$dt['periode_akhir']; ?>?">
                                <?= $gate; ?>
                              </button>
                            <?php endif ?>
                          </div>
                        
                        <table class="table table-bordered">
                          <thead class=" table-dark">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col" colspan="2">FOTO</th>
                              <th scope="col">NIM</th>
                              <th scope="col">NAMA</th>
                              <th scope="col" colspan="3">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=1; foreach ($kandidat as $k): ?>
                                <tr>
                                  <?php if ($k['nim_wakil'] != $pemilihankandidat['golput']): ?>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><img src="<?= $k['foto_ketua'] ?>" width="100px"></td>
                                    <td><img src="<?= $k['foto_wakil'] ?>" width="100px"></td>
                                    <td>
                                      <p><?= $k['nim_ketua']; ?></p>
                                      <p><?= $k['nim_wakil']; ?></p>
                                    </td>
                                    <td>
                                      <p><?= $k['nama_ketua']; ?></p>
                                      <p><?= $k['nama_wakil']; ?></p>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning ubahKandidat" data-toggle="modal" data-target="#ui-kandidat" data-id="<?= $k['id_kandidat']; ?>"><i class="fas fa-pen"></i></button>
                                    </td>
                                    <td>
                                      <button class="btn btn-primary detailKandidat" data-toggle="modal" data-target="#h<?=$k['id_kandidat']; ?>"><i class="fas fa-file-invoice"></i></button>
                                    </td>
                                    <td>
                                      <form method="post" action="<?= base_url('admin/hapus_kandidat') ?>">
                                        <input type="hidden" name="id_periode" value="<?= $this->uri->segment(3); ?>">
                                        <input type="hidden" name="periode_awal" value="<?= $this->uri->segment(4); ?>">
                                        <input type="hidden" name="periode_akhir" value="<?= $this->uri->segment(5); ?>">
                                        <input type="hidden" name="id_kandidat" value="<?= $k['id_kandidat']; ?>">
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                      </form>
                                    </td>
                                <?php else: ?>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td colspan="2"><div class="yeay"><img src="<?= $k['foto_ketua'] ?>" width="100px"></div></td>
                                    <td colspan="2"><div class="yeay">Kotak Kosong</div></td>
                                    <td colspan="3">
                                           <form method="post" action="<?= base_url('admin/hapus_kandidat') ?>" class="yeay">
                                            <input type="hidden" name="id_periode" value="<?= $this->uri->segment(3); ?>">
                                            <input type="hidden" name="periode_awal" value="<?= $this->uri->segment(4); ?>">
                                            <input type="hidden" name="periode_akhir" value="<?= $this->uri->segment(5); ?>">
                                            <input type="hidden" name="id_kandidat" value="<?= $k['id_kandidat']; ?>">
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                          </form>
                                    </td>
                                <?php endif ?>
                                </tr>
                              <div class="modal fade" id="h<?=$k['id_kandidat']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-lg">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Detail Kandidat</h5>
                     </div>
                     <div class="modal-body">
                       <div class="collom">
                         <div class="gambar">
                            <div class="cardd">
                              <img src="<?= $k['foto_ketua']; ?>">
                              
                            </div>
                            <h5><?= $k['nama_ketua']; ?></h5>
                            <div class="cardd">
                              <img src="<?= $k['foto_wakil'];  ?>">
                              
                            </div>
                            <h5><?= $k['nama_wakil'] ?></h5>
                         </div>
                         <div class="vm">
                          <div class="visi">
                            <h5>Visi</h5>
                            <ul>
                              <?php if (!$k['visi']): ?>
                                <p class="text-danger">Kandidat Belum Menambahkan Visi! Ingatkan Kandidat untuk segara menambahkan Visi!</p>
                              <?php else :?>
                                <?= $k['visi']; ?>
                              <?php endif ?>
                            </ul>
                          </div>
                          <div class="misi">
                            <h5>Misi</h5>
                            <ul>
                              <?php if (!$k['misi']): ?>
                                <p class="text-danger">Kandidat Belum Menambahkan Misi! Ingatkan Kandidat untuk segara menambahkan Misi!</p>
                              <?php else : ?>
                                <?= $k['misi']; ?>
                              <?php endif ?>
                            </ul>
                          </div>
                          <div class="misi">
                            <h5>Program Kerja</h5>
                            <ul>
                              <?php if (!$k['program_kerja']): ?>
                                <p class="text-danger">Kandidat Belum Menambahkan Program Kerja! Ingatkan Kandidat untuk segara menambahkan Program Kerja!</p>
                              <?php else :?>
                                <?= $k['program_kerja']; ?>
                              <?php endif ?>
                            </ul>
                          </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
              </div>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                    </div>
                    <div class="judul-2">
                      

                    </div>
                    <!-- <p>Hasil Perolehan : <a href="<?= base_url($link_publish) ?>" class="btn <?= $style_publish; ?>"><?= $publish; ?></a></p> -->
                    <!-- <p>Hasil Perolehan : <button class="btn <?= $style_publish; ?>"><?= $publish; ?></button></p> -->
                    <style type="text/css">
                      .merah{
                        color: red;
                        font-size: 13px;
                      }

                      .btn-no{
                        outline: 0;
                        border: none;
                        background-color: transparent;
                        padding: 0.375rem 0.75rem;
                        font-size: 1rem;
                      }
                      .btn-no:focus{
                        outline: 0;
                      }
                      .text-biru-muda{
                        color: #1560BD;
                      }
                      .text-hitam{
                        color: #000000;
                      }
                      .case-garis{
                        margin-bottom: -16px;
                        transition: 0.5s;
                      }
                      .pg-168{
                        padding-left: 190px; 
                        transition: 0.5s;
                      }
                      .garis{
                        width: 175px;
                        height: 2px;
                        border-radius: 20px;
                        transition: 0.5s;
                      }
                      .g-panjang{
                        width: 210px;
                        transition: 0.5s;
                      }
                      .bg-biru{
                        background-color: #087AFF;
                      }
                      .bg-biru-muda{
                        background-color: #1560BD;
                      }
                      .open{
                        display: block;
                      }
                      .tambahgolput{
                        display: none;
                      }

                      .hehe{
                        display: flex; justify-content: center; align-items: center; flex-direction: column; width: 450px;
                      }

                    </style>
                    <?php if ($dt['gate'] == 0): ?>
                      <div class="judul-2">
                        <?php if (!$access_publish): ?>
                          <p>Hasil Perolehan : <a href="<?= base_url($link_publish) ?>" class="btn <?= $style_publish; ?>"><?= $publish; ?></a></p>
                        <?php elseif ($access_publish['id_periode'] == $dt['id_periode']): ?>
                          <p>Hasil Perolehan : <a href="<?= base_url($link_publish) ?>" class="btn <?= $style_publish; ?>"><?= $publish; ?></a></p>
                        <?php else: ?>
                          <p>Hasil Perolehan : <button class="btn <?= $style_publish; ?>" onclick="Swal.fire('Public Chart Denied','grafik periode <?= $access_publish['periode_awal']." / ".$access_publish['periode_akhir']; ?> sedang dalam kondisi publish<br><merah>Sistem hanya mengizinkan 1 Grafik untuk di publish</merah>', 'warning')"><?= $publish; ?></button></p>
                        <?php endif ?>
                      </div>
                    <?php endif ?>
                    <?php if ($dt['gate'] == 0): ?>
                      <div class="card" style="border-radius: 20px;">
                        <!-- Card Header -->
                                <div class="card-header py-3 ngebawah bg-white" style="padding: 0px; border-radius: 20px 20px 0px 0px;">
                                    <div style="width: 100%;">
                                        <button id="gp" type="button" class="btn-no text-biru-muda ml-4 mb-2">Grafik Pemilihan</button>
                                         <button id="gpp" type="button" class="btn-no text-hitam mb-2 ml-4 order-poin">Grafik Partisipasi Pemilihan</button>
                                    </div>
                                    <div id="cg" class="case-garis">
                                        <div id="garis" class="garis bg-biru-muda"></div>
                                    </div>
                                </div>
                        <div class="card-body">
                          <?php $cek_jumlah = $this->db->get_where('tb_pilih',['periode_id' => $this->uri->segment(3)])->num_rows(); ?>
                          <p>Total Partisipasi : <?= $cek_jumlah; ?></p>
                          <div>
                          <?php if (!$cek_jumlah): ?>
                            <div id="grafik_pemilihan" class="row">
                                  <div class="col-md-12">
                                    <div class="grafik">
                                        <div class="container">
                                          <div class="row lay">
                                            <img src="<?= base_url('assets/img/grafik_kosong_kiri.svg') ?>">
                                            <div class="text">
                                              <h5>Data Pemilihan Tidak Tersedia</h5>
                                              <p>
                                                Belum Ada Peserta Pemilihan Yang Menggunakan Hak Pilihnya! Segera Ingatkan Agar Peserta Pemilihan Segera Menggunakan Hak Pilihnya
                                            </p>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                              </div> 
                              
                            <?php else: ?>
                              <div id="grafik_pemilihan" class="row">
                                  <div class="col-md-12">
                                    <div class="grafik">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                  </div>
                              </div>   
                          <?php endif ?>
                          <?php if (!$cek_jumlah): ?>
                             <div id="grafik_partisipasi" class="row d-none">
                                  <div class="col-md-12">
                                    <div class="grafik">
                                        <div class="container">
                                          <div class="row lay">
                                            <img src="<?= base_url('assets/img/grafik_kosong_kanan.svg') ?>">
                                            <div class="text">
                                              <h5>Data Partisipasi Tidak Tersedia</h5>
                                              <p>
                                                Belum Ada Peserta Pemilihan Yang Menggunakan Hak Pilihnya! Segera Ingatkan Agar Peserta Pemilihan Segera Menggunakan Hak Pilihnya
                                            </p>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                          <?php else: ?>
                            <div id="grafik_partisipasi" class="row d-none">
                                <div style=" width: 100%; display: flex; justify-content: center; align-items: center;">
                                  <div class="grafik" style="width: 60%; height: 100%:">
                                      <canvas id="grafik_pertisipasi"></canvas>
                                  </div>
                                  <div class="grafik" style="width: 40%; height: 100%;">
                                    <canvas id="grafik_pertisipasi_dua"></canvas>
                                  </div>
                                </div>
                            </div>
                          <?php endif ?>
                          </div>
                          
                          
                        </div>
                      </div>
                    <?php endif ?>
                  <?php endif ?>


                    <div id="ui-kandidat" class="modal fade">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah Kandidat</h4>
                           
                          </div>
                          <div class="modal-body">     
                            <form id="form_tambah_kandidat"  action="<?= base_url('admin/tambah_kandidat');?>"  method="POST" enctype="multipart/form-data" >

                                  <div class="pemilihanedit" id="pemilihanedit">
                                        <input type="hidden" name="id_periode" value="<?= $this->uri->segment(3);  ?>">
                                        <input type="hidden" name="periode_awal" value="<?= $this->uri->segment(4);  ?>">
                                        <input type="hidden" name="periode_akhir" value="<?= $this->uri->segment(5);  ?>">
                                        <select id="jenis_pilihan" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                    										  <option value="1">Mahasiswa</option>
                    										  <option value="2">Kotak kosong</option>
                    										  
                    										</select>
                                        

                                </div>
                               
                                <div id="kotak_kosong" class="card d-none">
                                  <div class="hehe">
                                    <img  src="<?= base_url('assets/img/DEFAULT.jpg') ?>" class="card-img-top" alt="..." style="width: 350px; display: block;
    margin-left: auto;
    margin-right: auto;">
                                  </div>
                                  <div class="card-body" style="width:450px; text-align: center; font-weight: 100px;">
                                    <h5>Kotak Kosong</h5>
                                    <p class="card-text">Kotak Kosong di sediakan untuk peserta pemilihan yang tidak ingin memilih kandidat!</p>
                                  </div>
                                </div> 


                                <div class="pemilihan" id="pemilihan">
                               <div class="form-group">
                                <div class="col-md-12"> 
                                  <div id="notif">  </div>
                              </div>
                                <label>NIM Ketua</label>
                                <input type="hidden" name="id_periode" value="<?= $this->uri->segment(3);  ?>">
                                <input type="hidden" name="periode_awal" value="<?= $this->uri->segment(4);  ?>">
                                <input type="hidden" name="periode_akhir" value="<?= $this->uri->segment(5);  ?>">
                                <input type="hidden" name="id_kandidat" id="id_kandidat">
                                <div class="input-group mb-3">
                                  <div class="kotak-search">
                                    <div class="gambar-search">
                                      <img id="detail_foto_ketua" src="<?= base_url('assets/img/DEFAULT.jpg') ?>">
                                    </div>
                                    <div class="detail-search">
                                      <h4 id="detail_nama_ketua">Nama Ketua</h4>
                                      <h5 id="detail_nim_ketua">NIM : XXXXXXXX</h5>
                                    </div>
                                  </div>
                                  <input type="text" name="nim_ketua" class="form-control"  id="nim_ketua" >
                                  <input type="hidden" name="nama_ketua" class="form-control"  id="nama_ketua" readonly="">
                                  <input type="hidden" name="foto_ketua" class="form-control"  id="foto_ketua" readonly="">
                                  <button class="btn btn-warning btnCekNimKetua" type="button"><i class="fas fa-search"></i></button>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-md-12"> 
                                  <div id="notifwakil">  </div>
                              </div>
                                <label>NIM Wakil</label>
                                  
                                  <div class="input-group mb-3">
                                    <div class="kotak-search">
                                    <div class="gambar-search">
                                      <img id="detail_foto_wakil" src="<?= base_url('assets/img/DEFAULT.jpg') ?>">
                                    </div>
                                    <div class="detail-search">
                                      <h4 id="detail_nama_wakil">Nama Wakil</h4>
                                      <h5 id="detail_nim_wakil">NIM : XXXXXXXX</h5>
                                    </div>
                                  </div>
                                   <input id="nim_wakil" name="nim_wakil" type="text" class="form-control"  >
                                  <input type="hidden" name="nama_wakil" class="form-control"  id="nama_wakil" readonly="">
                                  <input type="hidden" name="foto_wakil" class="form-control"  id="foto_wakil" readonly="">
                                  <button class="btn btn-warning btnCekNimWakil" type="button"><i class="fas fa-search"></i></button>
                                </div>
                                </div>
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
                    <!-- End Cards -->
                             <script>
                                var ctx = document.getElementById("myChart").getContext('2d');
                                var myChart = new Chart(ctx, {
                                  type: 'bar',
                                  data: {
                                    labels: [
                                      <?php foreach ($diagram as $d): ?>
                                          "<?= $d['nama_ketua'].' & '.$d['nama_wakil']; ?>", 
                                      <?php endforeach ?>
                                    ],
                                    datasets: [{
                                      label: '# of Votes',
                                      data: [
                                        <?php foreach ($diagram as $dgm):
                                              $jumlah = $this->db->get_where('tb_pilih',['kandidat_id' => $dgm['id_kandidat']])->num_rows();
                                        ?>
                                          <?= round($jumlah,2); ?>,
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
                              <!--                                         <?php foreach ($diagram as $dgm):
                                              $jumlah = $this->db->get_where('tb_pilih',['kandidat_id' => $dgm['id_kandidat']])->num_rows();
                                        ?>
                                          <?= round($jumlah,2); ?>,
                                        <?php endforeach ?> -->
                              <!-- JS Grafik Partisipasi 1 -->
                              <script>
                                var ctx = document.getElementById("grafik_pertisipasi").getContext('2d');
                                var myChart = new Chart(ctx, {
                                  type: 'bar',
                                  data: {
                                    labels: [
                                      <?php foreach ($tabel_prodi as $tp): ?>
                                          "<?= $tp->NAMA_PRODI ?>", 
                                      <?php endforeach ?>
                                    ],
                                    datasets: [{
                                      label: '# of Votes',
                                      data: [
                                        <?php foreach ($tabel_prodi as $tp): ?>
                                          <?php $jumlah = $this->db->get_where('tb_pilih',['prodi' => $tp->NAMA_PRODI, 'periode_id' => $this->uri->segment(3)])->num_rows(); ?>
                                          <?= $jumlah; ?>,
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

                              <!-- End Grafik Partisipasi 1 -->

                               <!-- JS Grafik Partisipasi 2 -->
                              <script>
                                //deklarasi chartjs untuk membuat grafik 2d di id mychart   
                                var ctx = document.getElementById('grafik_pertisipasi_dua').getContext('2d');

                                var myPieChart = new Chart(ctx, {
                                    //chart akan ditampilkan sebagai pie chart
                                    type: 'pie',
                                    data: {
                                        //membuat label chart
                                        labels: [
                                          <?php foreach ($tabel_prodi as $tp): ?>
                                              "<?= $tp->NAMA_PRODI ?>", 
                                          <?php endforeach ?>
                                        ],
                                        datasets: [{
                                            label: 'Prosentase Partisipasi Pemilihan',
                                            //isi chart
                                            data: [
                                              <?php foreach ($tabel_prodi as $tp): ?>
                                                // Prose Perhitungan Prosentase
                                                <?php 
                                                  $periode_id = $this->uri->segment(3);
                                                  $jumlah_semua = $this->db->get_where('tb_pilih',['periode_id' => $periode_id])->num_rows();
                                                  $jumlah = $this->db->get_where('tb_pilih',['prodi' => $tp->NAMA_PRODI, 'periode_id' => $periode_id ])->num_rows(); 
                                                  $hitung_persen = 100/$jumlah_semua;
                                                  $persentasi = $hitung_persen*$jumlah;
                                                ?>
                                                <?= round($persentasi,2);?>,
                                              <?php endforeach ?>
                                            ],
                                            //membuat warna pada chart
                                            backgroundColor: [
                                              'rgba(255, 99, 132, 0.5)',
                                              'rgba(54, 162, 235, 0.5)',
                                              'rgba(255, 206, 86, 0.5)',
                                              'rgba(75, 192, 192, 0.5)',
                                              'rgba(153, 102, 255, 0.5)',
                                              'rgba(255, 159, 64, 0.5)'
                                              ],
                                            //borderWidth: 0, //this will hide border
                                        }]
                                    },
                                    options: {
                                        //konfigurasi tooltip
                                        tooltips: {
                                            callbacks: {
                                                label: function(tooltipItem, data) {
                                                    var dataset = data.datasets[tooltipItem.datasetIndex];
                                                    var labels = data.labels[tooltipItem.index];
                                                    var currentValue = dataset.data[tooltipItem.index];
                                                    return labels+": "+currentValue+" %";
                                                }
                                            }
                                        }
                                      }
                                });
                              </script>

                              <!-- End Grafik Partisipasi 2 -->

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
    <script src="<?= base_url('assets/'); ?>js/manipulasi-page.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/nim_search.js') ?>"></script>