
		
      <style type="text/css">
                      .seperator{
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        margin-left: 450px;*/
                      }

                        .collom{
                          width: 100%;
                          height: 100%;
                          display: flex; 
                          justify-content: center;
                          align-items: center;
                        }

                        .collomm{
                          width: 80%;
                          height: 100%;
                          display: flex;
                          flex-wrap: wrap; 
                          justify-content: space-between;
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
                        .card{
                          width: 100%;
                          height: 100%;
                          display: flex;
                          margin-bottom: 50px;
                          
                        }
                        .cardd{
                          width: auto;
                          height: auto;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                          flex-direction: column;
                          margin-bottom: 10px;
                         border-radius: 10px;
                          overflow: hidden;
                          


                        }
                        .cardd-golput{
                        
                          width: 100%;
                          margin-left: 550px;
                        }
                        .cardd-golput h5{
                          margin-left: 30px;
                        }
                        .cardd h5{
                          color: #000000;
                          font-size: 15px;
                          margin-top: 10px;
                        }

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
							bottom: -16%;
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
							bottom: -20%;
							left: -5%;
						}
           
            .firs:hover {
              
              background-color: transparent;
            }
           

      </style>
      <div class="bulet-1"></div>
		        <div class="bulet-2"></div>
		        <div class="bulet-3"></div>

		        <div class="bulet-4"></div>
		        <div class="bulet-5"></div>
		      	<div class="bulet-3"></div>
      <?php if (!$periode): ?>
        <div class="container">
          <div class="row lay" style="height: auto; min-height: 90vh;">
            <img src="<?= base_url('assets/img/voting_not_found.svg') ?>">
            <div class="text">
              <h5>Voting Has Been Closed</h5>
              <p>
                Voting Telah ditutup, terima kasih telah berpartisipasi dalam pemilihan. Hubungi pihak panitia jika anda memiliki kepentingan khusus!
              </p>
            </div>
          </div>
        </div>
      <?php else: ?>
      <?php foreach ($periode as $p): ?>
        
        <div class="flash-data" data-flashdata_vote="<?= $this->session->flashdata('message'); ?>"></div>
            <div class="judul mt-5">
              <br><br>
              <p><?= $p['judul']; ?> Periode <?= $p['periode_awal'].' / '.$p['periode_akhir']; ?></p>
            </div>

            <div class="seperator text-center"></div>
  
            <div class="row" style="min-height: 79vh; height: auto;">        
              

              <div class="collomm">
              	
                <?php 
                $tabelKandidat = $this->db->get_where('tb_kandidat',['periode_id' => $p['id_periode']])->result_array();
               $tabelKandidatCek=$this->db->get('tb_kandidat')->row_array();
                foreach ($tabelKandidat as $tk): ?>
                <?php  $pilihdata=$this->db->get_where('tb_pilih',['nim'=>$this->session->userdata('nim'),'kandidat_id'=>$tk['id_kandidat']])->row_array();

                 ?>
                <div class="card" style=" height: 270px; overflow: ;" >
                  <?php if(trim($nim_login)==trim($tk['nim_ketua'])) { ?>
                    <p><button class="firs" data-bs-toggle="modal" data-bs-target="#h<?= $tk['id_kandidat']; ?>" data-id="<?= $tk['id_kandidat']; ?>" style="  position: absolute; margin-left: -170px; border-radius: 100%; width: 100px; height:80px; padding-left: 5px;"><i class="fas fa-pencil-alt"></i></button></p>
                  <?php }else if (trim($nim_login)==trim($tk['nim_wakil'])){ ?>
                    <p><button class="firs" data-bs-toggle="modal" data-bs-target="#h<?= $tk['id_kandidat']; ?>" data-id="<?= $tk['id_kandidat']; ?>" style="  position: absolute; margin-left: -170px; border-radius: 60%; width: 100px; height:80px; padding-left: 5px;"><i class="fas fa-pencil-alt"></i></button></p>
                  <?php }else{ ?>
                  <?php } ?>
                  <p></p>
                  <p><?= $tk['nama_ketua'];?></p>
                  <p>&</p>
                  <p><?= $tk['nama_wakil']; ?></p>
                  
                  <p class="title">Ketua & Wakil Kandidat </p>
                 <!--  <p>BEM University</p> -->
                 <?php if(@$pilihdata['kandidat_id']==$tk['id_kandidat']){ ?>
                  <p><button class="first detailPemilihan" data-bs-toggle="modal" data-bs-target="#j<?= $tk['id_kandidat']; ?>" data-id="<?= $tk['id_kandidat']; ?>"><i class="fas fa-check-square"></i>Detail</button></p>
                <?php }else{ ?>
                     <p><button class="first detailPemilihan" data-bs-toggle="modal" data-bs-target="#j<?= $tk['id_kandidat']; ?>" data-id="<?= $tk['id_kandidat']; ?>">Detail</button></p>
                    <?php } ?>
                    
                </div>

                <!-- modal detail -->
                <!-- Modal -->
            <div class="modal fade" id="j<?= $tk['id_kandidat']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kandidat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                       <div class="modal-body">
                       <div class="collom">
                        <?php  if($tk['nim_ketua']==$pemilihankandidat['golput']){ ?>
                            
                         <div class="gambar">
                            <div class="cardd-golput">
                              <img src="<?= $tk['foto_ketua']; ?>">
                              <h5><?= $tk['nama_ketua']; ?></h5>
                            </div>
                            
                         </div>
                             <?php   }else{ ?>
                               <div class="gambar">
                            <div class="cardd">
                              <img src="<?= $tk['foto_ketua']; ?>">
                              <h5><?= $tk['nama_ketua']; ?></h5>
                            </div>
                            <div class="cardd">
                              <img src="<?= $tk['foto_wakil'];  ?>">
                              <h5><?= $tk['nama_wakil'] ?></h5>
                            </div>
                         </div>
                       <?php } ?>
                         <div class="vm">
                          <?php  if($tk['nim_ketua']==$pemilihankandidat['golput']){ ?>

                             <?php   }else{ ?>
                          <div class="misi">
                            <h5>Program Kerja</h5>
                            <ul>
                              <?php if (!$tk['program_kerja']): ?>
                                <p class="text-danger">Kandidat Belum Menambahkan program_kerja! Ingatkan Kandidat untuk segara menambahkan program_kerja!</p>
                              <?php else :?>
                                <?= $tk['program_kerja']; ?>
                              <?php endif ?>
                            </ul>
                          </div>
                          <div class="visi">
                            <h5>Visi</h5>
                           
                            <ul>
                               <?php if (!$tk['visi']): ?>
                                <p class="text-danger">Kandidat Belum Menambahkan Visi! Ingatkan Kandidat untuk segara menambahkan Visi!</p>
                              <?php else :?>
                                <?= $tk['visi']; ?>
                              <?php endif ?>
                            </ul>
                          </div>
                          <div class="misi">
                            <h5>Misi</h5>
                            <ul>
                               <?php if (!$tk['misi']): ?>
                                <p class="text-danger">Kandidat Belum Menambahkan misi! Ingatkan Kandidat untuk segara menambahkan misi!</p>
                              <?php else :?>
                                <?= $tk['misi']; ?>
                              <?php endif ?>
                            </ul>
                          </div>
                        <?php   } ?>
                           
                         </div>
                       </div>
                     </div>
                  <div class="modal-footer">
                    <form method="POST" action="<?= base_url('user/vote') ?>">
                      <input type="hidden" name="kandidat_id" value="<?= $tk['id_kandidat']; ?>">
                      <input type="hidden" name="name" value="<?= $datadashboard->MESSAGE->NAMA_MAHASISWA; ?>">
                      <input type="hidden" name="periode_id" value="<?= $tk['periode_id']; ?>">

                      <?php 
                      $pilihlah=$this->db->get_where('tb_periode',['gate'=>1])->row_array();
                      $tbpilih=$this->db->get_where('tb_pilih',['periode_id'=>$pilihlah['id_periode'],'nim'=>$this->session->userdata('nim')])->row_array();

                    if(!$tbpilih) { ?>
                     
                      <?php if(trim($nim_login)==trim($tk['nim_ketua'])){ ?>

                      <?php }else if(trim($nim_login)==trim($tk['nim_ketua'])){ ?>

                      <?php }else{ ?>
                        <button type="submit" class="btn btn-primary" name="pilih">Pilih</button>
                      <?php } ?>
                       
                    <?php }else{ ?>
                      
                    <?php } ?>
                    </form>
                  
                  </div>
                </div>
              </div>
            </div>

            <!-- modal add visi misi -->
              <div class="modal fade" id="h<?= $tk['id_kandidat']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Visi Misi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                   <form method="post" action="<?= base_url('user/editkandidat'); ?>">
                    <input type="hidden" name="id_kandidat" value="<?= $tk['id_kandidat']; ?>">
                    <label>Edit Visi</label>
                    <textarea   class="ckeditor" name="visi" class="form-control"><?= $tk['visi']; ?></textarea>
                    <label>Edit Misi</label>
                    <textarea class="ckeditor" name="misi"><?= $tk['misi']; ?></textarea>
                     <label>Edit Program Kerja</label>
                    <textarea class="ckeditor" name="program_kerja"><?= $tk['program_kerja']; ?></textarea>
                  </div>
                  <div class="modal-footer">
                      
                          
                      <button type="submit" class="btn btn-primary" >Simpan</button>
                      </form>
                  
                  
                    
                  </div>
                </div>
              </div>
            </div>
  
              <!-- endmodal -->

                <?php endforeach ?>
              </div>
             <!--  <div class="kosong" style="width: 100vw; height: 20vh;">
            	
            </div> -->
            </div>
            <!-- </div> -->
         
              
            
      <?php endforeach ?>
    <?php endif ?>
      
   <!--   -->

   

    