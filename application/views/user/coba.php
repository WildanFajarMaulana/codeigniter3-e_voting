
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
          <a class="navbar-brand" href="#">E - Voting</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
             
               <?php
                if ($dashboard==$title) {  ?>
                <a class="nav-link active" href="" ><?= $dashboard; ?></a>
                <a class="nav-link" href="#"><?= $vote; ?></a>
                <a class="nav-link" href="#"><?= $live_count; ?></a>
                <?php }else if($vote==$title){ ?>
                <a class="nav-link " href="" ><?= $dashboard; ?></a>
                 <a class="nav-link active" href="#"><?= $vote; ?></a>
                   <a class="nav-link" href="#"><?= $live_count; ?></a>
                <?php }else if($live_count==$title){ ?>
                <a class="nav-link " href="" ><?= $dashboard; ?></a>
                <a class="nav-link " href="#"><?= $vote; ?></a>
                <a class="nav-link active" href="#"><?= $live_count; ?></a>
                <?php } ?>
                
                   
           
            </div>
          </div>
        </div>
      </nav>

      <div class="bulet-1"></div>
      <div class="bulet-2"></div>
      <div class="bulet-3"></div>

      <div class="bulet-4"></div>
      <div class="bulet-5"></div>
      <div class="bulet-3"></div>

      <div class="container">

      	<!-- Ini Buat Jadwal -->
      	<div class="row">
      		<div class="scroll-bg-2">
      				<div class="scroll-div-2">
	      				<div class="scroll-object-2">
	      					<table class="table table-borderless">
		      					<tbody>
		      						<?php $no = 1; foreach ($jadwal as $j): ?>
			      						<tr>
			      							<th scope="row"><?= $no++.'.'; ?></th>
										    <td><?= $j['date']; ?></td>
										    <td><?= $j['jadwal']; ?></td>
			      						</tr>
		      						<?php endforeach ?>
		      					</tbody>
		      				</table>
	      				</div>
      				</div>
      			</div>
      	</div>

      	<!-- ini Buat Aturan -->
      	<div class="row">
      		<div class="col-md-6">
      			<div class="scroll-bg">
      				<div class="scroll-div">
	      				<div class="scroll-object">
	      					<table class="table table-borderless">
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
      	</div>

      	<div class="run">
      		<img src="<?= base_url('assets/'); ?>img/run.svg" alt="">
      	</div>
      </div>

      <div class="footer">
      	<p>Copyright with CV. Prima Cipta Technologi</p>
      </div>
 
  <!--     <div class="footer"> 
        <p>Created with CV. Prima Cipta Technologi</p>
      </div> -->


    