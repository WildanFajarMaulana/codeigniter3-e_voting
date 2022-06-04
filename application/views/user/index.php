
      <style type="text/css">
      	 .lay img{
                                width: 40%;
                                margin-left: 700px;
                                margin-top: 50px;
         }
         .lay h5{
                           	    color: black;
                                margin-top: 30px;
                                 margin-left: 700px;
                                 width: 300px;
          }
          .ley img{
                                width: 40%;
                                margin-right:500px;
                                margin-top: 50px;
         }
         .ley h5{
                           	    color: black;
                           	    margin-right:300px;
                                margin-top: 30px;
                                width: 300px;
          }
          .lay p{
          	color: grey;
          	margin-left: 700px;
          	 width: 400px;
          }
          .ley p{
          	color: grey;
          	margin-right:300px;
          	 width: 400px;
          }

      </style>

      <div class="bulet-1"></div>
      <div class="bulet-2"></div>
      <div class="bulet-3"></div>

      <div class="bulet-4"></div>
      <div class="bulet-5"></div>
      <div class="bulet-3"></div>

      <div class="container">

      	<!-- Ini Buat Jadwal -->
      	<?php if(!$jadwal){ ?>
      		  <div class=" lay">
                                          <img src="<?= base_url('assets/img/undraw_timeline_re_aw6g.svg') ?>">
                                          <div class="text">
                                            <h5>Jadwal Tidak Ada</h5>
                                            <p>Tunggu Informasi Jadwal Dari Panitia</p>
                                          </div>
                                        </div>
      	<?php }else{ ?>
      			<div class="row">
      		<div class="scroll-bg-2">
      				<div class="scroll-div-2">
	      				<div class="scroll-object-2">
	      					<table class="table table-borderless">
	      						<div class="judul mb-2">
	      							<p>Jadwal E-Voting</p>
	      						</div>
		      					<tbody>
		      						<?php $no = 1; foreach ($jadwal as $j): ?>
			      						<tr>
			      							<th scope="row"><?= $no++.'.'; ?></th>
										    <td style="min-width: 100px;"><?= $j['date']; ?></td>
										    <td><?= $j['jadwal']; ?></td>
			      						</tr>
		      						<?php endforeach ?>
		      					</tbody>
		      				</table>
	      				</div>
      				</div>
      			</div>
      	</div>

      	<?php } ?>
      
      	<!-- ini Buat Aturan -->
      	<?php if(!$aturan){ ?>
      		  <div class=" ley">
                                          <img src="<?= base_url('assets/img/undraw_grid_design_obmd.svg') ?>">
                                          <br>
                                          <div class="text">
                                            <h5>Aturan Tidak Ada</h5>
                                            <p>Tunggu Informasi Aturan Dari Panitia</p>
                                          </div>
                                        </div>
      	<?php }else{ ?>

      	<div class="coll">
      		<div class="colom-2">
      			<div class="scroll-bg">
      				<div class="scroll-div">
	      				<div class="scroll-object">
	      					<table class="table table-borderless">
	      						<div class="judul-2 mb-2">
	      							<p>Aturan E-Voting</p>
	      						</div>
		      					<tbody>
		      						<?php $no = 1; foreach ($aturan as $a): ?>
			      						<tr>
			      							<th scope="row"><?= $no++.'.'; ?></th>
										      <td><?= $a['aturan']; ?></td>
			      						</tr>
		      						<?php endforeach ?>
		      					</tbody>
		      				</table>
	      				</div>
      				</div>
      			</div>
      		</div>
            	<div class="run">
            		<img src="<?= base_url('assets/'); ?>img/run.svg" alt="">
            	</div>
      	</div>
      	<?php } ?>

      </div>
 
  <!--     <div class="footer"> 
        <p>Created with CV. Prima Cipta Technologi</p>
      </div> -->


    